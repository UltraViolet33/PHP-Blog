<?php

namespace App\controllers;

use App\core\Controller;
// use App\models\Admin;
use Valitron\Validator;
use App\helpers\Session;

class AdminController extends Controller
{

    private $postController;
    private CategoryController $categoryController;

    public function __construct()
    {
        // $this->checkAdminLogin();
        $this->postController  = new PostController();
        $this->categoryController = new CategoryController();
    }

    public function index()
    {
        $this->posts();
    }

    /**
     * display posts
     */
    public function posts($method = null, $id = null)
    {
        switch ($method) {
            case "create":
                $this->createPost();
                die;
                break;

            case "update":
                $this->updatePost($id);
                die;
                break;
            case "delete":
                $this->deletePost($id);
                die;
                break;
        }

        $posts = $this->postController->getPaginatedPosts("admin/posts");
        $this->view("admin/posts", $posts);
    }



    private function createPost(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = ["name", "content", "categories"];
            if ($this->checkDataForm($data)) {
                $dataPost = ["name" => $_POST["name"], "content" => $_POST["content"]];
                $this->postController->insert($dataPost, $_POST["categories"]);
                header("Location: /admin/posts");
                return;
            }

            Session::set("error", $this->v->errors());
        }

        $allCategories = $this->categoryController->getAllCategories();
        $data['allCategories'] = $allCategories;
        $this->view("admin/addPost", $data);
    }



    public function deletePost(int $id): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkTokenAdmin()) {
                $this->postController->delete($id);
                header("Location: /admin/posts");
                return;
            }

            // header("Location: /user/login");
        }
    }



    public function updatePost(int $idPost): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = ["name", "content", "categories"];
            if ($this->checkDataForm($data)) {
                $dataPost = ["name" => $_POST["name"], "content" => $_POST["content"]];
                $this->postController->update($idPost, $dataPost, $_POST["categories"]);
                header("Location: /admin/posts");
                return;
            }

            Session::set("error", $this->v->errors());
        }

        $categories = $this->categoryController->getCategoriesPost($idPost);
        $post = $this->postController->postModel->find($idPost);
        $allCategories = $this->categoryController->getAllCategories();
        foreach ($allCategories as $category) {
            foreach ($categories as $categoryPost) {
                if ($category->id == $categoryPost->id) {
                    $category->post = 1;
                    break;
                } else {
                    $category->post = 0;
                }
            }
        }
        $data['allCategories'] = $allCategories;
        $data['post'] = $post;
        $this->view("admin/editPost", $data);
    }

    /**
     * display categories
     */
    public function categories($method = null, $id = null)
    {
        switch ($method) {
            case "create":
                $this->createCategory();
                die;
                break;
            case "update":
                $this->updateCategory($id);
                die;
                break;
            case "delete":
                $this->deleteCategory($id);
                die;
                break;
        }

        $categories = $this->categoryController->getPaginatedCategories("admin/categories");
        $this->view('admin/categories', $categories);
    }



    private function createCategory(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkDataForm(["name"])) {
                $this->categoryController->insert($_POST["name"]);
                header("Location: /admin/categories");
                return;
            }

            Session::set("error", $this->v->errors());
        }

        $this->view("admin/addCategory");
    }



    private function updateCategory(int $id): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkDataForm(["name"])) {
                $data = ["id" => $id, "name" => $_POST["name"]];
                $this->categoryController->update($data);
                header("Location: /admin/categories");
                return;
            }

            Session::set("error", $this->v->errors());
        }

        $category = $this->categoryController->getSingleCategory($id);
        $data["category"] = $category;
        $this->view("admin/editCategory", $data);
    }


    public function deleteCategory(int $id): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkTokenAdmin()) {
                $this->categoryController->delete($id);
                header("Location: /admin/categories");
                return;
            }

            // header("Location: /user/login");
        }
    }


    private function checkTokenAdmin(): bool
    {
        if (!isset($_POST["token"])) {
            return false;
        }

        if ($_POST["token"] !== Session::get("token")) {
            return false;
        }

        return true;
    }
}
