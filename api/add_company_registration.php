<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/database.php';
  include_once '../models/company.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Company($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->youtube = $data->youtube;
  $post->cname = $data->cname;
  $post->cemail = $data->cemail;
  $post->ccountry = $data->ccountry;
  $post->cprovince = $data->cprovince;
  $post->caopp = $data->caopp;
  $post->cdesc = $data->cdesc;
  $post->ccat = $data->ccat;
  $post->caddress = $data->caddress;
  $post->czip = $data->czip;
  $post->ccontactno = $data->ccontactno;
  $post->ccity = $data->ccity;
  $post->cpassword = $data->cpassword;

  // Create post
  if($post->add_company_registration()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }