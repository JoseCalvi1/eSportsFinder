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
        $this->view("User/login", array(
            'title' => 'Acceso',
            'error' => $error,
        ));
    }

    public function login()
    {
        global $current_user;
        $user = new User();
        if ($user->login($_REQUEST['username'], $_REQUEST['password'])) {
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
        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $guid = $_REQUEST['gui'];
        if (empty($guid)) {
            $error = 'El enlace no es correcto.';
        } else {
            $user = new User();
            $user->retrieveByToken($guid);
            if (empty($user->id)) {
                $error = 'El enlace no es correcto.';
            }
            if (!empty($_REQUEST['password'])) {
                if($user->resetPassword($_REQUEST['password'])) {
                    $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
                }else{
                    $error = 'No se ha podido resetear su contraseña, por favor intentelo de nuevo en otro momento.';
                }
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/reset", array(
            'title' => 'Recuperación de contraseña',
            'token' => $_REQUEST['gui'],
            'error' => $error,
            'msg' => 'Introduzca su nueva contraseña',
        ));
    }

    public function forgot()
    {

        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        if (!empty($_REQUEST['useremail'])) {
            $user = new User();
            $user_exist = $user->getBy('email', $_REQUEST['useremail']);
            if ($user_exist) {
                $result = $user->sendResetPasswordMail($_REQUEST['useremail']);
                if ($result['success']) {
                    $msg = $result['msg'] ? $result['msg'] : '';
                    //Cargamos la vista index y le pasamos valores
                    $this->view("User/emailSent", array(
                        'title' => '¿No puedes ingresar?',
                        'email' => $_REQUEST['useremail'],
                        'error' => $error,
                        'msg' => $msg,
                    ));
                    die;
                } else {
                    $error = $result['error'];
                }
            } else {
                $error = 'El email proporcionado no se corresponde con ningun usuario registrado';
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/forgot", array(
            'title' => '¿No puedes ingresar?',
            'error' => $error,
        ));
    }

}