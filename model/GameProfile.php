<?php

class GameProfile extends ModeloBase
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

    public function validatePlayer($id_game, $player_name)
    {
        $error = '';
        // Validación de nombre
        if (empty($error)) {
            $sql = "SELECT * from esf_game_profiles WHERE id_game = '{$id_game}' AND name = '{$player_name}'";
            $res = $this->ejecutarSql($sql);
            if (!empty($res->name)) {
                return $error = 'true';
            }
        }

        return $error;
    }

}