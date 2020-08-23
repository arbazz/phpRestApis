<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../models/company.php';

  $database = new Database();
  $db = $database->connect();

  $company = new Company($db);
 // Get ID
 $company->id = isset($_GET['id']) ? $_GET['id'] : die();

 // Get post
 $company->read();

 // Create array
 $post_arr = array(
   'id' => $company->id,
   'cname' => $company->cname,
 );

 // Make JSON
 print_r(json_encode($company));