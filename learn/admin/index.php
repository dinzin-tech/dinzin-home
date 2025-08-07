<?php

// Turn on error reporting
// error_reporting(E_ALL);

// // Display errors
// ini_set('display_errors', 1);

require_once("../src/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="./js/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="container">
        <h1>Admin Page</h1>
        
        <div class="form-section" id="addCourseSection">
            <h2>Add Course</h2>
            <form id="courseForm">
                <input id="courseId" type="hidden" name="courseId" value="">

                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="courseName" required>
                
                <label for="courseDescription">Course Description:</label>
                <textarea class="text-editor" id="courseDescription" name="courseDescription"></textarea>
                
                <button type="submit">Add Course</button>
            </form>

            <div class="list-section" id="courseListSection">
                <h2>Course List</h2>
                <ul class="list-data" id="courseList">
                    <!-- Courses will be dynamically added here -->
                </ul>
            </div>
        </div>

        <div class="form-section" id="addModuleSection">
            <h2>Add Module</h2>
            <form id="moduleForm">
                <input id="moduleId" type="hidden" name="moduleId" value="">

                <label for="courseSelect">Course:</label>
                <select id="courseSelect" name="courseId" required>
                    <!-- Options will be populated by jQuery -->
                </select>

                <label for="moduleName">Module Name:</label>
                <input type="text" id="moduleName" name="moduleName" required>
                
                <label for="moduleDescription">Module Description:</label>
                <textarea class="text-editor" id="moduleDescription" name="moduleDescription" ></textarea>
                
                <button type="submit">Add Module</button>
            </form>

            <div class="list-section" id="moduleListSection">
                <h2>Module List</h2>
                <ul class="list-data" id="moduleList">
                    <!-- Modules will be dynamically added here -->
                </ul>
            </div>
        </div>

        <div class="form-section" id="addTopicSection">
            <h2>Add Topic</h2>
            <form id="topicForm">
                <input id="topicId" type="hidden" name="topicId" value="">

                <label for="moduleSelect">Module:</label>
                <select id="moduleSelect" name="moduleId" required>
                    <!-- Options will be populated by jQuery -->
                </select>
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="topicName">Topic Name:</label>
                        <input type="text" id="topicName" name="topicName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="type">Topic Type:</label>
                        <select id="type" name="type" required>
                            <option value="">Sect type</option>
                            <option value="lecture">Lecture</option>
                            <option value="assignment">Assignment</option>
                            <option value="quiz">Quiz</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="videoLink">Video Link:</label>
                        <input type="text" id="videoLink" name="videoLink">
                    </div>
                    <div class="col-md-6">
                        <label for="videoCredit">Video Credit:</label>
                        <input type="text" id="videoCredit" name="videoCredit">
                    </div>
                </div>
                
                <label for="documentLink">Document Link:</label>
                <input type="text" id="documentLink" name="documentLink">
                
                <label for="description">Description:</label>
                <textarea class="text-editor" id="description" name="description"></textarea>
                
                <button type="submit">Add Topic</button>
            </form>

            <div class="list-section" id="topicListSection">
                <h2>Topic List</h2>
                <ul class="list-data" id="topicList">
                    <!-- Topics will be dynamically added here -->
                </ul>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/k7jtyhbl68b00mmbb1ln6v7lp3gms263zz7di95w77z54tsx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-section h2').click(function() {
                $(this).parent('.form-section').toggleClass('open');
            });

            $('.list-section h2').click(function() {
                $(this).parent('.list-section').toggleClass('open');
            });
        });

        /*tinymce.init({
            selector: 'textarea.text-editor',
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });*/

        tinymce.init({
            selector: 'textarea.text-editor',
            height: 400,
            plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
            toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code preview searchreplace table',
            toolbar_mode: 'scrolling',
        });
    </script>
</body>
</html>
