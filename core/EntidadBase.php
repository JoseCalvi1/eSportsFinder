<?php

class EntidadBase
{
    protected $db;
    protected $table;
    protected $fields;
    public $config;

    public function __construct($table, $fields = array(), $id)
    {
        $config = array();
        require dirname(__FILE__) . '/../config/config.php';
        $this->config = $config;
        require_once dirname(__FILE__).'/Util.php';
        $this->helper = new Util();
        require_once 'Conectar.php';
        $this->db = (new Conectar())->conexion();
        $this->table = (string)$table;
        $this->fields = $fields;
        $this->fields['created_by'] = '';
        $this->fields['date_entered'] = '';
        $this->fields['modified_by'] = '';
        $this->fields['date_modified'] = '';
        $this->fields['deleted'] = 0;
        if (!empty($id)) $this->getById($id);
    }

    // TODO Función a revisar
    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM $this->table");
        $resultSet = array();

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return count($resultSet) ? $resultSet : false;
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if ($row = $query->fetch_object()) {
            foreach ($this->fields as $key => $value) {
                if (!empty($row->$key)) {
                    $this->$key = $row->$key;
                } else {
                    $this->$key = null;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function getBy($column, $value)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
        $resultSet = array();
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        if (count($resultSet) == 1) {
            foreach ($this->fields as $key => $value) {
                if (!empty($resultSet[0]->$key)) {
                    $this->$key = $resultSet[0]->$key;
                } else {
                    $this->$key = null;
                }
            }
            return true;
        }
        return count($resultSet) ? $resultSet : false;
    }

    // TODO Función a revisar
    public function getList($where, $order, $limit, $campos)
    {
        $query = $this->db->query("SELECT $campos FROM $this->table WHERE $where ORDER BY $order DESC LIMIT $limit");
        $resultSet = array();
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return count($resultSet) ? $resultSet : false;
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
        if (!empty($sets)) {
            $sets = implode(',', $sets);
            $sql = "UPDATE {$this->table} SET {$sets} WHERE id = '{$this->id}'";
            $query = $this->db->query($sql);
            if ($query) {
                return $this->id;
            }
        }
        return false;
    }

    // TODO: falta comprobar que el this->id existe
    public function deleteFake()
    {
        $sql = "UPDATE {$this->table} SET deleted='1' WHERE id = '{$this->id}'";
        $query = $this->db->query($sql);
        if ($query) {
            $this->id = $this->db->insert_id;
            return $this->id;
        }
        return false;
    }

    public function lastError()
    {
        return $this->db->error;
    }
    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

}

?>
