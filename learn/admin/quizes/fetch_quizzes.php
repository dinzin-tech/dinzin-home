<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "self_learning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, duration FROM topics WHERE type='quiz'";
$result = $conn->query($sql);

$quizzes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quizzes[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($quizzes);
?>
