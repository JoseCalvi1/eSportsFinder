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
            'id_game' => '',
            'id_team' => '',
            'subject' => '',
            'message' => '',
            'status' => '',
            'accepted' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}