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
        $player = new GameProfile();
        $players = $player->getList("id_user = {$current_user->id} AND id_game={$id_game}", 'id', '1');
        $team = new Team();
        $teams = $team->getList("id={$players[0]->id_team}", 'id', '10');
        //$player1 = $players[0];
        //$id_captain = $player->getBy('id_user', "{$teams[0]->id_captain}");
        //die('<pre>2: '.print_r($id_captain, true).'</pre>');

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
                'current_user' => $current_user,
                //'id_captain' => $id_captain[0]->id,
            ), true);
        } else {
            //Cargamos la vista index y le pasamos valores
            $this->view("Team/createteam", array(
                'title' => 'Team create',
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
        $team->id_captain = $current_user->id;
        $team->team_tag = $_REQUEST['team']['team_tag'];
        $team->description = $_REQUEST['team']['description'];
        $team->play_time = $_REQUEST['team']['play_time'];
        $team->save();
        $player->updateN("id_team={$team->id}", "created_by = {$current_user->id} AND id_game={$_REQUEST['team']['id_game']}");

        // todo redirigir bien
        header("Location: index.php?controller=Team&action=manageTeam&id={$_REQUEST['team']['id_game']}");
        die();
    }

    public function sendInvite()
    {
        global $current_user;
        $message = new Message();
        $name = $_REQUEST['player']['name'];
        $players = new GameProfile();
        $player = $players->getBy('name', "{$name}");
        $message->id_user_from = $current_user->id;
        $message->id_user_to = $player[0]->id_user;
        $message->subject = $_REQUEST['player']['subject'];
        $message->message = $_REQUEST['player']['message'];
        $message->id_game = $_REQUEST['player']['id_game'];
        $message->id_team = $_REQUEST['player']['id_team'];
        $message->status = "INV";
        $message->save();

        header("Location: index.php?controller=Team&action=manageTeam&id={$_REQUEST['player']['id_game']}");
        die();
    }

    public function leaveTeam() {
        $id = $_REQUEST['player']['id'];
        $id_game = $_REQUEST['player']['id_game'];
        $players = new GameProfile();
        $players->updateN("id_team=0", "id = {$id} AND id_game={$id_game}");
        header("Location: index.php?controller=Team&action=manageTeam&id={$id_game}");
        die();
    }

    public function deleteTeam() {
        $id_team = $_REQUEST['player']['id_team'];
        $id_game = $_REQUEST['player']['id_game'];
        $players = new GameProfile();
        $teams = new Team();

        $teams->deleteBy('id', "{$id_team}");
        $players->updateN("id_team=0", "id_team = {$id_team} AND id_game={$id_game}");
        header("Location: index.php?controller=Game&action=home&id={$id_game}");
        die();
    }

    public function editTeam() {
        $id_game = $_REQUEST['team']['id_game'];
        $id = $_REQUEST['team']['id'];
        $name = $_REQUEST['team']['name'];
        $team_tag = $_REQUEST['team']['team_tag'];
        $description = $_REQUEST['team']['description'];
        $teams = new Team();

        $teams->updateN("name='{$name}', team_tag='{$team_tag}', description='{$description}'", "id={$id}");
        header("Location: index.php?controller=Team&action=manageTeam&id={$id_game}");
        die();
    }

}