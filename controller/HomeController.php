<?php

// Controlador de localizaciones importantes para el proyecto
class HomeController extends ControladorBase
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


}