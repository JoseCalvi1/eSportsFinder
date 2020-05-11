<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL
register_shutdown_function("fatal_handler");
function fatal_handler()
{

    $error = error_get_last();
    if ($error !== NULL && $error['type'] != 8 && $error['type'] != 2) {
        $exception = new Exception("{$error['message']}<br> {$error['file']} at line {$error['line']}.", $error['type']);
        // Cargamos el controlador
        $controllerObj = new ControladorBase();
        // lanzamos la vista de error
        try {
            $controllerObj->error($exception);
        } catch (Throwable $e) {
            $controllerObj->error($e);
        }
    }
}

function cargarControlador($controller)
{
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'controller/' . $controlador . '.php';
    if (!is_file($strFileController)) {
        $strFileController = 'controller/' . ucwords(CONTROLADOR_DEFECTO) . 'Controller.php';
    }
    require_once $strFileController;
    try {
        $controllerObj = new $controlador();
    }catch (Throwable $e){
        $controller = ucwords(CONTROLADOR_DEFECTO). 'Controller';
        $controllerObj = new $controller();
        $e = new Exception($controllerObj->helper->translate('LBL_404'), 404);
        $controllerObj->page404($e);
    }
    return $controllerObj;
}

function cargarAccion($controllerObj, $action)
{
    try {
        $controllerObj->$action();
    } catch (Throwable $e) {
        $controllerObj->error($e);
    }
}

function lanzarAccion($controllerObj)
{
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else if (isset($_GET["action"]) && !method_exists($controllerObj, $_GET["action"])) {
        $e = new Exception($controllerObj->helper->translate('LBL_404'), 404);
        $controllerObj->page404($e);
    } else {
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}

?>
