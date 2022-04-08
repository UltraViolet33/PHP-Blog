<?php

require_once('../app/core/Controller.php');

class Admin extends Controller
{

    private $postController;

    public function __construct()
    {
        $this->checkAdminLogin();
        $this->postController  = $this->loadController("post");
        $this->categoryController = $this->loadController("category");
    }

    public function index()
    {
        $this->view("admin/index");
    }

    public function posts($method = null, $id = null)
    {
        if ($method == "delete") {
            if ($_POST['token'] == $_SESSION['token']) {
                $this->deletePost($id);
                header("Location: " . ROOT . "admin/posts");
            } else {
                header("Location: " . ROOT . "login") .
                    die;
            }
        }
        $posts = $this->postController->getPaginatedPosts("admin/posts");
        $this->view("admin/posts", $posts);
    }

    /**
     * delete one post
     */
    public function deletePost($id)
    {
        $this->postController->delete($id);
    }



    public function categories($method = null, $id = null)
    {
        if ($method == "delete") {
            if ($_POST['token'] == $_SESSION['token']) {
                $this->deleteCategory($id);
                header("Location: " . ROOT . "admin/categories");
            } else {
                header("Location: " . ROOT . "login") .
                    die;
            }
        }
        $categories = $this->categoryController->getPaginatedCategories("admin/categories");
        $this->view('admin/categories', $categories);
    }


    public function deleteCategory($id)
    {
        $this->categoryController->delete($id);
    }
}
