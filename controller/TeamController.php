<?php

// Controlador de localizaciones importantes para el proyecto
class GameController extends ControladorBase
{

    public function __construct()
    {
        global $current_user;
        parent::__construct();
        if (empty($current_user)) {
            $this->redirect('User', 'index');
        }
    }


    public function createTeam()
    {
        global $current_user;
        $team = new Team();

        $team->id_game = $current_user->id;
        $team->name = $_REQUEST['team']['name'];
        $team->description = $_REQUEST['team']['description'];
        $team->play_time = $_REQUEST['team']['play_time'];
        $team->created_by = $current_user->id;
        $team->modified_by = $current_user->id;
        $team->save();

        $this->redirect('Game', 'manageTeam');

    }


}