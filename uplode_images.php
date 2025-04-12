<?php
$conn = new mysqli("localhost", "njoabbmn_items_wellpick",
"Well_pick1234!@", "njoabbmn_items_wellpick");
if(isset($_POST['images'])){  
    $target_path = "img_khair/";  
    $image_url = $_POST['images'];  
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
   
    
    

    $imageStore = rand()."_".time().".jpeg";  
    $target_path = $target_path."/".$imageStore;  
    file_put_contents($target_path, base64_decode($image_url));  
    $select = "INSERT INTO iteme( name,image_url,description,category_id) VALUES
     ('$name','$imageStore','$description','$category_id')";  
    $response = mysqli_query($conn,$select);  
    if($response){  
      echo "Image Upload successfully";  
      mysqli_close($conn);  
    } else{  
      echo "Something Wrong";  
    }  
  
} 
$conn->close();


?>