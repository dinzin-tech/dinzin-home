<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="light-mode">
    <div class="container">
        <button id="sidebarToggle" class="toggle-btn"><i class="material-icons small blue-grey-text">menu</i></button>
        <div class="sidebar custom-scrollbar" id="sidebar">
            <div class="toggle-container">
                <i id="darkModeToggle" class="material-icons small blue-grey-text">contrast</i>
                <h3>COURSE_NAME</h3>
            </div>
            <!-- <h2>Modules</h2> -->
            <div id="modules">
                <!-- Modules will be populated here by jQuery -->
            </div>
        </div>
        <div class="content custom-scrollbar" id="content">
            <h2 id="topicTitle">Select a topic</h2>
            <div id="topicContent">
                <!-- Topic content will be displayed here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
