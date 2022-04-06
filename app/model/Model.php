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

    public function count()
    {
        $query = "SELECT COUNT(id) FROM $this->table";
        $result = $this->db->read("SELECT COUNT(id) FROM $this->table");
        $result =  $this->db->read($query, [], PDO::FETCH_NUM);
        return $result[0][0];
    }

    public function selectLimit()
    {
        $query = "SELECT * FROM $this->table LIMIT 10";
        $result = $this->db->read($query);
        return $result;
    }
}
