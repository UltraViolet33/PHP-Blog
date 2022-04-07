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
        $paginatePosts = new Paginate($this->postModel, 12, 'post');
        $limitPosts = $paginatePosts->getItems();

        foreach ($limitPosts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }
        $data['nextLink'] = $paginatePosts->nextLink();
        $data['previousLink'] = $paginatePosts->previousLink();
        $data['limitPosts'] = $limitPosts;
        $this->view("posts/index", $data);
    }

    /**
     * display details page for post
     * @param int $id
     */
    public function details($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            header("Location: " . ROOT . "post");
        }
        $post[0]->created_at = $this->dateToString($post[0]->created_at);
        $data['post'] = $post[0];
        $this->view("posts/detailsPost", $data);
    }

    public function category($id)
    {

        // modifier et utiliser la Classe Paginate pour récupérer et afficher les posts en fonction des categories
        $categoryModel = $this->loadModel("CategoryModel");
        $category = $categoryModel->find($id);
        if (!$category) {
            header("Location: " . ROOT . "category/index");
            die;
        }

        $posts = $this->postModel->getPostFromCategory($id);
        if (!$posts) {
            header("Location: " . ROOT . "category/index");
            die;
        }
        foreach ($posts as $post) {
            $post->created_at = $this->dateToString($post->created_at);
            $post->content = $this->getExtractContent($post->content);
        }
        $data['limitPosts'] = $posts;
        $data['nextLink'] = null;
        $data['previousLink'] = null;
        $this->view("posts/index", $data);
    }

    /**
     * convert date MySQL to dd/mm/yyyy
     * @param string $date
     * @return string
     */
    private function dateToString($date)
    {
        $dateFormat = new DateTime($date);
        return $dateFormat->format("m/d/Y");
    }


    /**
     * get an extract of a post content
     * @param string $content
     * @return string
     */
    private function getExtractContent($content)
    {
        if (strlen($content) <= 50) {
            return $content;
        }
        return substr($content, 0, 50) . "...";
    }
}
