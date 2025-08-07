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
    
    // Validate admin credentials
    $admin = $adminTable->selectRecordWhere(['username' => $username, 'password' => $password]);
    
    if ($admin) {
        // Admin authenticated successfully
        $_SESSION['admin'] = $admin; // Store admin details in session
        header('Location: dashboard.php'); // Redirect to admin dashboard
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
