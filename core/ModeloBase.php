<?php

class ModeloBase extends EntidadBase
{

    public function __construct($table, $fields = array(), $id = '')
    {
        $this->table = (string)$table;
        $this->fields = $fields;
        parent::__construct($table, $fields);
        if (!empty($id)) $this->getById($id);

    }

    public function save()
    {
        if (!empty($this->id)) {
            if ($this->update()) {
                return true;
            }
        } else {
            if ($this->insert()) {
                return true;
            }
        }
        return false;
    }

    public function ejecutarSql($query)
    {
        $query = $this->db->query($query);
        if ($query == true) {
            if ($query->num_rows > 1) {
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            } elseif ($query->num_rows == 1) {
                if ($row = $query->fetch_object()) {
                    $resultSet = $row;
                }
            } else {
                $resultSet = true;
            }
        } else {
            $resultSet = false;
        }

        return $resultSet;
    }

    public function lastError()
    {
        return $this->db->error;
    }

}

?>
