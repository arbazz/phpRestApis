<?php 
  class Company {
    private $conn;
    private $table = 'company';

       // Post Properties
       public $id;
       public $cname;
       public $ccat;
       public $ccity;
       public $czip;
       public $cemail;
       public $caopp;
       public $cdesc;
       public $caddress;
       public $ccountry;
       public $cprovince;
       public $ccontactno;
       public $cdoc;
       public $cdate;
       public $cstatus;
       public $cpassword;
       public $youtube;
       public $udp;

       public function __construct($db) {
        $this->conn = $db;
      }

      public function read() {
        // Create query
        $query = "select * from company where id=? and cstatus='active'";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         // Set properties
         $this->id = $row['id'];
         $this->cname = $row['cname'];
         $this->ccat = $row['ccat'];
         $this->ccity = $row['ccity'];
         $this->czip = $row['czip'];
         $this->cemail = $row['cemail'];
         $this->caopp = $row['caopp'];
         $this->cdesc = $row['cdesc'];
         $this->caddress = $row['caddress'];
         $this->ccountry = $row['ccountry'];
         $this->cprovince = $row['cprovince'];
         $this->ccontactno = $row['ccontactno'];
         $this->cdoc = $row['cdoc'];
         $this->cdate = $row['cdate'];
         $this->cstatus = $row['cstatus'];
         $this->cpassword = $row['cpassword'];
         $this->youtube = $row['youtube'];
         $this->udp = $row['udp'];
      }

      public function add_company_registration(){
        $query = 'INSERT INTO ' . $this->table . ' SET youtube = :youtube, cname = :cname, cemail = :cemail, ccountry = :ccountry, cprovince = :cprovince, caopp = :caopp, cdesc = :cdesc, ccat = :ccat, caddress = :caddress, czip = :czip, ccontactno = :ccontactno, ccity = :ccity, cpassword = :cpassword';

        $stmt = $this->conn->prepare($query);

       $this->youtube = htmlspecialchars(strip_tags($this->youtube));
       $this->cname = htmlspecialchars(strip_tags($this->cname));
       $this->cemail = htmlspecialchars(strip_tags($this->cemail));
       $this->ccountry = htmlspecialchars(strip_tags($this->ccountry));
       $this->cprovince = htmlspecialchars(strip_tags($this->cprovince));
       $this->caopp = htmlspecialchars(strip_tags($this->caopp));
       $this->cdesc = htmlspecialchars(strip_tags($this->cdesc));
       $this->ccat = htmlspecialchars(strip_tags($this->ccat));
       $this->caddress = htmlspecialchars(strip_tags($this->caddress));
       $this->czip = htmlspecialchars(strip_tags($this->czip));
       $this->ccontactno = htmlspecialchars(strip_tags($this->ccontactno));
       $this->ccity = htmlspecialchars(strip_tags($this->ccity));
       $this->cpassword = htmlspecialchars(strip_tags($this->cpassword));
          // Bind data
          $stmt->bindParam(':youtube', $this->youtube);
          $stmt->bindParam(':cname', $this->cname);
          $stmt->bindParam(':cemail', $this->cemail);
          $stmt->bindParam(':ccountry', $this->ccountry);
          $stmt->bindParam(':cprovince', $this->cprovince);
          $stmt->bindParam(':caopp', $this->caopp);
          $stmt->bindParam(':cdesc', $this->cdesc);
          $stmt->bindParam(':ccat', $this->ccat);
          $stmt->bindParam(':caddress', $this->caddress);
          $stmt->bindParam(':czip', $this->czip);
          $stmt->bindParam(':ccontactno', $this->ccontactno);
          $stmt->bindParam(':ccity', $this->ccity);
          $stmt->bindParam(':cpassword', $this->cpassword);
          // Execute query
          
          if($stmt->execute()) {
            return true;
          }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;
      }

      public function read_login_information() {
        // Create query
        $query = "select * from company where cemail=? and cpassword=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->cemail);
        $stmt->bindParam(2, $this->cpassword);

        // Execute query
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         // Set properties
         $this->id = $row['id'];
         $this->cname = $row['cname'];
         $this->ccat = $row['ccat'];
         $this->ccity = $row['ccity'];
         $this->czip = $row['czip'];
         $this->cemail = $row['cemail'];
         $this->caopp = $row['caopp'];
         $this->cdesc = $row['cdesc'];
         $this->caddress = $row['caddress'];
         $this->ccountry = $row['ccountry'];
         $this->cprovince = $row['cprovince'];
         $this->ccontactno = $row['ccontactno'];
         $this->cdoc = $row['cdoc'];
         $this->cdate = $row['cdate'];
         $this->cstatus = $row['cstatus'];
         $this->cpassword = $row['cpassword'];
         $this->youtube = $row['youtube'];
         $this->udp = $row['udp'];
      }

  }