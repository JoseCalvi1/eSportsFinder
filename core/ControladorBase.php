<?php

class ControladorBase
{
    public $config;
    public $helper;

    public function __construct()
    {
        $config = array();
        require dirname(__FILE__).'/../config/config.php';
        $this->config = $config;
        require_once dirname(__FILE__).'/EntidadBase.php';
        require_once dirname(__FILE__).'/ModeloBase.php';
        require_once dirname(__FILE__).'/Util.php';
        $this->helper = new Util();
        //Incluir todos los modelos
        foreach (glob("model/*.php") as $file) {
            require_once $file;
        }
    }

    //Plugins y funcionalidades

    /*
    * Este método lo que hace es recibir los datos del controlador en forma de array
    * los recorre y crea una variable dinámica con el indice asociativo y le da el
    * valor que contiene dicha posición del array, luego carga los helpers para las
    * vistas y carga la vista que le llega como parámetro. En resumen un método para
    * renderizar vistas.
    */
    public function view($vista, $datos, $markup = false)
    {
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc} = $valor;
        }
        if ($markup) {
            require_once dirname(__FILE__).'/../view/Global/header.php';
        }
        require_once dirname(__FILE__).'/../view/' . $vista . 'View.php';
        if ($markup) {
            require_once dirname(__FILE__).'/../view/Global/footer.php';
        }
    }

    public function redirect($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $parametros = array())
    {
        $url = "index.php?controller=" . $controlador . "&action=" . $accion;
        if (!empty($parametros)) {

            echo '<form id="myForm" action="' . $url . '" method="post">';

            foreach ($parametros as $index => $val) {
                echo '<input type="hidden" name="' . htmlentities($index) . '" value="' . htmlentities($val) . '">';
            }
            echo '</form>';
            echo '<script type="text/javascript">';
            echo 'document.getElementById("myForm").submit();';
            echo '</script>';
        } else {
            header('Location:' . $url);
        }
    }

    //Métodos para los controladores
    public function page404($e)
    {
        // todo: hacer una página de 404
        //Cargamos la vista index y le pasamos valores
        $this->view("Global/error", array(
            'title' => 'Error',
            'error' => $e,
            'number' => $e->getCode(),
            'message' => $e->getMessage(),
            'referer' => $_SERVER['HTTP_REFERER'],
        ), true);
        die;
    }

    //Métodos para los controladores
    public function error($e)
    {
        //Cargamos la vista index y le pasamos valores
        $this->view("Global/error", array(
            'title' => 'Error',
            'error' => $e,
            'number' => $e->getCode(),
            'message' => $e->getMessage(),
            'referer' => $_SERVER['HTTP_REFERER'],
        ), true);
        die;
    }

    public function getNoMessages(){

        global $current_user;
        $res = '0';
        $message = new Message();
        $messages = $message->getInnerJoin('m.*, u.name','AS m INNER JOIN esf_users AS u ON m.id_user_from = u.id',"id_user_to='{$current_user->id}' AND markread=0", 'date_entered');

        if($messages) $res = count($messages);

        return $res;
    }
}

?>