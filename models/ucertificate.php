<?php 
  class Ucertificates {
    private $conn;
    private $table = 'ucertificates';

       // Post Properties
       public $id;
       public $ucert;
       public $no;
       public $status;
       public $expiry;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read_ucertificates() {
        // Create query
        $query = "select * from ucertificate where id=?";
        
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