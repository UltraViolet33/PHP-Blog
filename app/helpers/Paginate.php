<?php

class Paginate
{
    private $model;
    public $totalItems;
    public $perPage;
    public $numberPage;
    public $currentPage = 1;
    public $offset;
    public $item;

    public function __construct($model, $perPage, $item)
    {
        $this->model = $model;
        $this->totalItems = (int) $this->model->countAll();
        $this->perPage = $perPage;
        $this->numberPage = (int)ceil($this->totalItems / $this->perPage);
        $this->item = $item;
    }

    public function getItems()
    {
        $items = $this->model->getLimitItems($this->perPage, $this->getOffset());
        return $items;
    }

    public function getOffset()
    {
        $this->offset =  $this->perPage * ($this->getCurrentPage() - 1);
        return $this->offset;
    }

    public function getCurrentPage()
    {
        if (isset($_GET['page'])) {
            if (!filter_var($_GET['page'], FILTER_VALIDATE_INT)) {
                echo "Location: " . ROOT . "{$this->item}";
                header("Location: " . ROOT . "{$this->item}");
                die;
            }

            if ($_GET['page'] <= 1 || $_GET['page'] > $this->numberPage) {
                echo "Location: " . ROOT . "{$this->item}";
                header("Location: " . ROOT . "{$this->item}");
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
            return null;
        }
        $nextpage = $this->currentPage + 1;
        $link = ROOT . "{$this->item}?page=$nextpage";
        $linkHTML = "<a class='btn btn-primary ms-auto' href='$link'>Page suivante</a>";
        return $linkHTML;
    }

    public function previousLink()
    {
        if ($this->currentPage <= 1) {
            return null;
        }
        $this->currentPage = $this->getCurrentPage();
        $nextpage = $this->currentPage - 1;
        $link = ROOT . "{$this->item}?page=$nextpage";
        $linkHTML = "<a class='btn btn-primary' href='$link'>Page précédente</a>";
        return $linkHTML;
    }
}
