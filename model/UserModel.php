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
}