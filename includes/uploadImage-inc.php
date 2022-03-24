<?php
session_start();

include_once './dbh-inc.php';



// Check if image file is a actual image or fake image
if (isset($_FILES['file']['name'])) {

    $target_dir = "../images/uploads/";
    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $target_file = $target_dir . "profile_" . $_SESSION['userid'] . ".png";
    $uploadOk = 1;
    $check = getimagesize($_FILES["file"]["tmp_name"]);

    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
    else {
        echo "File is NOT an image!.";
        $uploadOk = 0;
        exit();
    }


    // Check if file already exists
    /*if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
     }*/

    // Check file size
    if ($_FILES["file"]["size"] > 1000000) {
        echo "Size Too Large - More than 1MB";
        $uploadOk = 0;
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Wrong Fle Format!.";
        $uploadOk = 0;
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, Your file was not uploaded.";
        exit();
    }
    // if everything is ok, try to upload file
    else {
        //$filename = "profile_" . $_SESSION['userid'] . $imageFileType;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $temp_id = $_SESSION['userid'];
            $sql = "UPDATE users SET status = 1 WHERE id = $temp_id;";
            $result = mysqli_query($conn, $sql);
        //echo "file uploaded";
        }
        else {
            echo "Sorry, There was an error uploading your file.";
            exit();
        }
    }

}
else {
    echo "Something went wrong";
}
