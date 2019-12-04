<?php

class Team extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_teams";
        $this->fields = array(
            'id' => '',
            'id_game' => '',
            'id_captain' => '',
            'name' => '',
            'team_tag' => '',
            'description' => '',
            'play_time' => '',
            'availability' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

    public function validateTeam($id_game, $team_name)
    {

        $errores = array();
        // Validación de nombre
        if (empty($errores['name'])) {
            $sql = "SELECT * from esf_teams WHERE id_game = '{$id_game}' AND name = '{$team_name}'";
            $res = $this->ejecutarSql($sql);
            if (!empty($res)) {
                $errores['name'] = $this->helper->translate('Team', 'LBL_NAME_EXISTING');
            }
        }

        return $errores;
    }

}