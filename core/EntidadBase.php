<?php

class EntidadBase
{
    protected $db;
    protected $table;
    protected $fields;


    public function __construct($table, $fields = array())
    {
        require_once 'Conectar.php';
        $this->db = (new Conectar())->conexion();
        $this->table = (string)$table;
        $this->fields = $fields;
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM $this->table");

        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if ($row = $query->fetch_object()) {
            foreach ($this->fields as $key => $value) {
                $this->$key = $row->$key;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getBy($column, $value)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function deleteById($id)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column, $value)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }

    public function insert()
    {
        $columns = array();
        $values = array();
        foreach ($this->fields as $key => $value) {
            $value = $this->$key;
            if (!empty($value)) {
                $columns[] = $key;
                $values[] = $value;
            }
        }
        if (!empty($columns)) {
            $columns = implode(",", $columns);
            $values = "'" . implode("','", $values) . "'";
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
            $query = $this->db->query($sql);
            if ($query) {
                $this->id = $this->db->insert_id;
                return $this->id;
            }
        }
        return false;

    }

    public function update()
    {
        $sets = array();
        foreach ($this->fields as $key => $value) {
            $value = $this->$key;
            if (!empty($value) && $key != 'id') {
                $sets[] = " {$key} = '{$value}' ";
            }
        }
        if (!empty($columns)) {
            $sets = implode(',',$sets);
            $sql = "UPDATE {$this->table} SET {$sets} WHERE id = '{$this->id}'";
            $query = $this->db->query($sql);
            if ($query) {
                $this->id = $this->db->insert_id;
                return $this->id;
            }
        }
        return false;
    }

    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

}

?>
