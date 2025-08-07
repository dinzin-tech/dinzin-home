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
    $duration = $_POST['duration'];

    $target_file = "";
    // Image upload
    $image = $_FILES['image']['name'];
    if ($image) {
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($image);
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create directory if it does not exist
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }
    
    $type = "quiz";
    $sql = "INSERT INTO topics (type, name, description, image_src, module_id, duration) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $type, $name, $description, $target_file, $module_id, $duration);

    if ($stmt->execute()) {
        echo "New quiz created successfully";
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
