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

    public function index()
    {
        $paginateCategories = new Paginate($this->categoryModel, 10);
        $limitCategories = $paginateCategories->getItems();

        $data['nextLink'] = $paginateCategories->nextLink();
        $data['previousLink'] = $paginateCategories->previousLink();
        $data['limitCategories'] = $limitCategories;
        $this->view("categories/listCategories", $data);
    }
}
