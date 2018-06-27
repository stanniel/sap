<?php
require("../db_config.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

$sql = "DELETE FROM reservation WHERE id=".$id;
$query = mysqli_query($connection,$sql);

if($query){
    echo 'Delete successful';
}
else {
    echo 'Delete failed';
}