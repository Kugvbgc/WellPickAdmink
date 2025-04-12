<?php
$name = $_POST['categoryName'];


$conn = new mysqli("localhost", "njoabbmn_items_wellpick", "Well_pick1234!@", "njoabbmn_items_wellpick");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}   
  
$sql = "INSERT INTO category (category_name) VALUES ('$name');";
$result = mysqli_query($conn, $sql);

echo" Data Intsart ";

    

    

    $sql->close();
    $conn->close();


?>