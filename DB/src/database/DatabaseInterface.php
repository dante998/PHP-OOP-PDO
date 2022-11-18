<?php

namespace database;

interface DatabaseInterface {

  public function createTable();

  public function deleteTable();

  public function insertIntoTable();

  public function deleteFromTable($id,$table);

  public function updateTable();

}

?>

