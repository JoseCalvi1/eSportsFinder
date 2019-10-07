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
            'title' => $this->helper->translate('User','LBL_INIT_SESSION'),
            'error' => $error,
        ));
    }

    public function register(){
        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        if (!empty($_REQUEST['email'])) {

        }
        //Cargamos la vista
        $this->view("User/register", array(
            'title' => $this->helper->translate('User','LBL_REGISTER_TITLE'),
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
            $this->redirect('User', 'index', array('error' => $this->helper->translate('User','')));
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
            $error = $this->helper->translate('User','LBL_ERROR_INVALID_TOKEN');
        } else {
            $user = new User();
            $user->retrieveByToken($guid);
            if (empty($user->id)) {
                $error = $this->helper->translate('User','LBL_ERROR_INVALID_TOKEN');
            }
            if (!empty($_REQUEST['password'])) {
                if($user->resetPassword($_REQUEST['password'])) {
                    $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
                }else{
                    $error = $this->helper->translate('User','LBL_ERROR_RESET_PASSWORD');
                }
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/reset", array(
            'title' => $this->helper->translate('User','LBL_NEW_PASSWORD'),
            'token' => $_REQUEST['gui'],
            'error' => $error,
            'msg' => $this->helper->translate('User','LBL_RESET_TITLE'),
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
                        'title' => $this->helper->translate('User','LBL_FORGOT_TITLE'),
                        'email' => $_REQUEST['useremail'],
                        'error' => $error,
                        'msg' => $msg,
                    ));
                    die;
                } else {
                    $error = $result['error'];
                }
            } else {
                $error = $this->helper->translate('User','LBL_ERROR_EMAIL_NOT_VALID');
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/forgot", array(
            'title' => $this->helper->translate('User','LBL_FORGOT_TITLE'),
            'error' => $error,
        ));
    }

}