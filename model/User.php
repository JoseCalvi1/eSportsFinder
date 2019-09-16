<?php

class Users extends ModeloBase
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

    public function login(){
        global $current_user;


        // todo: hacer loguin y retrieve del user logueado
        $current_user = $this;
    }
}