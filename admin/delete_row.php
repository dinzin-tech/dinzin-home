<?php
require_once "./authHelper.php";

require_once "../server/autoload.php";

use classes\Table;

// Ensure job opening ID is provided
if (!isset($_GET['id']) && !isset($_GET['type'])) {
    header("Location: dashboard.php");
    exit;
}

$rowId = $_GET['id'];
switch($_GET['type']) {
    case 'job':
        $tableName = Table::JOB_OPENINGS;
        break;
    case 'legal':
        $tableName = Table::LEGAL;
        break;
    case 'portfolio':
        $tableName = 'portfolio';
        break;
}

// print_r($tableName);exit;
if(!$tableName) {
    header("Location: dashboard.php");
    exit;
}

$table = new Table($tableName);

// Delete the job opening from the database
$success = $table->deleteRecord(['id' => $rowId]);

if ($success) {
    // Redirect to dashboard or job openings list
    if($tableName == Table::JOB_OPENINGS) {
        header("Location: job_posting.php");
    }
    if($tableName == Table::LEGAL) {
        header("Location: legal.php");
    }
    if($tableName == 'portfolio') {
        header("Location: portfolio.php");
    }
    // exit;
} else {
    $error = "Failed to delete!";
}
?>
