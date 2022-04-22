<?php

require_once('../app/model/model.php');

class PostModel extends Model
{
    protected $table = "post";

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
    public function insertPost($name, $content)
    {
        $query = "INSERT INTO post (name, content, created_at) VALUES(:name, :content, NOW())";
        $data['name'] = $name;
        $data['content'] = $content;
        $this->db->write($query, $data);
    }
}
