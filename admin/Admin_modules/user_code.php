<?php

session_start();
include('../Admin_Config/dbconfig.php');
include('../Admin_Controllers/add_user.php');
include('../Admin_Controllers/edit_user.php');
include('../Admin_Controllers/delete_user.php');


// ! ADD data
if(isset($_POST['Add_user']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $c_password = md5($_POST['c_pass']);

    $run = add_user($username, $email, $password, $c_password);

    if($password === $c_password)
    {
        if(!empty($run))
        {
            session_start();
            $_SESSION = $run;
            header('Location: ../views/user.php');
        }else{
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: ../views/user.php');
        }
    }
    else
    {
        $_SESSION['status']= "Password and Confirm Password does not match";
        header('Location: user.php');
    }
}


// ! Update data

if(isset($_POST['update']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_pass'];

    $update_run = edit_user($id, $username, $email, $password);
    

    if($update_run)
    {
        session_start();
        $_SESSION = $update_run; 
        header('Location: ../views/user.php');
    }
    else
    {
        $_SESSION['status'] = "Data Updation Fail";
        header('Location: ../views/user.php');
    }
}


// ! Delete data

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $delete_run = delete_user($id);

    if($delete_run)
    {
        session_start();
        $_SESSION = $delete_run;
        header('Location: ../views/user.php');
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        header('Location: ../views/user.php');
    }
}



?>