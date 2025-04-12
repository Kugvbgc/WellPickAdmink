<?php
$conn = new mysqli("localhost", "njoabbmn_items_wellpick",
 "Well_pick1234!@", "njoabbmn_items_wellpick");

 $categoryName=$_POST['category_name'];
 $id=$_POST['id'];
 $password=$_POST['password'];
 $loginpassword='khair1234@';

if($password==$loginpassword){

 $query="UPDATE category SET id ='$id',category_name='$$categoryName' WHERE id='$id'";
 $result=mysqli_query($conn,$query);


 if($result){

    echo" Category  UpDate  successfully ";
    $conn->close(); 
 }else{
    echo" Error: Category UpDate Not successfully ";

   $conn->close(); 
 }






}









?>