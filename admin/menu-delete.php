<?php
require("../db_config.php");

$id = $_POST['id'];

$sql = "DELETE FROM menu_dish WHERE id=".$id;
$query = mysqli_query($connection,$sql);

if($query){
    echo 'Row deleted';
}
else {
    echo 'Delete failed';
}