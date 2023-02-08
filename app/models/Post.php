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

    /**
     * get the posts from a category
     */
    public function getPostFromCategory($idCategory)
    {
        $query = "SELECT p.* FROM post p JOIN post_category pc ON p.id = pc.post_id WHERE pc.category_id = $idCategory";
        return $query;
    }

    /**
     * return the query to count posts
     */
    public function countPostFronCat($idCategory)
    {
        $query = "SELECT COUNT(p.id) FROM post p JOIN post_category pc ON p.id = pc.post_id WHERE pc.category_id = $idCategory";
        return $query;
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
