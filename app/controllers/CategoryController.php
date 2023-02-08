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


    public function index(): void
    {
        $data = $this->getPaginatedCategories("category");
        $this->view("categories/listCategories", $data);
    }


    public function getPaginatedCategories(string $route): array
    {
        $queryCount = $this->categoryModel->getQueryCount();
        $queryItems = $this->categoryModel->getQueryEverything();
        $paginateCategories = new Pagination($queryCount, $queryItems, 12, $route);
        $data["categories"] = $paginateCategories->getItems();
        $data['nextLink'] = $paginateCategories->nextLink();
        $data['previousLink'] = $paginateCategories->previousLink();
        return $data;
    }


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



    public function insert(string $name): bool
    {
        return $this->categoryModel->insert($name);
    }

    public function getCategoriesPost($idPost)
    {
        return $this->categoryModel->getCategoriesFromPost($idPost);
    }
}
