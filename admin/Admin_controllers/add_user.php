<?php

error_reporting(0);

function Add_user($username, $email, $password, $c_password){
    include('../Admin_Config/dbconfig.php');
    $query = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    $run = mysqli_query($connection, $query);

    return($run);
}


?>