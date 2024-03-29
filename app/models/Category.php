<?php

namespace App\models;

use App\models\Table;

class Category extends Table
{
    protected string $table = "category";
    protected string $id = "id";


    public function getCategoriesFromPost(int $idPost): array
    {
        $query = "SELECT c.* FROM category c JOIN post_category pc ON c.id = pc.category_id WHERE pc.post_id = $idPost";
        return $this->db->read($query);
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
}
