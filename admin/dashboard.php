<?php

use classes\Table;

require_once "./authHelper.php";

require_once "../server/autoload.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            margin-bottom: 20px;
        }

        .button-container button {
            margin-right: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f2f2f2;
        }

        table td a {
            color: #007bff;
            text-decoration: none;
        }

        table td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="button-container">
            <a href="job_posting.php" target="_blank"><button>Manage Job Postings</button></a>
            <a href="legal.php"><button>Legal</button></a>
            <a href="portfolio.php"><button>Portfolio</button></a>
            <a href="projects/index.php"><button>Projects</button></a>
        </div>
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

