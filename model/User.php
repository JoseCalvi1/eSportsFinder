<?php
class User extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_users";
        $this->fields = array(
            'id' => '',
            'name' => '',
            'email' => '',
            'user_name' => '',
            'password' => '',
            'active' => '',
            'last_visit_date' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

    private function checkPasswordMD5($password_md5, $user_hash)
    {
        if (empty($user_hash)) {
            return false;
        }
        if ($user_hash[0] != '$' && strlen($user_hash) == 32) {
            // Old way - just md5 password
            return strtolower($password_md5) == $user_hash;
        }
        return crypt(strtolower($password_md5), $user_hash) == $user_hash;
    }

    public function login($user_name, $password)
    {
        global $current_user;
        $user_hash_md5 = md5($password);
        $users = $this->getBy('user_name', $user_name);
        if(is_array($users)) {
            foreach ($users as $user) {
                if ($this->checkPasswordMD5($user_hash_md5, $user->password)) {
                    $current_user = $user;
                    $_SESSION['current_user'] = $user;
                } else {
                    return false;
                }
            }
        }else if($users){
            if ($this->checkPasswordMD5($user_hash_md5, $this->password)) {
                $current_user = $this;
                $_SESSION['current_user'] = $this;
            } else {
                return false;
            }
        }
        return false;
    }

    public function retrieveByToken($id){

        $return = false;
        if ($this->config['passwordsetting']['linkexpiration'] == '1') {
            $sql = "SELECT * FROM esf_users_password_link WHERE id = '{$id}' AND date_generated >= NOW() LIMIT 1;";
        } else {
            $sql = "SELECT * FROM esf_users_password_link WHERE id = '{$id}' LIMIT 1;";
        }
        $gui = $this->ejecutarSql($sql);
        if (!empty($gui) && is_object($gui)) {
            $this->getBy('email',$gui->email);
            $return = true;
        }
        return $return;

    }

    public function resetPassword($password){
        $result = false;
        $user_hash = @crypt(strtolower(md5($password)));
        if (!empty($this->id)) {
            $this->password = $user_hash;
            if($this->save()){
                $result = true;
                $this->login($this->user_name,$password);
                $sql = "DELETE FROM esf_users_password_link WHERE email = '{$this->email}';";
                $this->ejecutarSql($sql);
            }
        }
        return $result;
    }

    private function generateResetToken()
    {
        $guid = $this->GUID();
        // Cálculo de minutos para la expiración del link generado
        $expiration_minutes = $this->config['passwordsetting']['linkexpirationtime'] * $this->config['passwordsetting']['linkexpirationtype'];
        $sql = 'INSERT INTO esf_users_password_link (id, email, date_generated,deleted) VALUES ("' . $guid . '", "' . $this->email . '", DATE_ADD(NOW(), INTERVAL ' . $expiration_minutes . ' MINUTE),0);';
        if ($this->ejecutarSql($sql)) {
            return $guid;
        } else {
            return false;
        }
    }

    public function sendResetPasswordMail($email) {
        $email_path = dirname(__FILE__) . '/../assets/emails/' . $this->config['passwordsetting']['lostpasswordtmpl'] . '.html';
        $email_template = file_get_contents($email_path);
        if (empty($email_template)) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_RETRIEVING_TEMPLATE')} {$email_path}", 500);
        }
        if (empty($this->id)) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_RETRIEVING_USER')}", 500);
        }
        $guid = $this->generateResetToken();
        if (!$guid) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_CREATING_TOKEN')}", 500);
        }
        $link = '<a href="' . $this->config['site_url'] . '/index.php?controller=User&action=reset&gui=' . $guid . '">' . $this->config['site_url'] . '/index.php?controller=User&action=reset&gui=' . $guid . '</a>';
        // aromero: creo el registro del link temporal
        $timezone = !empty($this->default_timezone ) ? $this->default_timezone : $this->config['default_timezone'];
        $date_format = !empty($this->default_date_format ) ? $this->default_date_format : $this->config['default_date_format'];
        $time_format = !empty($this->default_time_format ) ? $this->default_time_format : $this->config['default_time_format'];

        // Reemplazar las variables en el email template
        foreach ($this->fields as $key => $value) {
            if (!empty($this->$key)) {
                $email_template = str_replace('{'.$key.'}', $this->$key, $email_template);
            }
        }
        $pwd_last_changed = new DateTime('now', new DateTimeZone($timezone));
        $email_template = str_replace('{pwd_last_changed}', $pwd_last_changed->format($date_format . ' ' . $time_format), $email_template);
        $email_template = str_replace('{link_guid}', $link, $email_template);
        $email_subject = 'Reseteo de contraseña solicitado';
        if($this->sendMail($this,$email_subject,$email_template)){
            return array('success' => true, 'msg' => "{$this->helper->translate('User','LBL_RESET_LINK_SENT')}");
        }else{
            return array('success' => false, 'error' => "{$this->helper->translate('User','LBL_ERROR_SENDING_MAIL')}");
        }
    }
}