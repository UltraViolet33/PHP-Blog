<?php

require_once('../app/core/Controller.php');
require_once('../app/helpers/Pagination.php');

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

        $queryCount = $this->categoryModel->count();
        $queryItems = $this->categoryModel->limitItems();
        $paginateCategories = new Pagination($queryCount, $queryItems, 12, "category");
        $limitCategories = $paginateCategories->getItems();
        $data['nextLink'] = $paginateCategories->nextLink();
        $data['previousLink'] = $paginateCategories->previousLink();
        $data['limitCategories'] = $limitCategories;
        $this->view("categories/listCategories", $data);
    }



    public function getPaginatedCategories()
    {
        $queryCount = $this->categoryModel->count();
        $queryItems = $this->categoryModel->limitItems();
        $paginateCategories = new Pagination($queryCount, $queryItems, 12, "category");
        $limitCategories = $paginateCategories->getItems();
        $data['nextLink'] = $paginateCategories->nextLink();
        $data['previousLink'] = $paginateCategories->previousLink();
        $data['limitCategories'] = $limitCategories;
        return $data;
    }


    public function delete($id)
    {
        $this->categoryModel->delete($id);
    }


    public function getAllCategories()
    {
        return $this->categoryModel->getAllCategories();
    }

    public function getOneCategory($id)
    {
        return $this->categoryModel->find($id);
    }
}
