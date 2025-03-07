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
        $games = $game->getAll('status DESC, name');

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
        $players = new GameProfile();
        $roles = new GameRole();
        $game = new Game();
        $id_game = $_GET['id'];

        $idgame = $game->getBy('id', $id_game);
        $media = $idgame[0]->media;

        $teams = $team->getList("id_game='{$id_game}'", 'id', 4);
        $player = $players->getList("id_user='{$current_user->id}' AND id_game='{$id_game}'", 'id', 1);
        $role = $roles->getList("media='{$media}'", 'id', 30);

        if ($player || $current_user->admin == '1') {
            //Cargamos la vista home y le pasamos valores
            $this->view("Game/home", array(
                'title' => $idgame[0]->name,
                'error' => $error,
                'teams' => $teams,
                'game' => $idgame[0],
            ), true);
        } else {
            //Cargamos la vista create player y le pasamos valores
            $this->view("Game/createplayer", array(
                'title' => 'Player create',
                'error' => $error,
                'id_game' => $id_game,
                'role' => $role
            ), true);
        }
    }

    public function teamList()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $team = new Team();
        $game = new Game();
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
        $id_game = $_GET['id'];
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $user_team = new GameProfile();
        $id_team = $user_team->getList("id_user='{$current_user->id}' AND id_game='{$id_game}'", 'id', 1);
        $user = new GameProfile();
        $rol = new GameRole();
        $users = $user->getList("id_game='{$id_game}' AND id_team='0'", 'id', '100');
        $roles = $rol->getList("id_game='{$id_game}'", 'id', '100');

        //Cargamos la vista teamlist y le pasamos valores
        $this->view("Game/falist", array(
            'title' => 'Free agents list',
            'error' => $error,
            'users' => $users,
            'roles' => $roles,
            'id_team' => $id_team[0]->id_team,
            'id_game' => $id_game,
        ), true);

    }

    public function createPlayer()
    {
        global $current_user;
        $player = new GameProfile();

        $error = $player->validatePlayer($_REQUEST['player']['id_game'], $_REQUEST['player']['name']);
        if (empty($error)) {
            $player->id_game = $_REQUEST['player']['id_game'];
            $player->id_user = $current_user->id;
            $player->name = $_REQUEST['player']['name'];
            $player->description = $_REQUEST['player']['description'];
            $player->play_time = $_REQUEST['player']['play_time'];
            $player->availability = $_REQUEST['player']['availability'][0] . ' | ' . $_REQUEST['player']['availability'][1] . ' | ' . $_REQUEST['player']['availability'][2];
            $player->save();
            header("Location: index.php?controller=Game&action=home&id={$_REQUEST['player']['id_game']}");
            die();
        }

        // todo redirigir bien
        header("Location: index.php?controller=Game&action=home&id={$_REQUEST['player']['id_game']}&error=true");
        die();
    }


}