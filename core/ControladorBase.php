<?php

class ControladorBase
{
    public $helper;

    public function __construct()
    {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        require_once 'core/Util.php';
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
        $config = array();
        require 'config/config.php';
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc} = $valor;
        }

        require_once 'core/Util.php';
        $helper = new Util();
        if ($markup) {
            require_once 'view/Global/header.php';
        }
        require_once 'view/' . $vista . 'View.php';
        if ($markup) {
            require_once 'view/Global/footer.php';
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
    public function error()
    {
        require_once 'core/Util.php';
        $helper = new Util();
        $number = !empty($_REQUEST['number']) ? $_REQUEST['number'] : 500;
        $message = !empty($_REQUEST['message']) ? $_REQUEST['message'] : $helper->translate('LBL_UNEXPECTED_ERROR');
        $referer = $_SERVER['HTTP_REFERER'];
        //Cargamos la vista index y le pasamos valores
        $this->view("Global/error", array(
            'title' => 'Error',
            'number' => $number,
            'message' => $message,
            'referer' => $referer
        ), true);
        die;
    }
}

?>