<?php 
  class Temail {
    private $conn;
    private $table = 'temail';

       // Post Properties
       public $id;
       public $nemail;

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

      public function add_email(){
        $query = 'INSERT INTO ' . $this->table . ' SET id = :id, nemail = :nemail';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nemail = htmlspecialchars(strip_tags($this->nemail));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nemail', $this->nemail);

        if($stmt->execute()) {
            return true;
          }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;
      }

      public function read_email(){
              // Create query
              $query = "SELECT * FROM temail WHERE id=?";
        
              $stmt = $this->conn->prepare($query);
              $stmt->bindParam(1, $this->id);
      
              // Execute query
              $stmt->execute();
        
              return $stmt;
          }
  }

  