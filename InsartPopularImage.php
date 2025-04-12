<?php
$con=new mysqli("localhost",
"njoabbmn_items_wellpick","Well_pick1234!@","njoabbmn_items_wellpick");

$Name=$_POST['name'];
$encodeImage=$_POST['encodeImage'];
$description=$_POST['description'];
$password=$_POST['password'];
$target_path = "popular/";  

if($password=="popularImages"){

    $imageStore = rand()."_".time().".jpeg";  
    $target_path = $target_path."/".$imageStore;  
    file_put_contents($target_path, base64_decode($encodeImage));  
    $select = "INSERT INTO popularIteme( name,description,encodeImage) VALUES
     ('$Name','$description','$imageStore')";  
    $response = mysqli_query($con,$select);  
    if($response){  
      echo " Upload  Popular Iteme successfully";  
      mysqli_close($con);  
    } else{  
      echo "Something Wrong";  
    }  







}else{
    echo "Something Wrong";   
}







?>