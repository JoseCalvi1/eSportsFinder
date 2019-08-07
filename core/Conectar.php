<?php
class Conectar{
    private $driver;
    private $host, $user, $pass, $database, $charset;
   
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }

    public function conexion(){
        global $db;
        if (empty($db)) {
            if ($this->driver == "mysql" || $this->driver == null) {
                $con = new mysqli($this->host, $this->user, $this->pass, $this->database);
                $con->query("SET NAMES '" . $this->charset . "'");
                $con->set_charset($this->charset);
                $sql = "SET time_zone = 'GMT';";
                $sentencia = $con->prepare($sql);
                $sentencia->execute();
                $db = $con;
            }
        }
        return $db;
    }
     
    public function startFluent(){
        require_once "PDO/PDO.php";
         
        if($this->driver=="mysql" || $this->driver==null){
            $pdo = new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);
            $fpdo = new FluentPDO($pdo);
        }
         
        return $fpdo;
    }
}
?>
