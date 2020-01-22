<?php
/**
 * Created by PhpStorm.
 * User: jcalvi
 * Date: 04/12/2019
 * Time: 10:31
 */

class ScrimController extends ControladorBase
{

    public function __construct()
    {
        global $current_user;
        parent::__construct();
        if (empty($current_user)) {
            $this->redirect('User', 'index');
        }
    }

    public function index()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $id_game = $_GET['id'];

        $player = new GameProfile();
        $user = $player->getList("id_game='{$id_game}' AND id_user='{$current_user->id}'", 'id', '100');
        $user[0];

        $scrim = new Scrim();
        $scrims = $scrim->getInnerJoin('s.*, g.name AS NAME1', 'AS s INNER JOIN esf_teams AS g ON s.id_team1 = g.id', "s.id_game='{$id_game}' AND s.status='WAITING'", 's.date_entered');
        $my_scrims = $scrim->getInnerJoin('s.*, g.name AS NAME1, t.name AS NAME2', 'AS s INNER JOIN esf_teams AS g ON s.id_team1 = g.id INNER JOIN esf_teams AS t ON s.id_team2 = t.id', "(s.id_team1='{$user[0]->id_team}') or (s.id_team2='{$user[0]->id_team}') AND s.id_game='{$id_game}'", 's.date_entered');

        //Cargamos la vista index y le pasamos valores
        $this->view("Scrim/scrim", array(
            'title' => 'Team scrims',
            'current_user' => $current_user,
            'user' => $user[0],
            'scrims' => $scrims,
            'my_scrims' => $my_scrims,
            'error' => $error,
        ));
    }

    public function createTS()
    {
        global $current_user;
        $scrim = new Scrim();

        $scrim->id_game = $_REQUEST['scrim']['id_game'];
        $scrim->id_team1 = $_REQUEST['scrim']['id_team'];
        $scrim->duration = $_REQUEST['scrim']['duration'];
        $scrim->date_scrim = $_REQUEST['scrim']['date_scrim'];
        $scrim->status = "WAITING";
        $scrim->save();

        header("Location: index.php?controller=Scrim&action=index&id={$_REQUEST['scrim']['id_game']}");
        die();
    }

    public function responseScrim()
    {
        global $current_user;
        $scrim = new Scrim();

        $scrim->id_game = $_REQUEST['scrim']['id_game'];
        $scrim->id_team1 = $_REQUEST['scrim']['id_team1'];
        $scrim->id_team2 = $_REQUEST['scrim']['id_team2'];
        $scrim->duration = $_REQUEST['scrim']['duration'];
        $scrim->date_scrim = $_REQUEST['scrim']['date_scrim'];
        $scrim->status = "RESPONSED";
        $scrim->save();

        header("Location: index.php?controller=Scrim&action=index&id={$_REQUEST['scrim']['id_game']}");
        die();
    }

}