<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Post;
use App\helpers\Pagination;
use App\models\Category;
use DateTime;

class PostController extends Controller
{
    public Post $postModel;
    public Category $categoryModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }


    public function index(): void
    {
        $queryCount = $this->postModel->getQueryCount();
        $queryItems = $this->postModel->getQueryEverything();
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, "post");
        $posts = $paginatePosts->getItems();

        foreach ($posts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }

        $data['posts'] = $posts;
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



    private function getExtractContent(string $content): string
    {
        if (strlen($content) <= 50) {
            return $content;
        }
        return substr($content, 0, 50) . "...";
    }



    public function getPaginatedPosts(string $path): array
    {
        $queryCount = $this->postModel->getQueryCount();
        $queryItems = $this->postModel->getQueryEverything();
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, $path);
        $posts = $paginatePosts->getItems();

        foreach ($posts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }

        $data['posts'] = $posts;
        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        return $data;
    }

    /**
     * delete one post
     */
    // public function delete2($id)
    // {
    //     $this->postModel->delete($id);
    // }



    public function delete(int $id): bool
    {
        return $this->postModel->delete($id);
    }


    /**
     * update post
     */
    public function update(int $idPost, array $dataPost, array $categories)
    {
        $dataPost["id"] = $idPost;
        $this->postModel->update($dataPost);
        $this->updatePostCategories($idPost, $categories);
    }

    private function updatePostCategories(int $idPost, array $categories)
    {
        $this->deletePostCategories($idPost);
        return $this->insertPostCategories($idPost, $categories);
    }

    private function deletePostCategories(int $idPost): bool
    {
        return $this->postModel->deletePostCategories($idPost);
    }



    public function insert(array $dataPost, array $categories): bool
    {
        $idPost = $this->postModel->insert($dataPost);
        return $this->insertPostCategories($idPost, $categories);
    }


    public function insertPostCategories(int $idPost, array $categories): bool
    {
        foreach ($categories as $category) {
            $data = ["post_id" => $idPost, "category_id" => $category];
            $this->postModel->insertPostCategories($data);
        }

        return true;
    }
    /**
     * 404 not found
     */
    public function notFound()
    {
        http_response_code(404);
        $this->view("404");
    }

    public function add(): void
    {
    }

    public function edit(int $id): void
    {
    }
}
