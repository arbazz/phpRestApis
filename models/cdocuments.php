<?php 
  class Cdocuments {
    private $conn;
    private $table = 'cdocoments';

       // Post Properties
       public $id;
       public $cdoc;
       public $no;
       public $ctitle;
       

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read_docs(){
          // Create query
          $query = "SELECT * FROM cdocoments WHERE id=?";
        
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
  
          // Execute query
          $stmt->execute();
    
          return $stmt;
      }
      
  }