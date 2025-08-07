<?php

use classes\Table;

require_once "./authHelper.php";

require_once "../server/autoload.php";

$title = "Manage Legal Docs";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> | Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2><?=$title?></h2>
        <div class="button-container">
            <a href="add_legal_doc.php"><button>Add New Legal Doc</button></a>
        </div>
        
        <h2>Legal Docs</h2>
        <table>
            <tr>
                <th>Doc ID</th>
                <th>Title</th>
                <!-- <th>Content</th> -->
                <th>Created on</th>
                <th>Updated on</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
            
        <?php
            $legalTbl = new Table(Table::LEGAL);

            // Retrieve job openings data from the database
            if($legaldocs = $legalTbl->selectAllRecords()) {
                foreach ($legaldocs as $doc) {
                    echo "<tr>";
                    echo "<td>{$doc['id']}</td>";
                    echo "<td>{$doc['title']}</td>";
                    // echo "<td>{$doc['content']}</td>";
                    echo "<td>{$doc['created']}</td>";
                    echo "<td>{$doc['updated']}</td>";
                    echo "<td>{$doc['publish']}</td>";
                    echo "<td><a href='./edit_legal_doc.php?id={$doc['id']}'>Edit</a> | <a href='#' onclick='deleteJobOpening({$doc['id']})'>Delete</a></td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
    </div>

    <!-- JavaScript function for confirming deletion -->
    <script>
        function deleteJobOpening(id) {
            if (confirm("Are you sure you want to delete this document?")) {
                // Perform deletion action or redirect to delete page
                window.location.href = "delete_row.php?id=" + id + "&type=legal";
            }
        }
    </script>
</body>
</html>

