<?php
$con = mysqli_connect('localhost', 'njoabbmn_items_wellpick',
'Well_pick1234!@', 'njoabbmn_items_wellpick');

$json=file_get_contents('php://input');
$jsonArray=json_decode($json,true);
$data=$jsonArray[0];

$password=$data['password'];

if($password=='loadPopularImages'){

$sql = "SELECT * FROM popularIteme ";

 $result = mysqli_query($con,$sql);  
 $data1 = array();  
 foreach($result as $item){  
   $id = $item['id'];  
   $name = $item['name'];  
   $images = $item['encodeImage'];
   $description = $item['description'];
   


   $userInfo['id'] = $id;  
   $userInfo['name'] = $name;  
   $userInfo['encodeImage'] = $images;  
   $userInfo['description'] = $description; 
   
   array_push($data1,$userInfo);  
 } 
header('Content-type: application/json');
 echo json_encode($data1);  
}









?>