<?php

class GameRole extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_game_roles";
        $this->fields = array(
            'id' => '',
            'id_game' => '',
            'name' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}