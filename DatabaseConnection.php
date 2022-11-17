<?php
   #SINGLETON PATTERN CONNECTION

class DatabaseConnection {

  private static $instance = NULL;

  private $conn;

  private $_host = "";

  private $_username = "";

  private $_password = "";

  private $_database = "";

  private function __construct() {
    $this->conn = new PDO("mysql:host={$this->_host};
    dbname={$this->_database}", $this->_username, $this->_password,
      [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new DatabaseConnection();
    }
    return self::$instance;
  }

  public function getConnection() {
    return $this->conn;
  }

  #-----------------------------------------------------------------------------
  #CRUD METHODS

  public function createTable() {
    $sql = "CREATE TABLE players (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(30) NOT NULL,
      age INT(2),
      email VARCHAR(40) NOT NULL
   )";

    $stmt = $this->getConnection()->query($sql);
    if ($stmt) {
      echo "Table created successfully.";
    }
    else {
      echo "Table has not been created!<BR>";
      echo "Reason: ", $this->getConnection()->errorCode();
    }
    $this->conn = NULL;
  }

  #-----------------------------------------------------------------------------

  public function deleteTable() {
    $sql = "DROP TABLE ";
    $stmt = $this->getConnection()->query($sql);
    if ($stmt) {
      echo "Table deleted successfully.";
    }
  }

  #-----------------------------------------------------------------------------

  public function insertInto() {
    $data = [
      'id' => '1',
      'name' => 'wst',
      'age' => '75',
      'email' => 'mx123@abv.bg'
    ];
    $stmt = $this->getConnection()->prepare("INSERT INTO players (" . implode(', ', array_keys($data)) . ") VALUES (:" . implode(', :', array_keys($data)) . ")");

    if ($stmt->execute($data)) {
      echo "Table record inserted";
    }
  }

  #-----------------------------------------------------------------------------

  function deleteFromTable($id,$table) {
    if ($this->getConnection()!=NULL){
      if ($id != NULL){
        $query = sprintf("DELETE FROM {$table} WHERE ID = {$id}");
        $result = $this->getConnection()->query($query);
        if ($result){
          echo "Table record deleted";
        }
      }
    }
  }
  #-----------------------------------------------------------------------------

  function updateTable() {
  $data=[
    'id' => '1',
    'name' => 'fallen',
  ];
  $stmt = $this->getConnection()->prepare("UPDATE players SET name =:name WHERE id=:id");
  if ($stmt->execute($data)) {
    echo "Table record inserted";
    }
  }
}

#-----------------------------------------------------------------------------

#INSTANCE

//$instance = DatabaseConnection::getInstance();
//$conn = $instance->getConnection();
//$conn = $instance->createTable();
//$conn = $instance->deleteTable();
//$conn = $instance->insertInto();
//$conn = $instance->deleteFromTable(3,'players');
//$conn =$instance->updateTable();


































