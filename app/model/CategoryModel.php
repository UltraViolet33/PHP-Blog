<?php

require_once('../app/model/model.php');

class CategoryModel extends Model
{
    protected $table = "category";

    /**
     * insertCategories
     * to test the bdd ans the categories
     */
    public function insertCategories()
    {
        for ($i = 1; $i < 50; $i++) {
            $query = "INSERT INTO category(name, slug) VALUES('cat{$i}', 'cat-{$i}')";
            $this->db->write($query);
        }
    }

    public function countCategories()
    {
        return $this->count();
    }

    public function getLimitCategories($limit, $offset)
    {
        $query = "SELECT * FROM category LIMIT $limit OFFSET $offset";
        $limitCategories = $this->db->read($query);
        return $limitCategories;
    }
}
