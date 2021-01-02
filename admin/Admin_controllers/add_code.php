<?php

error_reporting(0);

function add_admiin($username, $email, $password, $c_password){
    include('../Admin_Config/dbconfig.php');
    $query = "INSERT INTO `admin` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    $run = mysqli_query($connection, $query);

    return($run);
}



?>