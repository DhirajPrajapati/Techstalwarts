<?php

error_reporting(0);

function edit_user($id, $username, $email, $password){
    include('../Admin_Config/dbconfig.php');
    $update_query = "UPDATE `user` SET `username`='$username' ,`email`='$email' ,`password`='$password' WHERE `id`='$id' ";
    $update_run = mysqli_query($connection, $update_query);
    return($update_run);
}

?>