<?php
require_once "./authHelper.php";

require_once "../server/autoload.php";

$title = "Edit Legal Doc";

// Retrieve legal doc details based on ID
if (isset($_GET['id'])) {
    $legalDocId = $_GET['id'];

    // require_once 'path_to_classes/Table.php'; // Adjust the path accordingly
    $legalDocTable = new \classes\Table(\classes\Table::LEGAL);

    $legalDoc = $legalDocTable->selectRecordWhere(['id' => $legalDocId]);

    if (!$legalDoc) {
        // legal doc not found
        // header("Location: dashboard.php");
        echo "Invalid Legal Doc ID or No Legal Doc ID";
        exit;
    }
} else {
    // No legal doc ID provided
    // header("Location: admin_dashboard.php");
    echo "Invalid Legal Doc ID or No Legal Doc ID";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish = $_POST['publish'];

    // Update legal doc in the database
    $data = [
        'title' => $title,
        'content' => $content,
        'publish' => $publish,
        'updated' => date('Y-m-d H:i:s'),
    ];

    $success = $legalDocTable->updateRecord($data, ['id' => $legalDocId]);

    print_r($success);
    if ($success) {
        // Redirect to dashboard or legal docs list
        header("Location: legal.php");
        exit;
    } else {
        $error = "Failed to update legal doc.";
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
            <form method="post" id="legal_form" action="">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $legalDoc['title']; ?>" required><br>
                <label for="content">Description:</label><br>
                <textarea class="text-editor" id="content" name="content"><?php echo $legalDoc['content']; ?></textarea><br>
                <p>Do you want to publish?</p>
                <input type="radio" id="yes" name="publish" value="1" <?php echo $legalDoc['publish'] ? "checked" : ""; ?>>
                <label for="yes">Yes</label><br>
                <input type="radio" id="no" name="publish" value="0" <?php echo !$legalDoc['publish'] ? "checked" : ""; ?>>
                <label for="no">No</label><br>
                <br>
                <button type="submit">Update legal doc</button>
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
