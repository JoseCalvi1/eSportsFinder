<?php

// Controlador de localizaciones importantes para el proyecto
class MessageController extends ControladorBase
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

        $message = new Message();
        $messages = $message->getMessages("id_user_to='{$current_user->id}'",'date_entered');
        //Cargamos la vista index y le pasamos valores

        $this->view("Message/inbox", array(
            'title' => $this->helper->translate('Message', 'LBL_MESSAGES'),
            'messages' => $messages,
            'error' => $error,
        ));
    }

}