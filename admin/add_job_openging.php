<?php

require_once "./authHelper.php";

require_once "../server/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // Insert new job opening into the database
    // require_once 'path_to_classes/Table.php'; // Adjust the path accordingly
    $jobOpeningTable = new \classes\Table(\classes\Table::JOB_OPENINGS);

    $data = [
        'title' => $title,
        'description' => $description,
        'location' => $location
    ];

    $success = $jobOpeningTable->insertRecord($data);
    if ($success) {
        // Redirect to dashboard or job openings list
        // header("Location: adashboard.php");
        // exit;
        echo "<p style='color: green;'>Added the job opening!</p>";
    } else {
        $error = "Failed to add job opening.";
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job Opening</title>
</head>
<body>
    <h2>Add Job Opening</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="description">Location:</label><br>
        <input type="text" id="location" name="location" required><br>
        <br>
        <button type="submit">Add Job Opening</button>
    </form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job Opening</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px; /* Adjust height as needed */
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Job Opening</h2>
        <div class="form-container">
            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (isset($success)) { ?>
                <p class="success-message"><?php echo $success; ?></p>
            <?php } ?>
            <form method="post" action="">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="description">Location:</label><br>
                <input type="text" id="location" name="location" required><br>
                <br>
                <button type="submit">Add Job Opening</button>
            </form>
        </div>
    </div>
</body>
</html>
