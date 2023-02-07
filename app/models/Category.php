<?php

namespace App\models;
use App\models\Table;

class Category extends Table
{


    protected string $table = "category";

    
    /**
     * get the categories for a post
     */
    public function getCategoriesFromPost($idPost)
    {
        $query = "SELECT c.* FROM category c JOIN post_category pc ON c.id = pc.category_id WHERE pc.post_id = $idPost";
        $categories = $this->db->read($query);
        return $categories;
    }

    /**
     * get all the categories
     */
    public function getAllCategories()
    {
        $query = "SELECT name, id FROM $this->table";
        $categories = $this->db->read($query);
        return $categories;
    }

    /**
     * insert a category in the BDD
     */
    public function insertCategory($name)
    {
        $query = "INSERT INTO category(name) VALUES (:name)";
        $data['name'] = $name;
        $this->db->write($query, $data);
    }

    /**
     * update category
     */
    public function updateCategory($id, $name)
    {
        $query = "UPDATE category SET name = :name WHERE id = :id";
        $data['id'] = $id;
        $data['name'] = $name;
        $this->db->write($query, $data);
    }
}
