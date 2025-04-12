<?php
$conn = new mysqli("localhost", "njoabbmn_items_wellpick",
"Well_pick1234!@", "njoabbmn_items_wellpick");
if (isset($_POST['id'])) {
    $id=$_POST['id'];
    
$sql = "DELETE FROM iteme WHERE id LIKE '". $id ."'";
$response=mysqli_query($conn,$sql);
    
    if ($response) {
        echo "Item deleted successfully.";
        $response->close();
    } else {
        echo "Error: " . $response;
    }
    $response->close();
}




?>