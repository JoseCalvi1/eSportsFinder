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
            'title' => $this->helper->translate('User', 'LBL_INIT_SESSION'),
            'error' => $error,
        ));
    }

    public function avisolegal()
    {

        $this->view("User/avisolegal", array(
            'title' => 'Aviso legal ',
        ));
    }

    public function register()
    {
        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        } else if (!empty($_REQUEST['user'])) {
            $user = new User();
            $error = $user->validateRegister($_REQUEST['user']);
            if (empty($error)) {
                $user->name = $_REQUEST['user']['name'];
                $user->email = $_REQUEST['user']['email'];
                $user->user_name = $_REQUEST['user']['user_name'];
                $user->password = @crypt(strtolower(md5($_REQUEST['user']['password'])));
                $user->active = 0;
                if ($user->sendConfirmEmailMail()) {
                    $user->save();
                    //Cargamos la vista index y le pasamos valores
                    $this->view("User/emailSent", array(
                        'title' => $this->helper->translate('User', 'LBL_FORGOT_TITLE'),
                        'email' => $_REQUEST['user']['email'],
                        'error' => $error,
                        'msg' => $this->helper->translate('User', 'LBL_SEND_EMAIL_CONFIRMATION'),
                    ));
                    return true;
                } else {
                    $error = $user->validateRegister($_REQUEST['user']);
                }
                $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
            }
        }
        //Cargamos la vista
        $this->view("User/register", array(
            'title' => $this->helper->translate('User', 'LBL_REGISTER_TITLE'),
            'error' => $error,
            'user' => $_REQUEST['user'],
        ));
    }

    public function confirm()
    {
        global $current_user;
        if (!empty($current_user)) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
        }
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $guid = $_REQUEST['gui'];
        if (empty($guid)) {
            $error = $this->helper->translate('User', 'LBL_ERROR_INVALID_TOKEN');
        } else {
            $user = new User();
            $user->retrieveByToken($guid);
            if ($user->confirmEmail()) {
                $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
            } else {
                $error = $this->helper->translate('User', 'LBL_ERROR_RESET_PASSWORD');
            }

        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/login", array(
            'title' => $this->helper->translate('User', 'LBL_INIT_SESSION'),
            'error' => $error,
            'msg' => $this->helper->translate('User', 'LBL_RESET_TITLE'),
        ));
    }

    public function login()
    {
        global $current_user;
        $user = new User();
        $error = '';
        $login_code = $user->login($_REQUEST['username'], $_REQUEST['password']);
        if($login_code['activation'] == 2) {
            $user->email = $login_code['email'];
            $user->name = $_REQUEST['username'];
            if ($user->sendConfirmEmailMail()) {
                //Cargamos la vista index y le pasamos valores
                $this->view("User/emailSent", array(
                    'title' => $this->helper->translate('LBL_REACTIVE_ACCOUNT'),
                    'email' => $login_code['email'],
                    'error' => $error,
                    'msg' => $this->helper->translate('LBL_REACTIVE'),
                ));
                return true;
            }
        } elseif ($user->login($_REQUEST['username'], $_REQUEST['password'])) {
            $this->redirect(CONTROLADOR_HOME_DEFECTO, ACCION_HOME_DEFECTO);
        } else {
            $this->redirect('User', 'index', array('error' => $this->helper->translate('User', 'LBL_ERROR_LOGIN')));
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
            $error = $this->helper->translate('User', 'LBL_ERROR_INVALID_TOKEN');
        } else {
            $user = new User();
            $user->retrieveByToken($guid);
            if (empty($user->id)) {
                $error = $this->helper->translate('User', 'LBL_ERROR_INVALID_TOKEN');
            }
            if (!empty($_REQUEST['password'])) {
                if ($user->resetPassword($_REQUEST['password'])) {
                    $this->redirect(CONTROLADOR_HOME_DEFECTO, 'index');
                } else {
                    $error = $this->helper->translate('User', 'LBL_ERROR_RESET_PASSWORD');
                }
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/reset", array(
            'title' => $this->helper->translate('User', 'LBL_NEW_PASSWORD'),
            'token' => $_REQUEST['gui'],
            'error' => $error,
            'msg' => $this->helper->translate('User', 'LBL_RESET_TITLE'),
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
                $user->getById($user_exist[0]->id);
                $result = $user->sendResetPasswordMail($_REQUEST['useremail']);
                if ($result['success']) {
                    $msg = $result['msg'] ? $result['msg'] : '';
                    //Cargamos la vista index y le pasamos valores
                    $this->view("User/emailSent", array(
                        'title' => $this->helper->translate('User', 'LBL_FORGOT_TITLE'),
                        'email' => $_REQUEST['useremail'],
                        'error' => $error,
                        'msg' => $msg,
                    ));
                    die;
                } else {
                    $error = $result['error'];
                }
            } else {
                $error = $this->helper->translate('User', 'LBL_ERROR_EMAIL_NOT_VALID');
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view("User/forgot", array(
            'title' => $this->helper->translate('User', 'LBL_FORGOT_TITLE'),
            'error' => $error,
        ));
    }

    public function deleteFUser()
    {
        $user = new User();

        $user->id = $_REQUEST['user']['id'];
        $user->active = '2';

        $user->save();
        $this->logout();
    }

    public function profile()
    {
        global $current_user;
        $error = !empty($_REQUEST['error']) ? $_REQUEST['error'] : '';
        if($_REQUEST['user']['id']) {
            $user = new User();
            $error = $user->validateRegister($_REQUEST['user']);
            if($_REQUEST['user']['email'] == $current_user->email) {
                $error['email'] = '';
            }
            if($_REQUEST['user']['user_name'] == $current_user->user_name) {
                $error['user_name'] = '';
            }
            $user->id = $_REQUEST['user']['id'];
            $user->name = $_REQUEST['user']['name'];
            if (empty($error['email'])) {
                $user->email = $_REQUEST['user']['email'];
            }
            if(empty($error['user_name'])) {
                $user->user_name = $_REQUEST['user']['user_name'];
            }
            $user->save();
        }
        $user = new User();
        $user = $user->getBy('id', $current_user->id);


        $players = new GameProfile();
        $player = $players->getInnerJoin('p.*, g.name AS game_name, g.media AS media', 'AS p INNER JOIN esf_games AS g ON p.id_game = g.id', "id_user='{$current_user->id}'", 'id');

        $roles = new GameRole();
        $role[] = $roles->getAll('media');

        //Cargamos la vista teamlist y le pasamos valores
        $this->view("User/profile", array(
            'title' => 'Profile',
            'error' => $error,
            'current_user' => $user[0],
            'player' => $player,
            'roles' => $role[0],
        ), true);

    }

    public function editPlayer()
    {
        $player = new GameProfile();

        $player->id = $_REQUEST['player']['id'];
        $player->name = $_REQUEST['player']['name'];
        $player->description = $_REQUEST['player']['description'];
        $player->play_time = $_REQUEST['player']['play_time'];
        $player->availability = $_REQUEST['player']['availability'][0] . ' | ' . $_REQUEST['player']['availability'][1] . ' | ' . $_REQUEST['player']['availability'][2];


        $player->updateN("name='{$player->name}', play_time='{$player->play_time}', description='{$player->description}', availability='{$player->availability}'", "id={$player->id}");
        header("Location: index.php?controller=User&action=profile");
        die();
    }

    public function deleteProfile()
    {
        $player = new GameProfile();
        $player->id = $_REQUEST['player']['id'];

        $player->deleteBy('id', "{$player->id}");
        header("Location: index.php?controller=User&action=profile");
        die();
    }

}