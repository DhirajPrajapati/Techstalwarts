<?php
error_reporting(0);


function Login_Validate($login_email,$login_pass){
    include('../Admin_Config/dbconfig.php');
    $query = "SELECT * FROM `admin` WHERE `email`='$login_email' AND `password`='$login_pass'";
    $login_query = mysqli_query($connection, $query);

    $count=mysqli_num_rows($login_query);

	if ($count==1) {
	$admin_data=mysqli_fetch_assoc($login_query);
    $res = $admin_data;
    }
    return($res); 
}


?>