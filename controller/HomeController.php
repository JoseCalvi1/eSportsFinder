<?php

// Controlador de localizaciones importantes para el proyecto
class HomeController extends ControladorBase
{

    public function __construct()
    {
        global $current_user;
        parent::__construct();
    }

    public function index()
    {


        //Cargamos la vista index y le pasamos valores
        $this->view("Home/landing", array(
            'title' => 'Home',
        ),true);

    }


}