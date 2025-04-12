<?php
$conn = new mysqli("localhost", "njoabbmn_items_wellpick", "Well_pick1234!@", "njoabbmn_items_wellpick");

// Simple password check (use better auth in production)
$expected_password = "khair1234@"; // Replace with your actual password

$id = $_POST['id'];
$name = $_POST['name'];
$image_url = $_POST['image_url'];
$description = $_POST['description'];
$password = $_POST['password'];

$target_path = "img_khair/";

if ($password === $expected_password) {
    if (!empty($id)) {
        // Save new image
        $imageName = rand() . "_" . time() . ".jpeg";
        $fullPath = $target_path . $imageName;

        // Decode and save image
        file_put_contents($fullPath, base64_decode($image_url));

        // Get current image file name from DB (to delete the old one)
        $stmt = $conn->prepare("SELECT image_url FROM iteme WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($oldImage);
        $stmt->fetch();
        $stmt->close();

        // Update item with new data
        $stmt = $conn->prepare("UPDATE iteme SET name = ?, image_url = ?, description = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $imageName, $description, $id);

        if ($stmt->execute()) {
            // Delete old image if exists
            if (!empty($oldImage) && file_exists($target_path . $oldImage)) {
                unlink($target_path . $oldImage);
            }

            echo "Item updated successfully.";
        } else {
            echo "Error updating item: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID is required.";
    }
} else {
    echo "Incorrect password.";
}

$conn->close();
?>
