<?php

class Database
{

  private $PDOInstance = null;
  private static $instance = null;

  private function __construct()
  {
    $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
    $this->PDOInstance  = new PDO($string, DB_USER, DB_PASS, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
  }


  /**
   * get the pdo instance
   */
  public static function getInstance()
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public static function getNewInstance()
  {
    return new Database();
  }

  /**
   * read on the BDD
   */
  public function read($query, $data = array(), $method = PDO::FETCH_OBJ)
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetchAll($method);
      if (is_array($data) && count($data) > 0) {
        return $data;
      }
    }
    return false;
  }

  /**
   * write on the BDD
   */
  public function write($query, $data = array())
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);
    if ($result) {
      return true;
    }
    return false;
  }

  /**
   * return the last id inserted
   */
  public function getLastInsertId()
  {
    return $this->PDOInstance->lastInsertId();
  }
}
