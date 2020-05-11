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
        $data = [];
        $user_hash_md5 = md5($password);
        $users = $this->getBy('user_name', $user_name);
        if (is_array($users)) {
            foreach ($users as $user) {
                if ($user->active == 2) {
                    $data['activation'] = 2;
                    $data['email'] = $user->email;
                    return $data;
                } else if ($this->checkPasswordMD5($user_hash_md5, $user->password) && $user->active == 1) {
                    $current_user = $user;
                    $_SESSION['current_user'] = $user;
                } else {
                    return false;
                }
            }
        } else if ($users) {
            if ($users->active == 2) {
                $data['activation'] = 2;
                $data['email'] = $users->email;
                return $data;
            } if ($this->checkPasswordMD5($user_hash_md5, $this->password) && $users->active == 1) {
                $current_user = new User($this->id);
                $_SESSION['current_user'] = $this;
            } else {
                return false;
            }
        }
        return false;
    }

    public function retrieveByToken($id)
    {

        $return = false;
        if ($this->config['passwordsetting']['linkexpiration'] == '1') {
            $sql = "SELECT * FROM esf_users_password_link WHERE id = '{$id}' AND date_generated >= NOW() LIMIT 1;";
        } else {
            $sql = "SELECT * FROM esf_users_password_link WHERE id = '{$id}' LIMIT 1;";
        }
        $gui = $this->ejecutarSql($sql);
        if (!empty($gui) && is_object($gui)) {
            $dataUser = $this->getBy('email', $gui->email);
            $this->getById($dataUser[0]->id);
            $return = true;
        }
        return $return;

    }

    public function resetPassword($password)
    {
        $result = false;
        $user_hash = @crypt(strtolower(md5($password)));
        if (!empty($this->id)) {
            $this->password = $user_hash;
            if ($this->save()) {
                $result = true;
                $this->login($this->user_name, $password);
                $sql = "DELETE FROM esf_users_password_link WHERE email = '{$this->email}';";
                $this->ejecutarSql($sql);
            }
        }
        return $result;
    }

    public function confirmEmail()
    {
        $result = false;
        if (!empty($this->id)) {
            if ($this->save()) {
                $result = true;
                $sql = "UPDATE esf_users SET active = 1 WHERE email = '{$this->email}';";
                $this->ejecutarSql($sql);
            }
        }
        return $result;
    }

    public function validateRegister($data)
    {
        $errores = array();
        // Validación de contraseñas
        if (!empty($data['password']) && !empty($data['rep_password'])) {
            if ($data['password'] != $data['rep_password']) {
                $errores['rep_password'] = $this->helper->translate('User', 'LBL_PASSWORD_NOT_EQUAL');
            }
            /*if(!preg_match('/{5,12}/',$data['password'])){
                $errores['password'] = $this->helper->translate('User','LBL_PASSWORD_NOT_EQUAL');
            }*/
        }

        if (!empty($data['email']) && !preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $data['email'])) {
            $errores['email'] = $this->helper->translate('User', 'LBL_EMAIL_REGEX');
        }

        if (empty($errores['email'])) {
            $sql = "SELECT email from esf_users WHERE email = '{$data['email']}'";
            $res = $this->ejecutarSql($sql);
            if (!empty($res->email)) {
                $errores['email'] = $this->helper->translate('User', 'LBL_EMAIL_EXISTING');
            }
        }

        if (empty($errores['user_name'])) {
            $sql = "SELECT user_name from esf_users WHERE user_name = '{$data['user_name']}'";
            $res = $this->ejecutarSql($sql);
            if (!empty($res->user_name)) {
                $errores['user_name'] = $this->helper->translate('User', 'LBL_USERNAME_EXISTING');
            }
        }

        // Validación de required
        foreach ($data as $campo => $dato) {
            if (!$dato) {
                $errores[$campo] = $this->helper->translate('LBL_REQUIRED');
            }
        }

        return $errores;
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

    public function sendResetPasswordMail($email)
    {
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
        $timezone = !empty($this->default_timezone) ? $this->default_timezone : $this->config['default_timezone'];
        $date_format = !empty($this->default_date_format) ? $this->default_date_format : $this->config['default_date_format'];
        $time_format = !empty($this->default_time_format) ? $this->default_time_format : $this->config['default_time_format'];

        // Reemplazar las variables en el email template
        foreach ($this->fields as $key => $value) {
            if (!empty($this->$key)) {
                $email_template = str_replace('{' . $key . '}', $this->$key, $email_template);
            }
        }
        $pwd_last_changed = new DateTime('now', new DateTimeZone($timezone));
        $email_template = str_replace('{pwd_last_changed}', $pwd_last_changed->format($date_format . ' ' . $time_format), $email_template);
        $email_template = str_replace('{link_guid}', $link, $email_template);
        $email_subject = 'Reseteo de contraseña solicitado';
        if ($this->sendMail($this, $email_subject, $email_template)) {
            return array('success' => true, 'msg' => "{$this->helper->translate('User','LBL_RESET_LINK_SENT')}");
        } else {
            return array('success' => false, 'error' => "{$this->helper->translate('User','LBL_ERROR_SENDING_MAIL')}");
        }
    }

    public function sendConfirmEmailMail()
    {
        $email_path = dirname(__FILE__) . '/../assets/emails/' . $this->config['passwordsetting']['confirmemailtmpl'] . '.html';
        $email_template = file_get_contents($email_path);
        if (empty($email_template)) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_RETRIEVING_TEMPLATE')} {$email_path}", 500);
        }
        if (empty($this->email)) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_RETRIEVING_USER')}", 500);
        }
        $guid = $this->generateResetToken();
        if (!$guid) {
            throw new Exception("{$this->helper->translate('User','LBL_ERROR_CREATING_TOKEN')}", 500);
        }
        $link = '<a href="' . $this->config['site_url'] . '/index.php?controller=User&action=confirm&gui=' . $guid . '">' . $this->config['site_url'] . '/index.php?controller=User&action=confirm&gui=' . $guid . '</a>';
        // aromero: creo el registro del link temporal
        $timezone = !empty($this->default_timezone) ? $this->default_timezone : $this->config['default_timezone'];
        $date_format = !empty($this->default_date_format) ? $this->default_date_format : $this->config['default_date_format'];
        $time_format = !empty($this->default_time_format) ? $this->default_time_format : $this->config['default_time_format'];

        // Reemplazar las variables en el email template
        foreach ($this->fields as $key => $value) {
            if (!empty($this->$key)) {
                $email_template = str_replace('{' . $key . '}', $this->$key, $email_template);
            }
        }
        $pwd_last_changed = new DateTime('now', new DateTimeZone($timezone));
        $email_template = str_replace('{pwd_last_changed}', $pwd_last_changed->format($date_format . ' ' . $time_format), $email_template);
        $email_template = str_replace('{link_guid}', $link, $email_template);
        $email_subject = 'Activar cuenta';
        if ($this->sendMail($this, $email_subject, $email_template)) {
            return array('success' => true, 'msg' => "{$this->helper->translate('User','LBL_RESET_LINK_SENT')}");
        } else {
            return array('success' => false, 'error' => "{$this->helper->translate('User','LBL_ERROR_SENDING_MAIL')}");
        }
    }
}