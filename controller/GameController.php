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

    public function index()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $game = new Game();
        $games = $game->getAllorder('status', 'name');

        //Cargamos la vista index y le pasamos valores
        $this->view("Game/list", array(
            'title' => 'Game list',
            'error' => $error,
            'games' => $games,
        ), true);

    }

    public function home()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $team = new Team();
        $id_game = $_GET['id'];
        $teams = $team->getList("id_game='{$id_game}'", 'id', 4);


        //Cargamos la vista home y le pasamos valores
        $this->view("Game/home", array(
            'title' => 'Game home',
            'error' => $error,
            'teams' => $teams,
        ), true);

    }

    public function teamList()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $team = new Team();
        $id_game = $_GET['id'];
        $teams = $team->getList("id_game='{$id_game}'", 'id', 20);


        //Cargamos la vista teamlist y le pasamos valores
        $this->view("Game/teamlist", array(
            'title' => 'Team list',
            'error' => $error,
            'teams' => $teams,
        ), true);

    }

    public function userList()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $user = new GameProfile();
        $id_game = $_GET['id'];
        $users = $user->getList("id_team IS NULL AND id_game='{$id_game}'","id", 20);


        //Cargamos la vista teamlist y le pasamos valores
        $this->view("Game/falist", array(
            'title' => 'Free agents list',
            'error' => $error,
            'users' => $users,
        ), true);

    }


}