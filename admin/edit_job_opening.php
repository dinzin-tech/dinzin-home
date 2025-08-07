<?php
require_once "./authHelper.php";

require_once "../server/autoload.php";

// Retrieve job opening details based on ID
if (isset($_GET['id'])) {
    $jobOpeningId = $_GET['id'];

    // require_once 'path_to_classes/Table.php'; // Adjust the path accordingly
    $jobOpeningTable = new \classes\Table(\classes\Table::JOB_OPENINGS);

    $jobOpening = $jobOpeningTable->selectRecordWhere(['id' => $jobOpeningId]);

    if (!$jobOpening) {
        // Job opening not found
        // header("Location: dashboard.php");
        echo "Invalid Job ID or No Job ID";
        exit;
    }
} else {
    // No job opening ID provided
    // header("Location: admin_dashboard.php");
    echo "Invalid Job ID or No Job ID";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // Update job opening in the database
    $data = [
        'title' => $title,
        'description' => $description,
        'location' => $location
    ];

    $success = $jobOpeningTable->updateRecord($data, ['id' => $jobOpeningId]);

    print_r($success);
    if ($success) {
        // Redirect to dashboard or job openings list
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Failed to update job opening.";
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Opening</title>
</head>
<body>
    <h2>Edit Job Opening</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $jobOpening['title']; ?>" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo $jobOpening['description']; ?></textarea><br>
        <label for="description">Location:</label><br>
        <textarea id="location" name="location" required><?php echo $jobOpening['location']; ?></textarea><br>
        <br>
        <button type="submit">Update Job Opening</button>
    </form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Opening</title>
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

        .page-title {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Job Opening</h2>
        <div class="form-container">
            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <form method="post" action="">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $jobOpening['title']; ?>" required><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required><?php echo $jobOpening['description']; ?></textarea><br>
                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" value="<?php echo $jobOpening['location']; ?>" required><br>
                <br>
                <button type="submit">Update Job Opening</button>
            </form>
        </div>
    </div>
</body>
</html>
