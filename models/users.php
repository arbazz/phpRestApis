<?php 
  class Users {
    private $conn;
    private $table = 'users';

       // Post Properties
       public $id;
       public $fname;
       public $lname;
       public $ucat;
       public $uaddress;
       public $ucity;
       public $uzip;
       public $uaopp;
       public $udesc;
       public $uprovince;
       public $ucountry;
       public $uemail;
       public $ucontactno;
       public $posting_date;
       public $udoc;
       public $ustatus;
       public $upassword;
       public $type;
       public $cid;
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

      public function add_personel_registration(){
        $query = 'INSERT INTO ' . $this->table . ' SET fname = :fname, lname = :lname, uemail = :uemail, ucat = :ucat, uaddress = :uaddress, ucity = :ucity, ucontactno = :ucontactno, ucountry = :ucountry, uzip = :uzip, uprovince = :uprovince, udesc = :udesc, uaopp = :uaopp, upassword = :upassword';

        $stmt = $this->conn->prepare($query);

       $this->fname = htmlspecialchars(strip_tags($this->fname));
       $this->lname = htmlspecialchars(strip_tags($this->lname));
       $this->uemail = htmlspecialchars(strip_tags($this->uemail));
       $this->ucat = htmlspecialchars(strip_tags($this->ucat));
       $this->uaddress = htmlspecialchars(strip_tags($this->uaddress));
       $this->ucity = htmlspecialchars(strip_tags($this->ucity));
       $this->ucontactno = htmlspecialchars(strip_tags($this->ucontactno));
       $this->ucountry = htmlspecialchars(strip_tags($this->ucountry));
       $this->uzip = htmlspecialchars(strip_tags($this->uzip));
       $this->uprovince = htmlspecialchars(strip_tags($this->uprovince));
       $this->udesc = htmlspecialchars(strip_tags($this->udesc));
       $this->uaopp = htmlspecialchars(strip_tags($this->uaopp));
       $this->upassword = htmlspecialchars(strip_tags($this->upassword));
          // Bind data
          $stmt->bindParam(':fname', $this->fname);
          $stmt->bindParam(':lname', $this->lname);
          $stmt->bindParam(':uemail', $this->uemail);
          $stmt->bindParam(':ucat', $this->ucat);
          $stmt->bindParam(':uaddress', $this->uaddress);
          $stmt->bindParam(':ucity', $this->ucity);
          $stmt->bindParam(':ucontactno', $this->ucontactno);
          $stmt->bindParam(':ucountry', $this->ucountry);
          $stmt->bindParam(':uzip', $this->uzip);
          $stmt->bindParam(':uprovince', $this->uprovince);
          $stmt->bindParam(':udesc', $this->udesc);
          $stmt->bindParam(':uaopp', $this->uaopp);
          $stmt->bindParam(':upassword', $this->upassword);
          // Execute query
          
          if($stmt->execute()) {
            return true;
          }

           // Print error if something goes wrong
           printf("Error: %s.\n", $stmt->error);

           return false;

      }

      public function read_personel_login(){
        $query = "select * from users where uemail=? and upassword=? and ustatus = 'active'";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->uemail);
        $stmt->bindParam(2, $this->upassword);

        // Execute query
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         // Set properties
         $this->id = $row['id'];
         $this->fname = $row['fname'];
         $this->lname = $row['lname'];
         $this->ucat = $row['ucat'];
         $this->uaddress = $row['uaddress'];
         $this->ucity = $row['ucity'];
         $this->uzip = $row['uzip'];
         $this->uaopp = $row['uaopp'];
         $this->udesc = $row['udesc'];
         $this->uprovince = $row['uprovince'];
         $this->ucountry = $row['ucountry'];
         $this->uemail = $row['uemail'];
         $this->ucontactno = $row['ucontactno'];
         $this->posting_date = $row['posting_date'];
         $this->udoc = $row['udoc'];
         $this->ustatus = $row['ustatus'];
         $this->upassword = $row['upassword'];
         $this->type = $row['type'];
         $this->cid = $row['cid'];
         $this->udp = $row['udp'];
      }

      public function upload_dp_user(){
        $file = "-aloo" . "_" . basename($_FILES['image']['name']);

        $tmp_name = $_FILES['image']['tmp_name'];
       
       if(move_uploaded_file($tmp_name,"../docs/".$file)){
         echo json_encode([
           "Message" => "The file has been uploaded",
           "Status" => "OK"
           ]);
       }else{
         echo json_encode([
           "Message" => "sorry",
           "Status" => $file
           ]);
       }
              
      }
  }