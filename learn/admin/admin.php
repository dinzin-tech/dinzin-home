<?php
// Turn on error reporting
// error_reporting(E_ALL);

// // Display errors
// ini_set('display_errors', 1);

//require_once("../../server/db.php");
require_once("../src/db.php");

// Handle course form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['courseName'])) {
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $courseId = $_POST['courseId'];
    if(!empty($courseId)) {
        $sql = "UPDATE courses set name = '$courseName', description = '$courseDescription' WHERE id = '$courseId'";
    }
    else {
        $sql = "INSERT INTO courses (name, description) VALUES ('$courseName', '$courseDescription')";
    }

    if ($conn->query($sql) === TRUE) {
        echo $courseId ? "Updated course successfully" : "New course created successfully";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }
}

// Handle module form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['moduleName'])) {
    $moduleName = $_POST['moduleName'];
    $moduleDescription = $_POST['moduleDescription'];
    $courseId = $_POST['courseId'];
    $moduleId = $_POST['moduleId'];

    if(!empty($moduleId)) {
        $sql = "UPDATE modules set name = '$moduleName', description = '$moduleDescription', course_id = '$courseId' WHERE id = '$moduleId'";
    }
    else {
        $sql = "INSERT INTO modules (name, description, course_id) VALUES ('$moduleName', '$moduleDescription', $courseId)";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo $moduleId ? "Updated module successfully" : "New module created successfully";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }
}

// Handle topic form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topicName'])) {
    // echo "hi";exit;
    $topicName = $_POST['topicName'];
    $type = $_POST['type'];
    $videoLink = $_POST['videoLink'];
    $documentLink = $_POST['documentLink'];
    $videoCredit = $_POST['videoCredit'];
    $description = $_POST['description'];
    $moduleId = $_POST['moduleId'];
    $topicId = $_POST['topicId'];

    if(!empty($topicId)) {
        $sql = "UPDATE topics set name = '$topicName', type = '$type', video_link = '$videoLink', video_credit = '$videoCredit', document_link = '$documentLink', description = \"$description\", module_id = $moduleId WHERE id = '$topicId'";
    }
    else {
        $sql = "INSERT INTO topics (name, type, video_link, video_credit, document_link, description, module_id) 
                VALUES ('$topicName', '$type', '$videoLink', '$videoCredit', '$documentLink', \"$description\", $moduleId)";
    }
    // print_r($sql); exit;        
    if ($conn->query($sql) === TRUE) {
        $resp = [
            'type'  => $type,
            'module'  => $moduleId,
            'msg'   => $topicId ? "Updated topic successfully" : "New topic created successfully"
        ];
        echo json_encode($resp);
        exit;
    } else {
        $resp = [
            'error' => "Error: " . $sql . "<br>" . $conn->error
        ];
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo json_encode($resp);
        exit;
    }
}

// Handle course delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteCourse') {
    $courseId = $_POST['courseId'];
    // Delete course by $courseId
}

// Handle module delete similarly
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteModule') {
    $moduleId = $_POST['moduleId'];
    // Delete module by $moduleId
}

// Handle topic delete similarly
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteTopic') {
    $topicId = $_POST['topicId'];
    // Delete topic by $topicId
}

// Handle topic delete similarly
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'DELETE_DATA') {
    $dataId = $_POST['id'];
    $type = $_POST['type']; // Assuming you also need to know the type of data to delete
    
    // Prepare the DELETE query
    $stmt = $conn->prepare("DELETE FROM $type WHERE id = ?");
    $stmt->bind_param('i', $dataId);
    
    // Execute the query
    if ($stmt->execute()) {
        $response = ['status' => 'success', 'message' => 'Data deleted successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to delete data.'];
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// fetch course, module, topic data by id
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'GET_DATA') {
    $id = $_GET['id'];
    $type = $_GET['type'];
    // Delete topic by $topicId
    $result = $conn->query("SELECT * FROM $type where id = '$id'");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode(['data' => $data[0]]);
    exit;
}


// Retrieve courses and modules
$courses = [];
$modules = [];
$topics = [];

$result = $conn->query("SELECT * FROM courses");
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

$result = $conn->query("SELECT * FROM modules");
while ($row = $result->fetch_assoc()) {
    $modules[] = $row;
}

$result = $conn->query("SELECT * FROM topics");
while ($row = $result->fetch_assoc()) {
    $topics[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(['courses' => $courses, 'modules' => $modules, 'topics' => $topics]);
?>
