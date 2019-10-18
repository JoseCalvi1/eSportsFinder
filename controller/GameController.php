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
        $games = $game->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Game/list", array(
            'title' => 'Game list',
            'error' => $error,
            'games' => $games,
        ),true);

    }

    public function home()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';


        //Cargamos la vista index y le pasamos valores
        $this->view("Game/home", array(
            'title' => 'Game home',
            'error' => $error,
        ),true);

    }


}