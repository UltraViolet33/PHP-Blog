<?php

namespace App\core;

use App\core\Config;
use App\models\interfaces\DatabaseInterface;
use PDO;

class Database implements DatabaseInterface
{

  private ?PDO $PDOInstance = null;
  private static ?self $instance = null;

  public function __construct()
  {
    $string = Config::$dbType . ":host=" . Config::$dbHost . ";dbname=" . Config::$dbName;
    $this->PDOInstance  = new PDO($string, Config::$dbUser, Config::$dbPassword);
  }


  public static function connect(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }


  /**
   * return Database instance 
   * @return self $instance
   */
  public static function getInstance(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }


  /**
   * read
   * read on the BDD
   * @param string $query
   * @param array $data
   * @return array|bool
   */
  public function read(string $query, array $data = array()): array|bool
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetchAll(PDO::FETCH_OBJ);
      if (is_array($data) && count($data) > 0) {
        return $data;
      }
    }
    return [];
  }

  public function readSingleRow(string $query, array $data): array
  {
    $statement = $this->PDOInstance->prepare($query);
    $statement->execute($data);
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    return $data ? $data : [];
  }


  /**
   * readOneRow
   * read one row on the DB
   * @param  string $query
   * @param  array $data
   * @return object|bool
   */
  public function readOneRow(string $query, array $data = array()): object|bool
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetch(PDO::FETCH_OBJ);
      if (is_object($data)) {
        return $data;
      }
    }
    return false;
  }


  /**
   * write
   * write on the BDD
   * @param string $query
   * @param array $data
   * @return bool
   */
  public function write(string $query, array $data = array()): bool
  {
    $statement = $this->PDOInstance->prepare($query);
    return $statement->execute($data);
  }


  /**
   * getLastInsertId
   * return the last id inserted
   * @return int
   */
  public function getLastInsertId(): int
  {
    return $this->PDOInstance->lastInsertId();
  }
}

// class Database
// {

//   private $PDOInstance = null;
//   private static $instance = null;

//   private function __construct()
//   {
//     $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
//     $this->PDOInstance  = new PDO($string, DB_USER, DB_PASS, [
//       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//     ]);
//   }


//   /**
//    * get the pdo instance
//    */
//   public static function getInstance()
//   {
//     if (is_null(self::$instance)) {
//       self::$instance = new Database();
//     }
//     return self::$instance;
//   }

//   public static function getNewInstance()
//   {
//     return new Database();
//   }

//   /**
//    * read on the BDD
//    */
//   public function read($query, $data = array(), $method = PDO::FETCH_OBJ)
//   {
//     $statement = $this->PDOInstance->prepare($query);
//     $result = $statement->execute($data);

//     if ($result) {
//       $data = $statement->fetchAll($method);
//       if (is_array($data) && count($data) > 0) {
//         return $data;
//       }
//     }
//     return false;
//   }

//   /**
//    * write on the BDD
//    */
//   public function write($query, $data = array())
//   {
//     $statement = $this->PDOInstance->prepare($query);
//     $result = $statement->execute($data);
//     if ($result) {
//       return true;
//     }
//     return false;
//   }

//   /**
//    * return the last id inserted
//    */
//   public function getLastInsertId()
//   {
//     return $this->PDOInstance->lastInsertId();
//   }
// }
