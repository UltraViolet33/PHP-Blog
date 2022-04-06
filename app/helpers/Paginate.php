<?php

class Paginate
{

    private $categoryModel;
    public $totalItems;
    public $perPage;
    public $numberPage;
    public $currentPage = 1;
    public $offset;

    public function __construct($categoryModel, $perPage)
    {
        $this->categoryModel = $categoryModel;
        $this->totalItems = (int) $this->categoryModel->countCategories();
        $this->perPage = $perPage;
        // $this->numberPage = (int)ceil($this->totalItems / $this->perPage);
    }

    public function getItems()
    {
        $items = $this->categoryModel->getLimitCategories($this->perPage, $this->getOffset());
        return $items;
    }

    public function getOffset()
    {
        $this->offset =  $this->perPage * ($this->getCurrentPage() - 1);
        return $this->offset;
    }

    public function getCurrentPage()
    {
        // $this->currentPage = 1;
        if (isset($_GET['page'])) {
            $this->currentPage = (int)$_GET['page'];
        }
        return  $this->currentPage;
    }


    public function nextLink()
    {
        $this->currentPage = $this->getCurrentPage();
        $nextpage = $this->currentPage + 1;
        $link = ROOT . "category?page=$nextpage";
        $linkHTML = "<a href='$link'>Page suivante</a>";
        return $linkHTML;
    }

    public function previousLink()
    {
        $this->currentPage = $this->getCurrentPage();
        $nextpage = $this->currentPage - 1;
        $link = ROOT . "category?page=$nextpage";
        $linkHTML = "<a href='$link'>Page précédente</a>";
        return $linkHTML;
    }
}
