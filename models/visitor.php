<?php 
  class Visitor {
    private $conn;
    private $table = 'visitor';

       // Post Properties
       public $id;
       public $email;
       public $review;
       public $cid;
       public $rating;
       public $orderno;
       public $date;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read_ratings() {
        // Create query
        $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM visitor WHERE cid=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();
  
        return $stmt;
      }

      public function read_actual_ratings(){
          // Create query
          $query = "SELECT * FROM visitor WHERE cid=?";
        
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->cid);
  
          // Execute query
          $stmt->execute();
    
          return $stmt;
      }

      public function add_ratings(){
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, review = :review, orderno = :orderno, rating = :rating, cid = :cid';

        $stmt = $this->conn->prepare($query);

       $this->email = htmlspecialchars(strip_tags($this->email));
       $this->review = htmlspecialchars(strip_tags($this->review));
       $this->orderno = htmlspecialchars(strip_tags($this->orderno));
       $this->rating = htmlspecialchars(strip_tags($this->rating));
       $this->cid = htmlspecialchars(strip_tags($this->cid));
          // Bind data
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':review', $this->review);
          $stmt->bindParam(':orderno', $this->orderno);
          $stmt->bindParam(':rating', $this->rating);
          $stmt->bindParam(':cid', $this->cid);
          // Execute query
          
          if($stmt->execute()) {
            return true;
          }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;

      }
  }