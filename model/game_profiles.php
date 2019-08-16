<?php

class UserModel extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_game_profiles";
        $this->fields = array(
            'id' => '',
            'id_user' => '',
            'id_game' => '',
            'id_team' => '',
            'name' => '',
            'description' => '',
            'play_time' => '',
            'availability' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}