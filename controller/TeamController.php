<?php
/**
 * Created by PhpStorm.
 * User: jcalvi
 * Date: 18/11/2019
 * Time: 11:49
 */

class TeamController extends ControladorBase
{
    public function __construct()
    {
        global $current_user;
        parent::__construct();
        if (empty($current_user)) {
            $this->redirect('User', 'index');
        }
    }

    public function manageTeam()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $id_game = $_GET['id'];
        $team = new Team();
        $teams = $team->getList("created_by={$current_user->id} AND id_game={$id_game}", 'id', '10');

        if($teams) {
            $player = new GameProfile();
            $players = $player->getList("id_team={$teams[0]->id}", 'id', '10');
            //Cargamos la vista index y le pasamos valores
            $this->view("Team/manageteam", array(
                'title' => 'Game team',
                'error' => $error,
                'teams' => $teams,
                'players' => $players,
                'id_game' => $id_game,
            ), true);
        } else {
            //Cargamos la vista index y le pasamos valores
            $this->view("Team/createteam", array(
                'title' => 'Game team',
                'error' => $error,
                'id_game' => $id_game,
            ), true);
        }

    }

    public function createTeam()
    {
        global $current_user;
        $team = new Team();
        $player = new GameProfile();

        $team->id_game = $_REQUEST['team']['id_game'];
        $team->name = $_REQUEST['team']['name'];
        $team->name = $_REQUEST['team']['team_tag'];
        $team->description = $_REQUEST['team']['description'];
        $team->play_time = $_REQUEST['team']['play_time'];
        $team->save();
        $player->updateN("id_team={$team->id}", "created_by = {$current_user->id}");

        // todo redirigir bien
        header("Location: index.php?controller=Team&action=manageTeam&id={$_REQUEST['team']['id_game']}");
        die();
    }

}