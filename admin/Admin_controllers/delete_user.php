<?php

error_reporting(0);

function delete_user($id){
    include('../Admin_Config/dbconfig.php');
    
    $delete_query = "DELETE FROM `user` WHERE `id`='$id'";
    $delete_run = mysqli_query($connection, $delete_query);
    return($delete_run);
}


?>