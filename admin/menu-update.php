<?php
require("../db_config.php");
/*
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/

$uploadOk=0;
$name = mysqli_real_escape_string($connection,$_POST['name']);
$description = mysqli_real_escape_string($connection,$_POST['description']);
//$image = $target_file;
$id = $_POST["update-id"];
if ($uploadOk){
    $sql = 'UPDATE menu_dish SET name="'.$name.'", description="'.$description.'"'.'image="'.$target_file.'" WHERE id='.$id;
}
else {
    $sql = 'UPDATE menu_dish SET name="'.$name.'", description="'.$description.'" WHERE id='.$id;
}
$query = mysqli_query($connection,$sql);
if($query){
    echo 'Successful update';
}
else {
    echo 'Update didnt work';
}
