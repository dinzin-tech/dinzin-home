<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $comment = $_POST['comment'];
    
    // In real app, you would get member ID from session
    $member_id = 1; // Temporary - replace with actual auth
    
    $stmt = $conn->prepare("INSERT INTO comments (task_id, team_member_id, comment) VALUES (?, ?, ?)");
    $stmt->execute([$task_id, $member_id, $comment]);
}

header("Location: view_task.php?id=$task_id");
exit();