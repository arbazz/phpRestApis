<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../models/company.php';

  $database = new Database();
  $db = $database->connect();

  $test = new Company($db);


   // Get ID
   $test->cemail = isset($_GET['cemail']) ? $_GET['cemail'] : die();
   $test->cpassword = isset($_GET['cpassword']) ? $_GET['cpassword'] : die();

   // Get post
   $test->read_login_information();
 
   // Create array
   $post_arr = array(
     'id' => $test->id,
   );
 
   // Make JSON
   print_r(json_encode($test));