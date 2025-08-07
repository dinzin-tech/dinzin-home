<?php
require_once("src/db.php");

header('Content-Type: application/json');

$response = ['success' => false];

// Your subscription logic here...

if(isset($_POST['EMAIL'])) {
    $email = $_POST['EMAIL'];
    $sourse = $_POST['source'];

    if(strlen($email) < 150) {
        $sql = "INSERT INTO subcription (email, source) VALUES ('$email', '$sourse')";

        if ($conn->query($sql) === TRUE) {
            $subscription_successful = true;
        } else {
            $subscription_successful = false;
        }
    } else {
        $subscription_successful = false;
    }

}


if ($subscription_successful) {
    $response['success'] = true;
}

echo json_encode($response);
?>
