<?php

class Message extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_messages";
        $this->fields = array(
            'id' => '',
            'id_user_from' => '',
            'id_user_to' => '',
            'subject' => '',
            'message' => '',
            'status' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}