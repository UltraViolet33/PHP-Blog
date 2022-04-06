<?php

require_once('../app/core/Controller.php');

class Category extends Controller
{

    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->loadModel("CategoryModel");
    }

    public function index()
    {
        // $this->categoryModel->insertCategories();
        $allCategories = $this->categoryModel->selectAllCategories();
        var_dump($allCategories);
        $this->view("categories/listCategories");
    }
}
