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
        // $this->postController  = $this->loadController("post");
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
        if ($method == "delete") {
            if ($_POST['token'] == $_SESSION['token']) {
                $this->deletePost($id);
                header("Location: " . ROOT . "admin/posts");
                return;
            } else {
                header("Location: " . ROOT . "login");
                return;
            }
        } elseif ($method == "update") {
            $this->updatePost($id);
            return;
        } elseif ($method == "create") {
            $this->createPost();
            return;
        }

        $posts = $this->postController->getPaginatedPosts("admin/posts");
        $this->view("admin/posts", $posts);
    }

    /**
     * create a post
     */
    private function createPost()
    {
        if (!empty($_POST)) {

            if (empty($_POST['name']) || empty($_POST['content']) || !isset($_POST['categories'])) {
                $_SESSION['error'] = "Veuillez renseigner les informations <br>";
            } else {
                $this->postController->insert($_POST['name'], $_POST['content'], $_POST['categories']);
                header("Location: " . ROOT . "admin/posts");
                return;
            }
        }

        $allCategories = $this->categoryController->getAllCategories();
        $data['allCategories'] = $allCategories;

        $this->view("admin/addPost", $data);
    }
    /**
     * delete one post
     */
    public function deletePost($id)
    {
        $this->postController->delete($id);
    }

    /**
     * Update one post
     */
    public function updatePost($idPost)
    {
        if (!empty($_POST)) {
            if (empty($_POST['name']) || empty($_POST['content'])) {
                $_SESSION['error'] = "Veuillez renseigner les informations <br>";
            } else {
                $this->postController->update($idPost, $_POST['name'], $_POST['content']);
                header("Location: " . ROOT . "admin/posts");
                return;
            }
        }
        $categories = $this->categoryController->getCategoriesPost($idPost);

        $data['categories'] = $categories;
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
        $data['post'] = $post[0];
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
        //     if ($method == "delete") {
        //         if ($_POST['token'] == $_SESSION['token']) {
        //             $this->deleteCategory($id);
        //             header("Location: " . ROOT . "admin/categories");
        //             return;
        //         } else {
        //             header("Location: " . ROOT . "login");
        //             return;
        //         }
        //     } elseif ($method == "update") {
        //         $this->updateCategory($id);
        //         return;
        //     } elseif ($method == "create") {
        //         $this->createCategory();
        //         return;
        //     }
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
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            if($this->checkTokenAdmin())
            {
                $this->categoryController->delete($id);
                header("Location: /admin/categories");
                return;
            }

            // header("Location: /user/login");
        }
    }

    
    private function checkTokenAdmin(): bool 
    {
        if(!isset($_POST["token"]))
        {
            return false;
        }

        if($_POST["token"] !== Session::get("token"))
        {
            return false;
        }

        return true;
    }
}
