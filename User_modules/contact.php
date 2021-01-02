<?php

include('../User_config/dbconfig.php');
include('../User_controller/contact.php');


// ! ADD data
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = md5($_POST['message']);

    $run = add_contact($name, $email, $number, $message);

    if(!empty($run))
    {
        echo "<script type='text/javascript'>alert('Thank You For Contacting Us. We Will Reach To You Soon.');</script>";
        header('Location: ../index.html');
    }else{
        echo "<script type='text/javascript'>alert('Opps! Something Went Wrong Try Again Later.');</script>";
        header('Location: ../index.html');
    }
}