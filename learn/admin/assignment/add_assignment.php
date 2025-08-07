<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "self_learning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $module_id = $_POST['module_id'];

    $target_file = "";
    // Image upload
    $image = $_FILES['image']['name'];
    if($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }
    
    $type = "assignment";
    $sql = "INSERT INTO topics (type, name, description, image_src, module_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $type, $name, $description, $target_file, $module_id);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: ../assignment/index.html");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
