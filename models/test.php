<?php 
  class Test {
    private $conn;
    private $table = 'stiq';

       // Post Properties
       public $id;
       public $code;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read() {
        // Create query
        $query = 'select * from stiq where code=?';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->code);

        // Execute query
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         // Set properties
         $this->id = $row['id'];
         $this->code = $row['code'];
      }
  }