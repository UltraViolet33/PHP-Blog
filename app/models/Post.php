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

    /**
     * update post
     */
    public function updatePost($id, $name, $content)
    {
        $query = "UPDATE post SET name = :name, content = :content WHERE id = :id";
        $data['id'] = $id;
        $data['name'] = $name;
        $data['content'] = $content;
        $this->db->write($query, $data);
    }

    /**
     * insert a post
     */
    public function insertPost($name, $content, $categories)
    {
        $idPost = [];
        $query = "INSERT INTO post (name, content, created_at) VALUES(:name, :content, NOW())";
        $data['name'] = $name;
        $data['content'] = $content;
        $this->db->write($query, $data);
        $idPost = $this->db->getLastInsertId();

        $data = [];

        $queryPostCategories = "INSERT INTO post_category (post_id, category_id) VALUES (:post_id, :category_id)";
        $data['post_id']  = $idPost;
        for ($i = 0; $i < count($categories); $i++) {
            $data['category_id'] = $categories[$i];
            $this->db->write($queryPostCategories, $data);
            $data['category_id'] = null;
        }
    }
}
