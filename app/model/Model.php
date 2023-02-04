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

    /**  
     * return a sql query (for pagination class) 
     */
    public function count()
    {
        $query = "SELECT COUNT(id) FROM $this->table";
        return $query;
    }

    /**
     * return a sql query (for pagination class)
     */
    public function limitItems()
    {
        $query = "SELECT * FROM $this->table";
        return $query;
    }

    /**
     * count the items in a table
     */
    public function countAll()
    {
        $query = "SELECT COUNT(id) FROM $this->table";
        $result =  $this->db->read($query, [], PDO::FETCH_NUM);
        return $result[0][0];
    }

    /**
     * get limited items
     */
    public function getLimitItems($limit, $offset)
    {
        $query = "SELECT * FROM $this->table LIMIT $limit OFFSET $offset";
        return $this->db->read($query);
    }

    /**
     * delete an item
     */
    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $data['id'] = $id;
        $this->db->write($query, $data);
    }

    /**
     * get all the items
     */
    protected function getAllItems()
    {
        $query = "SELECT * FROM $this->table";
        return $this->db->read($query);
    }
}
