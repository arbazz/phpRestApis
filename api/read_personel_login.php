<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../models/users.php';

  $database = new Database();
  $db = $database->connect();

  $test = new Users($db);


   // Get ID
   $test->uemail = isset($_GET['uemail']) ? $_GET['uemail'] : die();
   $test->upassword = isset($_GET['upassword']) ? $_GET['upassword'] : die();

   // Get post
   $test->read_personel_login();
 
   // Create array
   $post_arr = array(
     'id' => $test->id,
   );
 
   // Make JSON
   print_r(json_encode($test));