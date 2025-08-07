<?php

use classes\Table;

require_once "./authHelper.php";

require_once "../server/autoload.php";

$title = "Job Posting";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> |Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2><?=$title?></h2>
        <div class="button-container">
            <a href="add_job_openging.php"><button>Add Job Opening</button></a>
            <!-- <a href="edit_job_opening.php"><button>Edit Job Opening</button></a> -->
            <!-- <button onclick="deleteJobOpening()">Delete Job Opening</button> -->
        </div>
        
        <h2>Job Openings</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date Posted</th>
                <th>Actions</th>
            </tr>
            
        <?php
            $jobOpeningsTbl = new Table(Table::JOB_OPENINGS);

            // Retrieve job openings data from the database
            if($jobOpenings = $jobOpeningsTbl->selectAllRecords()) {
                foreach ($jobOpenings as $job) {
                    echo "<tr>";
                    echo "<td>{$job['title']}</td>";
                    echo "<td>{$job['description']}</td>";
                    echo "<td>{$job['location']}</td>";
                    echo "<td>{$job['date_posted']}</td>";
                    echo "<td><a href='./edit_job_opening.php?id={$job['id']}'>Edit</a> | <a href='#' onclick='deleteJobOpening({$job['id']})'>Delete</a></td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
    </div>

    <!-- JavaScript function for confirming deletion -->
    <script>
        function deleteJobOpening(id) {
            if (confirm("Are you sure you want to delete this job opening?")) {
                // Perform deletion action or redirect to delete page
                window.location.href = "delete_job_opening.php?id=" + id;
            }
        }
    </script>
</body>
</html>

