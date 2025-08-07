<?php

require_once("../src/db.php");

if (isset($_GET['courseId'])) {
    $courseId = $_GET['courseId'];
    
    $modules = [];
    $result = $conn->query("SELECT * FROM modules WHERE course_id = $courseId");
    while ($row = $result->fetch_assoc()) {
        $moduleId = $row['id'];
        $module = [
            'name' => $row['name'],
            'description' => $row['description'],
            'topics' => []
        ];

        $topicResult = $conn->query("SELECT * FROM topics WHERE module_id = $moduleId");
        while ($topicRow = $topicResult->fetch_assoc()) {
            $module['topics'][] = [
                'id' => $topicRow['id'],
                'name' => $topicRow['name']
            ];
        }

        $modules[] = $module;
    }

    header('Content-Type: application/json');
    echo json_encode(['modules' => $modules]);
    exit;
}

if (isset($_GET['topicId'])) {
    $topicId = $_GET['topicId'];
    $result = $conn->query("SELECT * FROM topics WHERE id = $topicId");
    $topic = $result->fetch_assoc();

    header('Content-Type: application/json');
    echo json_encode($topic);
    exit;
}

$conn->close();
?>
