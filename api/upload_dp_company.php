<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

	define('DB_SERVER','localhost');
	define('DB_USER','stiqcoza_stiqcoza');
	define('DB_PASS' ,'Z87YHyqAe');
	define('DB_NAME', 'stiqcoza_stiqcoza');
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

ini_set('display_errors',1);
error_reporting(E_ALL);
	// Type your website name or domain name here.
 $file = time(). "_" .basename($_FILES["image"]["name"]);
 
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);

 $tmp_name = $_FILES['image']['tmp_name'];

 $id = isset($_GET['id']) ? $_GET['id'] : die();

 
if(move_uploaded_file($tmp_name,"../../docs/" . $file)){
    
    $insert = mysqli_query($con,"UPDATE company SET udp='$file' WHERE id='$id'");
    
   if($insert){
                $statusMsg = "The file  has been uploaded successfully .";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
            
	echo json_encode([
    "Message" => $statusMsg,
    "Status" =>  $file
	]);
	
}else{
  echo json_encode([
    "Message" => "sorry",
    "Status" => "Error"
    ]);
}


?>