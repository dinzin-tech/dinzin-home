<?php
require_once("../src/db.php");

$sql = "SELECT * FROM courses";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to your dashboard</h1>
    <!-- <p><a href="../admin/index.html">Go to Admin Page</a></p> -->

    <?php foreach($courses as $course): ?>
        <p><a href="study.php?course=<?php echo $course['id'];?>">View Course: <?php echo $course['name']; ?></a></p>
    <?php endforeach; ?>
</body>
</html>
