<?php

class UserModel extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "usuarios";
        $this->fields = array(
            'id' => '',
            'nombre' => '',
            'correo' => '',
            'usuario' => '',
            'clave' => '',
            'created_by' => '',
            'modified_by' => '',
            'date_entered' => '',
            'date_modified' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

    public function save()
    {
        global $current_user;
        if (!empty($this->id)) {
            $this->modified_by = $current_user->id;
            if ($this->update()) {
                return true;
            }
        } else {
            if ($this->insert()) {
                return true;
            }
        }
        return false;
    }

    public function login(){
        global $current_user;


        // todo: hacer loguin y retrieve del user logueado
        $current_user = $this;
    }
}