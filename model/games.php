<?php

class games extends ModeloBase
{

    public function __construct($id = '')
    {
        $this->table = "esf_games";
        $this->fields = array(
            'id' => '',
            'name' => '',
            'description' => '',
            'media' => '',
            'status' => '',
            'crossplay' => '',
            'platform' => '',
        );
        parent::__construct($this->table, $this->fields, $id);
    }

}