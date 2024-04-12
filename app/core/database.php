<?php

namespace App\core;

use App\models\interfaces\DatabaseInterface;
use PDO;

class Database implements DatabaseInterface
{

  private ?PDO $PDOInstance = null;
  private static ?self $instance = null;


  public function __construct()
  {
    $string = $_ENV["DB_TYPE"] . ":host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"];
    $this->PDOInstance  = new PDO($string, $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
  }


  public static function connect(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }


  public function read(string $query, array $data = array()): array
  {
    $statement = $this->PDOInstance->prepare($query);
    $statement->execute($data);
    $data = $statement->fetchAll(PDO::FETCH_OBJ);

    return $data ? $data : [];
  }


  public function readSingleRow(string $query, array $data = [], int $method = PDO::FETCH_ASSOC): array
  {
    $statement = $this->PDOInstance->prepare($query);
    $statement->execute($data);
    $data = $statement->fetch($method);
    return $data ? $data : [];
  }


  public function write(string $query, array $data = array()): bool
  {
    $statement = $this->PDOInstance->prepare($query);
    return $statement->execute($data);
  }


  public function getLastInsertId(): int
  {
    return $this->PDOInstance->lastInsertId();
  }
}
