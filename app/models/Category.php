<?php

namespace App\models;

use App\models\Table;

class Category extends Table
{


    protected string $table = "category";
    protected string $id = "id";


    /**
     * get the categories for a post
     */
    public function getCategoriesFromPost($idPost)
    {
        $query = "SELECT c.* FROM category c JOIN post_category pc ON c.id = pc.category_id WHERE pc.post_id = $idPost";
        $categories = $this->db->read($query);
        return $categories;
    }


    public function selectAll(): array
    {
        $query = "SELECT name, id FROM $this->table";
        return $this->db->read($query);
    }



    public function insert(string $name): bool
    {
        $query = "INSERT INTO category(name) VALUES (:name)";
        return $this->db->write($query, ["name" => $name]);
    }


    public function update(array $data): bool
    {
        $query = "UPDATE category SET name = :name WHERE id = :id";
        return $this->db->write($query, $data);
    }

    // public function delete(int $id): bool
    // {
    //     $query = "DELETE FROM category WHERE id = :id";
    //     return $this->db->write($query, ["id" => "id"]);
    // }
}
