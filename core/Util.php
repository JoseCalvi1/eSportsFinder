<?php

class Util
{

    public function url($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $parametros = array())
    {

        $urlString = "index.php?controller=" . $controlador . "&action=" . $accion;
        foreach ($parametros as $index => $val) {
            $urlString .= '&' . $index . '=' . $val;
        }
        return $urlString;
    }

    public function translate($module = '', $label = '')
    {
        $language = $_SESSION['current_user']->language;
        if(empty($language)){
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $lang = ($lang == 'es') ? 'es_ES' : $lang;
            $lang = ($lang == 'en') ? 'en_us' : $lang;
            $acceptLang = ['es_ES', 'en_us'];
            $language = in_array($lang, $acceptLang) ? $lang : 'es_ES';
        }
        require 'language/' . $language . '.php';
        $traduccion = $label;
        if (empty($label)) {
            $traduccion = $language[$module] ? $language[$module] : $module;
        } else {

            if(!empty($language[$module][$label])) {
                $traduccion = $language[$module][$label] ? $language[$module][$label] : $label;
            }else{

                $traduccion = $_SESSION['current_user']->app_list_strings->$module->$label ? $_SESSION['current_user']->app_list_strings->$module->$label : $label;
            }
        }
        return $traduccion;
    }
    public function dropdown($name = '')
    {
        return $_SESSION['current_user']->app_list_strings->$name;
    }
    public function getManagerUrl()
    {
        $config = array();
        require 'config/config.php';
        return $config['manager_url'];
    }

    public function duration_format($segundos)
    {
        // Controlamos por si el total es negativo
        $total_horas = "";
        if ($segundos < 0) {
            $total_horas .= "-";
            $segundos = $segundos * -1;
        } else {
            $total_horas .= "+";
        }

        // Calculamos el numero de horas en caso de tener acumulado más de 24
        $dias = gmdate("d", $segundos) - 1;
        $horas = gmdate("H", $segundos);
        if ($dias > 0) {
            $horas = $horas + ($dias * 24);
        }

        $total_horas .= $horas . ':' . gmdate("i:s", $segundos);

        return $total_horas;
    }

    public function time_from_seconds($segundos)
    {
        // Controlamos por si el total es negativo
        $total_horas = "";
        if ($segundos < 0) {
            $total_horas .= "-";
            $segundos = $segundos * -1;
        } else {
            $total_horas .= "";
        }

        // Calculamos el numero de horas en caso de tener acumulado más de 24
        $dias = gmdate("d", $segundos) - 1;
        $horas = gmdate("H", $segundos);
        if ($dias > 0) {
            $horas = $horas + ($dias * 24);
        }

        $total_horas .= $horas . ':' . gmdate("i:s", $segundos);

        return $total_horas;
    }

    public function date_format($string, $timezone = '')
    {
        $timezone = empty($timezone) ? $_SESSION['current_user']->timezone : 'UTC';
        $format = $_SESSION['current_user']->datef;
        $date = new DateTime($string, new DateTimeZone($timezone));
        return $date->format($format);
    }

    public function time_format($string, $timezone = '')
    {
        if (empty($string)) {
            $string = 'now';
        }
        $timezone = empty($timezone) ? $_SESSION['current_user']->timezone : 'UTC';
        $format = $_SESSION['current_user']->timef;
        $date = new DateTime($string, new DateTimeZone($timezone));
        return $date->format($format);
    }

    public function datetime_format($string, $timezone = '')
    {
        $timezone = empty($timezone) ? $_SESSION['current_user']->timezone : 'UTC';
        $date_format = $_SESSION['current_user']->datef;
        $time_format = $_SESSION['current_user']->timef;
        $date = new DateTime($string, new DateTimeZone($timezone));
        return $date->format($date_format . ' ' . $time_format);
    }

    public function es_findesemana($anio, $mes, $dia)
    {
        $class = "";
        $dia_w = date("w", mktime(0, 0, 0, $mes, $dia, $anio));
        // 0=domingo, 6=sabado
        if ($dia_w == 0 || $dia_w == 6) {
            return true;
        }
        return false;
    }

    //Helpers para las vistas
}

?>
