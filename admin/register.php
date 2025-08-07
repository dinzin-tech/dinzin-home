<?php
session_start();

// Include the Table class
require_once '../server/autoload.php';

// Initialize the Table object for admin management
$adminTable = new \classes\Table(\classes\Table::ADMIN); // Assuming you have an 'admin' table

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if the username already exists
    $existingAdmin = $adminTable->selectRecordWhere(['username' => $username]);
    if ($existingAdmin) {
        $error = "Username already exists. Please choose a different username.";
    } else {
        // Insert the new admin record into the database
        $adminData = ['username' => $username, 'password' => $password];
        $success = $adminTable->insertRecord($adminData);
        if ($success) {
            // Registration successful
            $_SESSION['admin'] = $adminData; // Store admin details in session
            header('Location: dashboard.php'); // Redirect to admin dashboard
            exit;
        } else {
            $error = "Failed to register. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
