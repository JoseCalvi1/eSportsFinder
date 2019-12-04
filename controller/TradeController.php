<?php
/**
 * Created by PhpStorm.
 * User: jcalvi
 * Date: 04/12/2019
 * Time: 10:31
 */

class TradeController extends ControladorBase
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
        $id_game = $_GET['id'];
        $trade = new Trade();

        $trades = $trade->getInnerJoin('t.*, g.name AS user_name, e.name AS team_name','AS t INNER JOIN esf_game_profiles AS g ON t.id_user = g.id INNER JOIN esf_teams AS e ON t.id_team = e.id',"t.id_game='{$id_game}'", 't.date_entered');

        //Cargamos la vista index y le pasamos valores
        $this->view("Trade/trade", array(
            'title' => 'Trades',
            'current_user' => $current_user,
            'trades' => $trades,
            'error' => $error,
        ));
    }

}