<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["assignment_file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (max 5MB)
if ($_FILES["assignment_file"]["size"] > 5000000) {
    echo "Sorry, your file is too large (max 5MB).";
    $uploadOk = 0;
}

// Allow only ZIP file format
if($fileType != "zip") {
    echo "Sorry, only ZIP files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["assignment_file"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["assignment_file"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
