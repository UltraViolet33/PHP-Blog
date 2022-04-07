<?php

require_once('../app/core/Controller.php');
require_once('../app/helpers/Paginate.php');

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
        $paginatePosts = new Paginate($this->postModel, 10, 'post');
        $limitPosts = $paginatePosts->getItems();

        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        $data['limitPosts'] = $limitPosts;
        $this->view("posts/index", $data);
    }
}
