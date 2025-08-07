<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "self_learning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM modules";
$result = $conn->query($sql);

$modules = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $modules[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($modules);
?>
