<?php

require_once('../app/core/Controller.php');

class Admin extends Controller
{


    public function __construct()
    {
        $this->checkAdminLogin();
    }

    public function index()
    {
        $this->view("admin/index");
    }


    public function posts()
    {
        $postController = $this->loadController('post');
        $posts = $postController->getPaginatedPosts("admin/posts");
        $this->view("admin/posts", $posts);
    }


}
