<?php
define("CONTROLADOR_DEFECTO", "Home");
define("ACCION_DEFECTO", "index");
define("CONTROLADOR_HOME_DEFECTO", "Game");
define("ACCION_HOME_DEFECTO", "index");
//Más constantes de configuración
$db = '';
$cliente = '';
$current_user = !empty($_SESSION['current_user']) ? $_SESSION['current_user'] : '';
?>
