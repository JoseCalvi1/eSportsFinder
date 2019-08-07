<?php
class ModeloBase extends EntidadBase{
    private $table;
    private $fields;
    private $fluent;
     
    public function __construct($table, $fields = array()) {
        $this->table=(string) $table;
        $this->fields = $fields;
        parent::__construct($table, $fields);
        $this->fluent = $this->getConetar()->startFluent();
    }
     
    public function fluent(){
        return $this->fluent;
    }
     
    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }
     
    //Aqui podemos montarnos métodos para los modelos de consulta
     
}
?>
