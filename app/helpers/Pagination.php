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
        // var_dump($items);
    }


    private function getOffset()
    {
        $this->offset =  $this->perPage * ($this->getCurrentPage() - 1);
        return $this->offset;
    }


    private function getCurrentPage()
    {
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
        $totalItems =  $this->db->read($this->queryCount, [], null);
        $totalItems = $totalItems[0][0];
        $this->numberPages = (int)ceil($totalItems / $this->perPage);
    }
}
