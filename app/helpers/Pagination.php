<?php

class Pagination
{

    private $queryCount;
    private $perPage;
    private $db;
    private $numberPages;
    private $item;
    private $currentPage = 1;
    private $queryItems;

    public function __construct($queryCount, $queryItems, $perPage, $item)
    {
        $this->queryCount = $queryCount;
        $this->perPage = $perPage;
        $this->item = $item;
        $this->queryItems = $queryItems;
        $this->db = Database::getNewInstance();
        $this->getNumberPages();
        $this->getCurrentPage();
    }


    public function getItems()
    {
        $offset = $this->getOffset();
        $query = $this->queryItems . " LIMIT $this->perPage OFFSET $offset";
        $items = $this->db->read($query);
       return $items;
    }


    private function getOffset()
    {
        $this->offset =  $this->perPage * ($this->getCurrentPage() - 1);
        return $this->offset;
    }


    private function getCurrentPage()
    {
        echo $this->numberPages;
        if (isset($_GET['page'])) {
            if (!filter_var($_GET['page'], FILTER_VALIDATE_INT)) {
                echo "Location: " . ROOT . "{$this->item}";
                header("Location: " . ROOT . "{$this->item}");
                die;
            }

            if ($_GET['page'] <= 1 || $_GET['page'] > $this->numberPages) {
                echo "Location: " . ROOT . "{$this->item}";
                header("Location: " . ROOT . "{$this->item}");
                die;
            }
            $this->currentPage = $_GET['page'];
        }
        return  $this->currentPage;
    }

    private function getNumberPages()
    {
        echo "igf";
        $totalItems =  $this->db->read($this->queryCount, [], null);
        $totalItems = $totalItems[0][0];
        if($totalItems == 0)
        {
            header("Location: " . ROOT . "{$this->item}");
            die;
        }
        $this->numberPages = (int)ceil($totalItems / $this->perPage);
        var_dump($this->numberPages);
    }

    public function nextLink()
    {
        $this->currentPage = $this->getCurrentPage();
        echo $this->numberPages;
        if ($this->currentPage >= $this->numberPages) {
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
