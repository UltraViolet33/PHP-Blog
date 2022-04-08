<?php

class Model
{
    protected $table = null;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getNewInstance();
    }

    /**
     * find an item in the bdd
     */
    public function find($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $data['id'] = $id;
        $result = $this->db->read($query, $data);
        return $result;
    }

    /** pour classe pagination */
    public function count()
    {
        $query = "SELECT COUNT(id) FROM $this->table";
        return $query;
    }

    public function limitItems(){
        $query = "SELECT * FROM $this->table";
        return $query;
    }
    /**fin essai clsse pagination */

    
    public function countAll()
    {
        $query = "SELECT COUNT(id) FROM $this->table";
        $result =  $this->db->read($query, [], PDO::FETCH_NUM);
        return $result[0][0];
    }

    public function getLimitItems($limit, $offset)
    {
        $query = "SELECT * FROM $this->table LIMIT $limit OFFSET $offset";
        return $this->db->read($query);
    }
}
