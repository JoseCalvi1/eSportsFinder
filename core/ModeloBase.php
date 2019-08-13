<?php

class ModeloBase extends EntidadBase
{

    public function __construct($table, $fields = array(), $id = '')
    {
        $this->table = (string)$table;
        $this->fields = $fields;
        parent::__construct($table, $fields, $id);
    }

    public function save()
    {
        global $current_user;
        if (!empty($this->id)) {
            $this->modified_by = $current_user->id;
            if ($this->update()) {
                return true;
            }
        } else {
            $this->created_by = $current_user->id;
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



}

?>
