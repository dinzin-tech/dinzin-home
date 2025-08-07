<?php

use classes\Table;

require_once "../server/autoload.php";

$title = "Portfolio";

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
            <a href="add_portfolio.php"><button>Add Portfolio Item</button></a>
        </div>
        
        <h2>Portfolio Items</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Screenshot</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
            
            <?php
            $portfolioTbl = new Table('portfolio'); // Assuming Table::PORTFOLIO maps to your table name
            
            // Retrieve portfolio data from the database
            if ($portfolios = $portfolioTbl->selectAllRecords()) {
                foreach ($portfolios as $portfolio) {
                    echo "<tr>";
                    echo "<td>{$portfolio['name']}</td>";
                    echo "<td>{$portfolio['description']}</td>";
                    echo "<td><img src='{$portfolio['screenshot']}' alt='{$portfolio['name']}' width='100'></td>";
                    echo "<td><a href='{$portfolio['url']}' target='_blank'>View</a></td>";
                    echo "<td>
                            <a href='./edit_portfolio.php?id={$portfolio['id']}'>Edit</a> | 
                            <a href='#' onclick='deletePortfolio({$portfolio['id']})'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <!-- JavaScript function for confirming deletion -->
    <script>
        function deletePortfolio(id) {
            if (confirm("Are you sure you want to delete this portfolio item?")) {
                window.location.href = "delete_row.php?type=portfolio&id=" + id;
            }
        }
    </script>
</body>
</html>
