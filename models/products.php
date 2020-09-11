<?php 
  class Products {
    private $conn;
    private $table = 'products';

       // Post Properties
       public $id;
       public $pid;
       public $name;
       public $price;
       public $des;
       

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read_all_products(){
          // Create query
          $query = "SELECT * FROM products WHERE id=?";
        
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
  
          // Execute query
          $stmt->execute();
    
          return $stmt;
      }
      
  }