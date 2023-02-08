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


    
    public function insert(string $name): bool
    {
        $query = "INSERT INTO category(name) VALUES (:name)";
        return $this->db->write($query, ["name" => $name]);
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
