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
        $this->numberPage = (int)ceil($this->totalItems / $this->perPage);
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
            if (!filter_var($_GET['page'], FILTER_VALIDATE_INT)) {
                header("Location: " . ROOT . "category");
                die;
            }

            if ($_GET['page'] <= 1 || $_GET['page'] > $this->numberPage) {
                header("Location: " . ROOT . "category");
                die;
            }
            $this->currentPage = $_GET['page'];
        }
        return  $this->currentPage;
    }


    public function nextLink()
    {
        $this->currentPage = $this->getCurrentPage();
        if ($this->currentPage >= $this->numberPage) {
            return "";
        }
        $nextpage = $this->currentPage + 1;
        $link = ROOT . "category?page=$nextpage";
        $linkHTML = "<a class='btn btn-primary ms-auto' href='$link'>Page suivante</a>";
        return $linkHTML;
    }

    public function previousLink()
    {
        if ($this->currentPage <= 1) {
            return "";
        }
        $this->currentPage = $this->getCurrentPage();
        $nextpage = $this->currentPage - 1;
        $link = ROOT . "category?page=$nextpage";
        $linkHTML = "<a class='btn btn-primary' href='$link'>Page précédente</a>";
        return $linkHTML;
    }
}
