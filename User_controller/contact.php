<?php

error_reporting(0);

function add_contact($name, $email, $number, $message){
    include('../User_config/dbconfig.php');
    $query = "INSERT INTO `contact` (`name`, `email`, `number`, `message`) VALUES ('$name', '$email', '$number', '$message')";
    $run = mysqli_query($connection, $query);

    return($run);
}



?>