<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE tasks SET status = 'completed' WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: view_tasks.php");
    exit();
}
?>