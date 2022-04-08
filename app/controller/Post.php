<?php

require_once('../app/core/Controller.php');
require_once('../app/helpers/Paginate.php');
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

        /**classe Pagination essai pour remplacer la classe paginate */
        $queryCount = $this->postModel->count();
        $queryItems = $this->postModel->limitItems();
        $paginatePosts = new Pagination($queryCount,$queryItems, 12, "post");
        $limitPosts = $paginatePosts->getItems();
        /**fin essai classe Pagination */

        $categoryModel = $this->loadModel("CategoryModel");

        foreach ($limitPosts as $post) {
            $post->categories = [];
            $post->categories = $categoryModel->getCategoriesFromPost($post->id)[0]->name;
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
     * @param int $id
     */
    public function details($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            header("Location: " . ROOT . "post");
        }
        $post[0]->created_at = $this->dateToString($post[0]->created_at);
        $categoryModel = $this->loadModel("CategoryModel");
        $post[0]->categories = $categoryModel->getCategoriesFromPost($post[0]->id)[0]->name;
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

        $queryCount = $this->postModel->countPostFronCat($id);
        $queryItems = $this->postModel->getPostFromCategory($id);


        $paginatePosts = new Pagination($queryCount,$queryItems, 12, "post/category");
        $limitPosts = $paginatePosts->getItems();
        /**fin essai classe Pagination */

        // $categoryModel = $this->loadModel("CategoryModel");

         foreach ($limitPosts as $post) {
            $post->categories = [];
             $post->categories = $categoryModel->getCategoriesFromPost($post->id)[0]->name;
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
