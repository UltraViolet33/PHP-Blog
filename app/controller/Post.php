<?php

require_once('../app/core/Controller.php');
require_once('../app/helpers/Pagination.php');

class Post extends Controller
{

    public function __construct()
    {
        $this->postModel = $this->loadModel("PostModel");
    }

    /**
     * display post index page
     */
    public function index()
    {
        $queryCount = $this->postModel->count();
        $queryItems = $this->postModel->limitItems();
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, "post");
        $limitPosts = $paginatePosts->getItems();

        foreach ($limitPosts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }

        $data['limitPosts'] = $limitPosts;
        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        $this->view("posts/index", $data);
    }

    /**
     * display details page for post
     */
    public function details($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            header("Location: " . ROOT . "post");
            return;
        }
        $post[0]->created_at = $this->dateToString($post[0]->created_at);
        $data['post'] = $post[0];
        $this->view("posts/detailsPost", $data);
    }

    /**
     * display posts from categories
     */
    public function category($id)
    {
        $categoryModel = $this->loadModel("CategoryModel");
        $category = $categoryModel->find($id);
        if (!$category) {
            header("Location: " . ROOT . "category/index");
            return;
        }
        $posts = $this->postModel->getPostFromCategory($id);
        if (!$posts) {
            header("Location: " . ROOT . "category/index");
            return;
        }

        $queryCount = $this->postModel->countPostFronCat($id);
        $queryItems = $this->postModel->getPostFromCategory($id);
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, "post/category");
        $limitPosts = $paginatePosts->getItems();

        foreach ($limitPosts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }

        $data['limitPosts'] = $limitPosts;
        $data['nextLink'] = null;
        $data['previousLink'] = null;
        $this->view("posts/index", $data);
    }

    /**
     * convert date MySQL to dd/mm/yyyy
     */
    private function dateToString($date)
    {
        $dateFormat = new DateTime($date);
        return $dateFormat->format("m/d/Y");
    }


    /**
     * get an extract of a post content
     */
    private function getExtractContent($content)
    {
        if (strlen($content) <= 50) {
            return $content;
        }
        return substr($content, 0, 50) . "...";
    }


    /**
     * get the paginated posts
     */
    public function getPaginatedPosts($path)
    {
        $queryCount = $this->postModel->count();
        $queryItems = $this->postModel->limitItems();
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, $path);
        $limitPosts = $paginatePosts->getItems();

        foreach ($limitPosts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }

        $data['limitPosts'] = $limitPosts;
        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        return $data;
    }

    /**
     * delete one post
     */
    public function delete($id)
    {
        $this->postModel->delete($id);
    }

    /**
     * update post
     */
    public function update($id, $name, $content)
    {
        $this->postModel->updatePost($id, $name, $content);
    }

    /**
     * insert a post
     */
    public function insert($name, $content)
    {
        $this->postModel->insertPost($name, $content);
    }
}
