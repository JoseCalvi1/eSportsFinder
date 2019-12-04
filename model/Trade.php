<?php

class Trade extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_trades";
        $this->fields = array(
            'id' => '',
            'id_user' => '',
            'id_game' => '',
            'id_team' => '',
            'action' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}