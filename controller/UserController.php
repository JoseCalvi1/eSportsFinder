<?php

// Controlador de localizaciones importantes para el proyecto
class UserController extends ControladorBase
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
        $this->view("Users/login", array(
            'title' => 'Acceso',
            'error' => $error,
        ));
    }

    public function login()
    {
        global $current_user;
        $user = new User();
        if ($user->login($_REQUEST['username'],$_REQUEST['password'])) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, ACCION_HOME_DEFECTO);
        } else {
            $this->redirect('User', 'index', array('error' => 'Usuario o contraseña incorrectos'));
        }
    }


    public function logout()
    {
        global $current_user;
        session_destroy();
        $current_user = '';
        $this->redirect('User', 'index');
    }

    public function reset()
    {
        if (isset($_SESSION['login_user'])) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $gui = $_REQUEST['gui'];
        $user = new UserModel();
        $gui = $user->retrieveToken($gui);
        if (!empty($gui->id) && !empty($_REQUEST['password'])) {
            if($user->resetPassword($gui,$_REQUEST['password'])){
                $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
            }else{
                //Cargamos la vista index y le pasamos valores
                $this->view("User/reset", array(
                    'title' => 'Recuperación de contraseña',
                    'token' => $_REQUEST['gui'],
                    'error' => true,
                    'msg' => 'Introduzca su nueva contraseña',
                ));
            }
        } else if (!empty($gui->id)) {
            //Cargamos la vista index y le pasamos valores
            $this->view("User/reset", array(
                'title' => 'Recuperación de contraseña',
                'token' => $_REQUEST['gui'],
                'error' => false,
                'msg' => 'Introduzca su nueva contraseña',
            ));
        }else{
            //Cargamos la vista index y le pasamos valores
            $this->view("User/reset", array(
                'title' => 'Recuperación de contraseña',
                'token' => $_REQUEST['gui'],
                'error' => true,
                'msg' => 'El enlace no es correcto.',
            ));
        }
    }

    public function forgot()
    {
        $config = array();
        require 'config/config.php';
        if (isset($_SESSION['login_user'])) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        if (empty($_REQUEST['useremail'])) {
            //Cargamos la vista index y le pasamos valores
            $this->view("User/forgot", array(
                'title' => '¿No puedes ingresar?',
                'error' => $_REQUEST['error'],
                'error_msg' => $_REQUEST['error_msg']
            ));
        } else {
            $user = new UserModel();
            $result = $user->sendResetPasswordMail($_REQUEST['useremail']);
            //Cargamos la vista index y le pasamos valores
            $this->view("User/emailSent", array(
                'title' => '¿No puedes ingresar?',
                'email' => $_REQUEST['useremail'],
                'error' => $result['success'] ? '' : 'text-danger',
                'msg' => $result['msg']
            ));

        }
    }

}