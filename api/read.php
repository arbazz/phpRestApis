<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../models/test.php';

  $database = new Database();
  $db = $database->connect();

  $test = new Test($db);


   // Get ID
   $test->code = isset($_GET['code']) ? $_GET['code'] : die();

   // Get post
   $test->read();
 
   // Create array
   $post_arr = array(
     'id' => $test->id,
     'code' => $test->code,
   );
 
   // Make JSON
   print_r(json_encode($test));