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
        $this->categoryModel = new Category();
    }


    public function index(): void
    {
        $data = $this->getPaginatedPosts("post");
        $this->view("posts/index", $data);
    }


    public function details(int $id): void
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            (new NotFoundController())->index();
            return;
        }

        $post["created_at"] = $this->dateToString($post["created_at"]);
        $data['post'] = $post;
        $this->view("posts/detailsPost", $data);
    }


    public function category(int $id): void
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            (new NotFoundController())->index();
            return;
        }

        $queryCount = $this->postModel->getQueryCountPostsFromCategory($id);
        $queryItems = $this->postModel->getPostFromCategory($id);
        $paginatePosts = new Pagination($queryCount, $queryItems, 12, "post/category/$id");
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


    private function dateToString(string $date): string
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


    public function delete(int $id): bool
    {
        return $this->postModel->delete($id);
    }


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
}
