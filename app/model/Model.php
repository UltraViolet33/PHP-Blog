<?php

class Model
{
    protected $table = null;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getNewInstance();
    }

    public function find($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $data['id'] = $id;
        $result = $this->db->read($query, $data);
        return $result;
    }
}
