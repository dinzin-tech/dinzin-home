<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "self_learning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quiz_id = $_POST['quiz_id'];
    $question = $_POST['question'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $correct_option = $_POST['correct_option'];

    $target_file = "";
    // Question image upload
    $question_image = $_FILES['question_image']['name'];
    if ($question_image) {
        $target_dir = __DIR__ . "/uploads/questions/";
        $target_file = $target_dir . basename($question_image);
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create directory if it does not exist
        }
        move_uploaded_file($_FILES['question_image']['tmp_name'], $target_file);
    }

    $sql = "INSERT INTO questions (quiz_id, question, question_image, option_1, option_2, option_3, option_4, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $quiz_id, $question, $target_file, $option_1, $option_2, $option_3, $option_4, $correct_option);

    if ($stmt->execute()) {
        echo "New question added successfully";
        header("Location: manage_quiz.php?id=$quiz_id");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
