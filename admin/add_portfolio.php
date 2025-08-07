<?php

require_once "../server/autoload.php";

use classes\Table;

$title = "Add Portfolio";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $portfolioTbl = new Table('portfolio');

    $name = $_POST['name'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $screenshotUrl = null;

    // Handle file upload
    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "./uploads/";
        $fileName = basename($_FILES['screenshot']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($fileType), $allowedTypes)) {
            $uniqueName = uniqid() . "." . $fileType;
            $uploadPath = $uploadDir . $uniqueName;

            if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $uploadPath)) {
                $screenshotUrl = "uploads/" . $uniqueName; // Relative path to store in the database
            } else {
                die("Error uploading the file.");
            }
        } else {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }
    }

    // Insert record into the database
    $portfolioTbl->insertRecord([
        'name' => $name,
        'description' => $description,
        'screenshot' => $screenshotUrl,
        'url' => $url,
    ]);

    // Redirect to portfolio page
    header('Location: portfolio.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> | Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2><?=$title?></h2>
        <form method="POST" action="add_portfolio.php" enctype="multipart/form-data">
            <div>
                <label for="name">Portfolio Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div>
                <label for="screenshot">Screenshot:</label>
                <input type="file" id="screenshot" name="screenshot" accept="image/*" required>
            </div>
            <div>
                <label for="url">Portfolio URL:</label>
                <input type="text" id="url" name="url" required>
            </div>
            <button type="submit">Add Portfolio</button>
        </form>
    </div>
</body>
</html>
