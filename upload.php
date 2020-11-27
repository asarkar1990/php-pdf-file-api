<?php
include 'connection.php';
global $connect;
// Uploads files
if (isset($_POST['submit'])) {
    $filename = $_FILES['myfile']['name'];

    $destination = 'storage/' . $filename;

    $path = 'http://localhost:8888/flutterAPI/'.$destination;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "You file extension must be in .pdf format";
//    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
//        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO pdf (name, size, path ) VALUES ('$filename', $size, '$path')";
            if (mysqli_query($connect, $sql) or die(mysqli_error($connect))) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}