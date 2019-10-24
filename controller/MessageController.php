<?php

// Controlador de localizaciones importantes para el proyecto
class MessageController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        //Cargamos la vista index y le pasamos valores
        $this->view("Message/inbox", array(
            'title' => $this->helper->translate('Message', 'LBL_MESSAGES'),
            'error' => $error,
        ));
    }

}