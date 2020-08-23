<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../models/visitor.php';

  $database = new Database();
  $db = $database->connect();

  $certificates = new Visitor($db);

  $certificates->cid = isset($_GET['cid']) ? $_GET['cid'] : die();

  $result = $certificates->read_actual_ratings();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
         'email' => $email,
         'review' => $review,
         'cid' => $cid,
         'rating' => $rating,
         'orderno' => $orderno,
         'date' => $date,
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }