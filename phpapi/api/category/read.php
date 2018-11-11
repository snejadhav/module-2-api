<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  //include_once '../objects/product.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $category = new Category($db);
  $data = json_decode(file_get_contents("php://input"));
  //echo $data;


  if(
    !empty($data->username)){

  $category->username = $data->username;
  //$category->date = date('Y-m-d');
  //echo $category->username;

//}
  // Category read query
  $result = $category->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $cat_arr = array();
       // $cat_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            "id" => $id,
            "todos" => $todos,
            "date" => $date,
          );

          // Push to "data"
          array_push($cat_arr, $cat_item);
        }

        // Turn to JSON & output
        echo json_encode($cat_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No todos Found')
        );
  }
}
else {
        // No Categories
        echo json_encode(
          array('message' => 'No todos Found')
        );
  }
