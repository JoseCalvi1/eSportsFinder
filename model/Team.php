<?php

class Team extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_teams";
        $this->fields = array(
            'id' => '',
            'id_game' => '',
            'name' => '',
            'team_tag' => '',
            'description' => '',
            'play_time' => '',
            'availability' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}