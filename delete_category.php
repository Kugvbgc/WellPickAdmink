<?php
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Database connection
    $conn = new mysqli("localhost", "njoabbmn_items_wellpick", "Well_pick1234!@", "njoabbmn_items_wellpick");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

    }

    // Step 1: Get all item images under the category
    $stmtSelect = $conn->prepare("SELECT image_url FROM iteme WHERE category_id = ?");
    $stmtSelect->bind_param("i", $category_id);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();

    while ($row = $result->fetch_assoc()) {
        $image = $row['image_url'];
        $filePath = "img_khair/" . $image; // ইমেজ লোকেশন

        // Check and delete the image file
        if (!empty($image) && file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Step 2: Delete items under the category
    $stmt1 = $conn->prepare("DELETE FROM iteme WHERE category_id = ?");
    $stmt1->bind_param("i", $category_id);
    $stmt1->execute();

    // Step 3: Delete the category itself
    $stmt2 = $conn->prepare("DELETE FROM category WHERE id = ?");
    $stmt2->bind_param("i", $category_id);
    $stmt2->execute();

    echo "success";
} else {
    echo "category_id not provided";
}
?>
