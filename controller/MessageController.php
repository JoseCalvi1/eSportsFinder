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
            'current_user' => $current_user,
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
        $player1 = new GameProfile();
        $players = $player1->getBy('id_user', "{$current_user->id}");
        $player = new GameProfile();

        $message->id = $_REQUEST['message']['id'];
        $message->updateN('accepted=1', "id = {$message->id}");

        //todo Agregar el jugador al equipo correspondiente
        $player->id_game = $_REQUEST['message']['id_game'];
        $player->id_team = $_REQUEST['message']['id_team'];
        $player->name = $players[0]->name;
        $player->updateN("id_team={$player->id_team}", "name = '{$player->name}' AND id_game={$player->id_game}");

        $this->refuseInv();
        // todo redirigir bien
        header("Location: index.php?controller=Team&action=manageTeam&id={$_REQUEST['message']['id_game']}");
        die();
    }

    public function refuseInv()
    {
        global $current_user;
        $message = new Message();

        $message->id = $_REQUEST['message']['id'];
        $message->deleteBy('id', $message->id);

        $this->redirect('Message', 'index');
    }

}