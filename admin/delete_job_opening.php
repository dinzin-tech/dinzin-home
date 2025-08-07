<?php
require_once "./authHelper.php";

require_once "../server/autoload.php";

// Ensure job opening ID is provided
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$jobOpeningId = $_GET['id'];

$jobOpeningTable = new \classes\Table(\classes\Table::JOB_OPENINGS);

// Delete the job opening from the database
// $jobOpeningTable->customQuery("DELETE FROM job_openings WHERE id = $jobOpeningId");
$success = $jobOpeningTable->deleteRecord(['id' => $jobOpeningId]);

if ($success) {
    // Redirect to dashboard or job openings list
    header("Location: dashboard.php");
    // exit;
} else {
    $error = "Failed to delete job opening.";
}
?>
