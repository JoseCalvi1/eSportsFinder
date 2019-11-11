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
        $messages = $message->getMessages("id_user_to='{$current_user->id}'", 'date_entered');
        $sent_messages = $message->getMessages("id_user_from='{$current_user->id}'", 'date_entered');
        $invitations = $message->getMessages("id_user_to='{$current_user->id}' AND status='INV'", 'date_entered');
        //Cargamos la vista index y le pasamos valores

        $this->view("Message/inbox", array(
            'title' => $this->helper->translate('Message', 'LBL_MESSAGES'),
            'messages' => $messages,
            'sent_messages' => $sent_messages,
            'invitations' => $invitations,
            'error' => $error,
        ));
    }

    public function sendMessage()
    {
        global $current_user;
        $message = new Message();

        $message->id_user_from = $current_user->id;
        $message->id_user_to = $_REQUEST['message']['id_user_to'];
        $message->subject = $_REQUEST['message']['subject'];
        $message->message = $_REQUEST['message']['description'];
        $message->created_by = $current_user->id;
        $message->modified_by = $current_user->id;
        $message->save();

        $this->redirect('Message', 'index');
    }

    public function acceptInv()
    {
        global $current_user;
        $message = new Message();

        $message->id = $_REQUEST['message']['id'];
        $message->accepted = 1;
        $message->updateInv($message->id);
        //todo Agregar el jugador al equipo correspondiente
        $this->refuseInv();

        $this->redirect('Message', 'index');
    }

    public function refuseInv()
    {
        global $current_user;
        $message = new Message();

        $message->id = $_REQUEST['message']['id'];
        $message->deleteById($message->id);

        $this->redirect('Message', 'index');
    }

}