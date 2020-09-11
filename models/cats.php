<?php 
  class Cats {
    private $conn;
    private $table = 'cats';

       // Post Properties
       public $id;
       public $name;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function reac_cats() {
        // Create query
        $query = "SELECT * FROM cats WHERE id=?";

        $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
        // Execute query
        $stmt->execute();
  
        return $stmt;
      }
  }