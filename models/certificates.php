<?php 
  class Certificates {
    private $conn;
    private $table = 'ccertificates';

       // Post Properties
       public $id;
       public $ccert;
       public $no;
       public $status;
       public $expiry;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read() {
        // Create query
        $query = "select * from ccertificates where id=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();
  
        return $stmt;

        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //  // Set properties
        //  $this->id = $row['id'];
        //  $this->ccert = $row['ccert'];
        //  $this->no = $row['no'];
        //  $this->status = $row['status'];
        //  $this->expiry = $row['expiry'];
      }
  }