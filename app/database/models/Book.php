<?php

namespace app\database\models;

use PDO;

class Book
{
  public function getBooks(PDO $connection)
  {
    try {
      $prepare = $connection->prepare("select id, title, description from books limit 50");
      $prepare->fetchAll();
    } catch (\throwable $th) {
      var_dump($th->getMessage());
    }
  }

  public function seachBooks(PDO $connection, $search)
  {
    try {
      $prepare = $connection->prepare("select id, title, description from books where title like :search or description like :search");
      $prepare->execute(['search' => '%' .$search.'%'])
      $prepare->fetchAll();
    } catch (\throwable $th) {
      var_dump($th->getMessage());
    }
  }
}
