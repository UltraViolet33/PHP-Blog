<?php

require_once('../app/core/Controller.php');
require_once('../app/helpers/Paginate.php');

class Category extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->loadModel("CategoryModel");
    }

    /**
     * index 
     * display categories page
     */
    public function index()
    {
        $paginateCategories = new Paginate($this->categoryModel, 10, 'category');
        $limitCategories = $paginateCategories->getItems();

        $data['nextLink'] = $paginateCategories->nextLink("category");
        $data['previousLink'] = $paginateCategories->previousLink("category");
        $data['limitCategories'] = $limitCategories;
        $this->view("categories/listCategories", $data);
    }
}
