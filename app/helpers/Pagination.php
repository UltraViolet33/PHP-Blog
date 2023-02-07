<?php

namespace App\helpers;

use App\core\Database;
use PDO;

class Pagination
{

    private string $queryCount;
    private int $perPage;
    private Database $db;
    private string $item;
    private string $queryItems;
    private int $numberPages;
    private int $currentPage = 1;

    public function __construct(string $queryCount, string $queryItems, int $perPage, string $item)
    {
        $this->db = Database::connect();

        $this->queryCount = $queryCount;
        $this->perPage = $perPage;
        $this->item = $item;
        $this->queryItems = $queryItems;
        $this->numberPages = $this->getNumberPages();
        $this->getCurrentPage();;
    }



    public function getItems(): array
    {
        $offset = $this->getOffset();
        if ($this->item === "post" || $this->item === "admin/posts") {
            $query = $this->queryItems . " ORDER BY created_at DESC LIMIT $this->perPage OFFSET $offset";
        } else {
            $query = $this->queryItems . " LIMIT $this->perPage OFFSET $offset";
        }

        return $this->db->read($query);
    }


    private function getOffset(): int
    {
        return $this->perPage * ($this->getCurrentPage() - 1);
    }


    private function getCurrentPage(): int
    {
        if (isset($_GET['page'])) {
            if (!filter_var($_GET['page'], FILTER_VALIDATE_INT)) {
                header("Location: /{$this->item}");
                die;
            }

            if ($_GET['page'] <= 1 || $_GET['page'] > $this->numberPages) {
                header("Location: /{$this->item}");
                die;
            }

            $this->currentPage = $_GET['page'];
        }

        return $this->currentPage;
    }


    private function getNumberPages(): int
    {
        $totalItems =  $this->db->readSingleRow($this->queryCount, [], PDO::FETCH_NUM);
        $totalItems = $totalItems[0];
        if ($totalItems == 0) {
            header("Location: /{$this->item}");
            die;
        }

        return  (int)ceil($totalItems / $this->perPage);
    }



    public function nextLink(): string|null
    {
        $this->currentPage = $this->getCurrentPage();

        if ($this->currentPage >= $this->numberPages) {
            return null;
        }

        $nextpage = $this->currentPage + 1;
        $link = ROOT . "{$this->item}?page=$nextpage";
        return "<a class='btn btn-primary ms-auto' href='$link'>Page suivante</a>";
    }



    public function previousLink(): string|null
    {
        if ($this->currentPage <= 1) {
            return null;
        }

        $this->currentPage = $this->getCurrentPage();
        $nextpage = $this->currentPage - 1;
        $link = ROOT . "{$this->item}?page=$nextpage";
        return  "<a class='btn btn-primary' href='$link'>Page précédente</a>";
    }
}
