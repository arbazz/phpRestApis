<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/database.php';
  include_once '../models/users.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Users($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->fname = $data->fname;
  $post->lname = $data->lname;
  $post->upassword = $data->upassword;
  $post->uaopp = $data->uaopp;
  $post->udesc = $data->udesc;
  $post->uprovince = $data->uprovince;
  $post->uzip = $data->uzip;
  $post->ucountry = $data->ucountry;
  $post->ucity = $data->ucity;
  $post->ucontactno = $data->ucontactno;
  $post->uaddress = $data->uaddress;
  $post->ucat = $data->ucat;
  $post->uemail = $data->uemail;

  // Create post
  if($post->add_personel_registration()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }