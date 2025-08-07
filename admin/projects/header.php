<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management App</title>
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --light: #ecf0f1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f6fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .nav {
            background-color: var(--primary);
            padding: 15px;
            margin-bottom: 30px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav a:hover {
            background-color: var(--secondary);
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .task-list {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .task-list th, .task-list td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table.task-list a:visited {
            color: blue;
        }

        .status.pending { color: #e67e22; }
        .status.completed { color: #27ae60; }

        .task-data {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="container">
            <a href="index.php">Home</a>
            <a href="add_member.php">Add Member</a>
            <a href="create_project.php">Create Project</a>
            <a href="add_task.php">Add Task</a>
            <a href="view_tasks.php">View Tasks</a>
        </div>
    </div>
    <div class="container">