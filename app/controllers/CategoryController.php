<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Category;
use App\helpers\Pagination;

class CategoryController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    /**
     * index 
     * display categories page
     */
    public function index()
    {
        $queryCount = $this->categoryModel->getQueryCount();
        $queryItems = $this->categoryModel->getQueryEverything();
        $paginateCategories = new Pagination($queryCount, $queryItems, 12, "category");
        $data["categories"] = $paginateCategories->getItems();
        $data['nextLink'] = $paginateCategories->nextLink();
        $data['previousLink'] = $paginateCategories->previousLink();

        $this->view("categories/listCategories", $data);
    }

    /**
     * get the paginated categories
     */
    // public function getPaginatedCategories()
    // {
    //     $queryCount = $this->categoryModel->count();
    //     $queryItems = $this->categoryModel->limitItems();
    //     $paginateCategories = new Pagination($queryCount, $queryItems, 12, "category");
    //     $limitCategories = $paginateCategories->getItems();
    //     $data['nextLink'] = $paginateCategories->nextLink();
    //     $data['previousLink'] = $paginateCategories->previousLink();
    //     $data['limitCategories'] = $limitCategories;
    //     return $data;
    // }

    /**
     * delete one category
     */
    public function delete($id)
    {
        $this->categoryModel->delete($id);
    }

    /**
     * get all the categories
     */
    public function getAllCategories()
    {
        return $this->categoryModel->getAllCategories();
    }

    /**
     * get one category
     */
    public function getOneCategory($id)
    {
        return $this->categoryModel->find($id);
    }

    /**
     * update category
     */
    public function update($id, $name)
    {
        return $this->categoryModel->updateCategory($id, $name);
    }

    /**
     * insert a category
     */
    public function insert($name)
    {
        return $this->categoryModel->insertCategory($name);
    }

    public function getCategoriesPost($idPost)
    {
        return $this->categoryModel->getCategoriesFromPost($idPost);
    }
}
