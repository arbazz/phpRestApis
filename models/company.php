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
  }