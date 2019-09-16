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
        die('<pre>'.print_r($current_user->name,true).'</pre>');
    }


}