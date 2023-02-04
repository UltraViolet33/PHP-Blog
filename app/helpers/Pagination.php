<?php

/**
 * pagination class to get the paginated items (posts or category) from the bdd
 */

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

    /**
     * get the items to paginate from the bdd
     */
    public function getItems()
    {
        $offset = $this->getOffset();
        if ($this->item === "post" || $this->item === "admin/posts") {
            $query = $this->queryItems . " ORDER BY created_at DESC LIMIT $this->perPage OFFSET $offset";
        } else {
            $query = $this->queryItems . " LIMIT $this->perPage OFFSET $offset";
        }

        $items = $this->db->read($query);
        return $items;
    }

    /**
     * get the offset for the sql query
     */
    private function getOffset()
    {
        $this->offset =  $this->perPage * ($this->getCurrentPage() - 1);
        return $this->offset;
    }

    /**
     * get the current page from the url
     */
    private function getCurrentPage()
    {
        if (isset($_GET['page'])) {
            if (!filter_var($_GET['page'], FILTER_VALIDATE_INT)) {
                header("Location: " . ROOT . "{$this->item}");
                return;
            }

            if ($_GET['page'] <= 1 || $_GET['page'] > $this->numberPages) {
                header("Location: " . ROOT . "{$this->item}");
                return;
            }
            $this->currentPage = $_GET['page'];
        }
        return  $this->currentPage;
    }

    /**
     * get the number of page for pagination
     */
    private function getNumberPages()
    {
        $totalItems =  $this->db->read($this->queryCount, [], PDO::FETCH_BOTH);
        $totalItems = $totalItems[0][0];
        if ($totalItems == 0) {
            header("Location: " . ROOT . "{$this->item}");
            return;
        }
        $this->numberPages = (int)ceil($totalItems / $this->perPage);
    }

    /**
     * generate link to go to the next page
     */
    public function nextLink()
    {
        $this->currentPage = $this->getCurrentPage();
        if ($this->currentPage >= $this->numberPages) {
            return null;
        }
        $nextpage = $this->currentPage + 1;
        $link = ROOT . "{$this->item}?page=$nextpage";
        $linkHTML = "<a class='btn btn-primary ms-auto' href='$link'>Page suivante</a>";
        return $linkHTML;
    }

    /**
     * generate link to go to the previous page
     */
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
