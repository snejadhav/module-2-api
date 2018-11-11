<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  //include_once '../objects/product.php';
  // Instantiate DB & connect

  //echo "Crete started";
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $category = new Category($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  //echo $data;


  if(
    !empty($data->todos)){

  $category->todos = $data->todos;
  $category->date = date('Y-m-d');
  $category->username = $data->username;

  // Create Category
  if($category->create()) {
    echo json_encode(
      array('message' => 'todos Created')
    );
  } 
}
  else {
    echo json_encode(
      array('message' => 'todos Not Created')
    );
  }
