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


    public function delete(int $id): bool
    {
        return $this->categoryModel->delete($id);
    }


    public function getAllCategories(): array
    {
        return $this->categoryModel->selectAll();
    }


    public function getSingleCategory(int $id)
    {
        return $this->categoryModel->find($id);
    }


    public function update(array $data): bool
    {
        return $this->categoryModel->update($data);
    }


    public function insert(string $name): bool
    {
        return $this->categoryModel->insert($name);
    }

    
    public function getCategoriesPost(int $idPost): array
    {
        return $this->categoryModel->getCategoriesFromPost($idPost);
    }
}
