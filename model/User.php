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

    public function login($user_name, $password){
        global $current_user;
        $user_hash_md5 = md5($password);

        $users = $this->getBy('user_name', $user_name);
        foreach ($users as $user){
            if($this->checkPasswordMD5($user_hash_md5,$user->password)) {
                $current_user = $user;
                $_SESSION['current_user'] = $user;
            }else{
                return false;
            }
        }
        return false;
    }
}