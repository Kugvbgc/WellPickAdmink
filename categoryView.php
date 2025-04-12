<?php
$con = mysqli_connect('localhost', 'njoabbmn_items_wellpick',
 'Well_pick1234!@', 'njoabbmn_items_wellpick');

$sql = "SELECT * FROM category ORDER BY id DESC ";
$result = mysqli_query($con, $sql);
//$products = array();
$data = array();  
foreach($result as $item){  
  $id = $item['id'];  
  $category_name = $item['category_name'];  
   
  $userInfo['id'] = $id;  
  $userInfo['category_name'] = $category_name;  
 
  array_push($data,$userInfo);  
} 
header('Content-type: application/json');
echo json_encode($data)




?>