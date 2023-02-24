<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

//instantiate DB & connect 
$database = new Database();
$db = $database->connect();

//Instantiate blog category object
$category = new Category($db);
//Blog category Query 
$result = $category->read();
//Get row count
$num = $result->rowCount();

//Check if any categorys
if ($num > 0) {
   //category array 
   $category_arr = array();
   $category_arr['data'] = array();

   while ($row = $result->fetch(PDO:: FETCH_ASSOC)) {
extract($row);
 
$category_item = array(
    'id' => $id,
    'name' => $name,
     
);
//Push to "data"
array_push($category_arr['data'], $category_item);
    
   }
   //Turn to json & output
   echo json_encode($category_arr);

} else {
//Np categorys
echo json_encode(
    array('message'=> 'No categorys Found')
);
}
?>