<?php

$con = mysqli_connect('localhost', 'njoabbmn_items_wellpick',
 'Well_pick1234!@', 'njoabbmn_items_wellpick');




$categoryId = $_GET['categoryId'];

$sql = "SELECT id, name, image_url, description FROM iteme WHERE category_id = $categoryId";

 $result = mysqli_query($con,$sql);  
 $data = array();  
 foreach($result as $item){  
   $id = $item['id'];  
   $name = $item['name'];  
   $images = $item['image_url'];
   $description = $item['description'];
   $category_id = $item['category_id'];


   $userInfo['id'] = $id;  
   $userInfo['name'] = $name;  
   $userInfo['image_url'] = $images;  
   $userInfo['description'] = $description; 
   $userInfo['category_id'] = $category_id; 
   array_push($data,$userInfo);  
 } 
header('Content-type: application/json');
 echo json_encode($data);  
 ?>


?>