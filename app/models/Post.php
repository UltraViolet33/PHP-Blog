<?php

namespace App\models;

use App\models\Table;


class Post extends Table
{
    // protected $table = "post";

    protected string $table = "post";
    protected string $id = "id";

    /**
     * get posts from the BDD
     */
    public function getLimitItems($limit, $offset)
    {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
        return $this->db->read($query);
    }



    public function getPostFromCategory(int $idCategory): string
    {
        return "SELECT p.* FROM post p JOIN post_category pc ON p.id = pc.post_id WHERE pc.category_id = $idCategory";
    }



    public function getQueryCountPostsFromCategory(int $idCategory): string
    {
        return  "SELECT COUNT(p.id) FROM post p JOIN post_category pc ON p.id = pc.post_id WHERE pc.category_id = $idCategory";
    }



    public function update(array $data): bool
    {
        $query = "UPDATE post SET name = :name, content = :content WHERE id = :id";
        return $this->db->write($query, $data);
    }

    public function deletePostCategories(int $id): bool
    {
        $query = "DELETE FROM post_category WHERE post_id = :id";
        return $this->db->write($query, ["id" => $id]);
    }


    public function insert(array $data): int
    {
        $query = "INSERT INTO post (name, content, created_at) VALUES(:name, :content, NOW())";
        $this->db->write($query, $data);
        return $this->db->getLastInsertId();
    }

    public function insertPostCategories(array $data): bool
    {
        $query = "INSERT INTO post_category (post_id, category_id) VALUES (:post_id, :category_id)";
        return $this->db->write($query, $data);
    }
}
