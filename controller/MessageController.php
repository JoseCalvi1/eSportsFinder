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
        $messages = $message->getInnerJoin('m.*, u.name','AS m INNER JOIN esf_users AS u ON m.id_user_from = u.id',"id_user_to='{$current_user->id}' AND status!='INV'", 'date_entered');
        $sent_messages = $message->getInnerJoin('m.*, u.name', 'AS m INNER JOIN esf_users AS u ON m.id_user_from = u.id',"id_user_from='{$current_user->id}'", 'date_entered');
        $invitations = $message->getInnerJoin('m.*, u.name', 'AS m INNER JOIN esf_users AS u ON m.id_user_from = u.id',"id_user_to='{$current_user->id}' AND status='INV'", 'date_entered');
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

        if($_REQUEST['message']['user_to']) {
            $user = new User();
            $id = $user->getBy('user_name', $_REQUEST['message']['user_to']);
            $message->id_user_to = $id[0]->id;
        } else {
            $message->id_user_to = $_REQUEST['message']['id_user_to'];
        }

        $message->id_user_from = $current_user->id;
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
        $player = new GameProfile();
        $trades = new Trade();

        $message->id = $_REQUEST['message']['id'];
        $message->updateN('accepted=1', "id = {$message->id}");

        $player->id_game = $_REQUEST['message']['id_game'];
        $player->id_team = $_REQUEST['message']['id_team'];
        $players = $player1->getList("id_user='{$current_user->id}' AND id_game='{$_REQUEST['message']['id_game']}'", 'id', 1);
        $player->name = $players[0]->name;
        $player->updateN("id_team={$player->id_team}", "name = '{$player->name}' AND id_game={$player->id_game}");

        $trades->id_user = $players[0]->id;
        $trades->id_team = $player->id_team;
        $trades->id_game = $player->id_game;
        $trades->action = 'IN';
        $trades->save();

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