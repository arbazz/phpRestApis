<?php 
  class Udocuments {
    private $conn;
    private $table = 'udocoments';

       // Post Properties
       public $id;
       public $udoc;
       public $no;
       public $utitle;
       

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read_docs_user(){
          // Create query
          $query = "SELECT * FROM udocoments WHERE id=?";
        
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
  
          // Execute query
          $stmt->execute();
    
          return $stmt;
      }
      
  }