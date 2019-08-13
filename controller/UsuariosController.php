<?php

class UsuariosController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = new UserModel();

        //Conseguimos todos los usuarios
        $allusers = $user->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("index", array(
            "allusers" => $allusers,
            "Hola" => "Soy Víctor Robles"
        ));
    }

    public function crear()
    {
        if (isset($_POST["nombre"])) {

            //Creamos un usuario
            $usuario = new UserModel();
            $usuario->nombre = $_POST["nombre"];
            $usuario->usuario = $_POST["apellido"];
            $usuario->correo = $_POST["email"];
            $usuario->clave = sha1($_POST["password"]);
            $save = $usuario->save();
            if(!$save){
                die('ERROR: <pre>'.print_r($usuario->lastError(),true).'</pre>');
            }
        }
        $this->redirect("Usuarios", "index");
    }

    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $usuario = new Usuario();
            $usuario->deleteById($id);
        }
        $this->redirect();
    }


    public function hola()
    {
        $usuarios = new UsuariosModel();
        $usu = $usuarios->getUnUsuario();
        var_dump($usu);
    }

}

?>
