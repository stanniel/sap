<?php
require("../db_config.php");

$name = trim(mysqli_real_escape_string($connection,$_POST['name']));
$date = trim(mysqli_real_escape_string($connection,$_POST['date']));
$table = $_POST['table'];
$time = $_POST['time'];
$phone = trim(mysqli_real_escape_string($connection,$_POST['contact_phone']));
$email = trim(mysqli_real_escape_string($connection,$_POST['contact_email']));

if($name != "" and $date != "" and $table != "" and $time != "" and $phone != "" and $email != "") {
    $sql = 'SELECT table_id,time_slot_id,date FROM reservation WHERE table_id=' . $table . ' AND time_slot_id=' . $time . ' AND date=' . $date;
    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {
        echo 'Reservation already exists';
    } else {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "INSERT INTO reservation VALUES (NULL, '" . $name . "','" . $table . "','" . $time . "',' " . $date . "',' " . $phone . "',' " . $email . "')";
            $query = mysqli_query($connection, $sql) or die($connection);

            if($query){
                echo 'New reservation added!';
            }
            else {
                echo 'Insert failed';
            }

        }
    }
}





