<?php
/**
 * Created by PhpStorm.
 * User: jcalvi
 * Date: 04/12/2019
 * Time: 10:31
 */

class ScrimController extends ControladorBase
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

        //Cargamos la vista index y le pasamos valores
        $this->view("Scrim/scrim", array(
            'title' => 'Team scrims',
            'current_user' => $current_user,
            'error' => $error,
        ));
    }

}