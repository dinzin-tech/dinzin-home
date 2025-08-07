<?php
session_start();

function checkAdminLogin() {
    // Check if admin is not logged in
    if (!isset($_SESSION['admin'])) {
        // Redirect to login page
        header("Location: login.php");
        exit;
    }
}

// Call this function at the beginning of each admin-only page
checkAdminLogin();
?>
