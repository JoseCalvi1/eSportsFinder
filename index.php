<?php
//Base para los controladores
require_once 'core/EntidadBase.php';
require_once 'core/ModeloBase.php';
require_once 'model/User.php';
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();

//Configuración global
require_once 'config/global.php';

//Base para los controladores
require_once 'core/ControladorBase.php';
 
//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';
 
//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
?>
