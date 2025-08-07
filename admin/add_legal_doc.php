<?php

require_once "./authHelper.php";

require_once "../server/autoload.php";

$title = "Add Legal Doc";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish = $_POST['publish'];

    // Insert new job opening into the database
    // require_once 'path_to_classes/Table.php'; // Adjust the path accordingly
    $legalDocTable = new \classes\Table(\classes\Table::LEGAL);

    $data = [
        'title' => $title,
        'content' => $content,
        'publish' => $publish
    ];

    $success = $legalDocTable->insertRecord($data);
    if ($success) {
        // Redirect to dashboard or job openings list
        header("Location: legal.php");
        exit;
        // echo "<p style='color: green;'>Added legal doc!</p>";
    } else {
        $error = "Failed to add legal doc opening.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="../js/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="container">
        <h2><?=$title?></h2>
        <div class="form-container">
            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (isset($success)) { ?>
                <p class="success-message"><?php echo $success; ?></p>
            <?php } ?>
            <form method="post" id="legal_form" action="">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br>
                <label for="content">Content:</label><br>
                <textarea class="text-editor" id="content" name="content"></textarea><br>
                <p>Do you want to publish this document?</p>
                <input type="radio" id="yes" name="publish" value="1" checked><label for="yes">Yes</label><br>
                <input type="radio" id="no" name="publish" value="0"><label for="no">No</label><br>
                <br>
                <button type="submit">Add Legal Doc</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.text-editor',
            height: 400,
            plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
            toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code preview searchreplace table',
            toolbar_mode: 'scrolling',
        });

        $("#legal_form").on('submit', function() {
            tinymce.triggerSave();
        });
    </script>
</body>
</html>
