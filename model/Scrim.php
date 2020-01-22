<?php

class Scrim extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_trades";
        $this->fields = array(
            'id' => '',
            'id_game' => '',
            'id_team1' => '',
            'id_team2' => '',
            'status' => '',
            'date_scrim' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}