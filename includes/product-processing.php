<?php 
include_once "acesscontrol.php";
     /* 
    Image upload code take and modified from: https://www.w3schools.com/PHP/php_file_upload.asp
    Date: December 6, 2021
    */
    if(isset($_FILES["p-image"])){
        $target_dir = "../images/";
        $ext = "." . explode(".", $_FILES["p-image"]["name"])[1];
        $target_file = $target_dir . $_POST['p-name'] . $ext;    
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["p-image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["p-image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["p-image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // prepare data for DB storage
    $pName = sanitizeData($_POST['p-name']);
    $pPrice = floatval(sanitizeData($_POST['p-price']));
    $pImagePath = "images/" . $pName . ".jpg";
    $pCategory = sanitizeData($_POST['p-category']);
    $pAccountId = intval(sanitizeData($_POST['p-accountId']));
    $pDescription = sanitizeData($_POST['p-description']);
?>