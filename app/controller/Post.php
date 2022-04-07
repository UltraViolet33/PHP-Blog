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
        //  $this->postModel->insertPosts();
        $paginatePosts = new Paginate($this->postModel, 12, 'post');
        $limitPosts = $paginatePosts->getItems();

        foreach ($limitPosts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
        }
        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        $data['limitPosts'] = $limitPosts;
        $this->view("posts/index", $data);
    }

    private function dateToString($date)
    {
        $dateFormat = new DateTime($date);
        return $dateFormat->format("m/d/Y");
    }
}
