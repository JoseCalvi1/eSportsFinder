<?php
class Usuario extends EntidadBase{
    private $id;
    private $nombre;
    private $correo;
    private $usuario;
    private $clave;
    private $created_by;
    private $modified_by;
    private $date_entered;
    private $date_modified;
    private $id_cod;
     
    public function __construct() {
        $table="usuarios";
        parent::__construct($table);
    }
     
    public function getId() {
        return $this->id_usuario;
    }
 
    public function setId($id) {
        $this->id_usuario = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }
 
    public function setcorreo($correo) {
        $this->correo = $correo;
    }

    public function getUsuario() {
        return $this->usuario;
    }
 
    public function setusuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }
 
    public function setclave($correo) {
        $this->clave = $clave;
    }

 
    public function save(){
        $query="INSERT INTO usuarios (id,nombre,correo,usuario,clave)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->correo."',
                       '".$this->usuario."',
                       '".$this->clave."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>
