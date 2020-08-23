<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/database.php';
  include_once '../models/visitor.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Visitor($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->email = $data->email;
  $post->review = $data->review;
  $post->orderno = $data->orderno;
  $post->rating = $data->rating;
  $post->cid = $data->cid;

  // Create post
  if($post->add_ratings()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }