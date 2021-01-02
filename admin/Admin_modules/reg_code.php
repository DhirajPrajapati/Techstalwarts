<?php

session_start();
include('../Admin_Config/dbconfig.php');
include('../Admin_controllers/login_code.php');
include('../Admin_Controllers/add_code.php');
include('../Admin_Controllers/edit_code.php');
include('../Admin_Controllers/delete_code.php');

// ! Login

if(isset($_POST['btn_login']))
{
    $login_email = $_POST['email'];
    $login_pass = md5($_POST['password']);

    $res = Login_Validate($login_email,$login_pass);

    if(!empty($res))
    {
        session_start();
        $_SESSION = $res;
        header('Location: ../views/index.php');
    }
    else
    {
        $_SESSION['status'] = 'Email ID / Password Is Invalid';
        header('Location: ../views/login.php'); 
    }
}





// ! ADD data
if(isset($_POST['adm_registration']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $c_password = md5($_POST['c_pass']);

    $run = add_admiin($username, $email, $password, $c_password);

    if($password === $c_password)
    {
        if(!empty($run))
        {
            session_start();
            $_SESSION = $run;
            header('Location: ../views/register.php');
        }else{
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: ../views/register.php');
        }
    }
    else
    {
        $_SESSION['status']= "Password and Confirm Password does not match";
        header('Location: register.php');
    }
}


// ! Update data

if(isset($_POST['update']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_pass'];

    $update_run = edit_code($id, $username, $email, $password);
    

    if($update_run)
    {
        session_start();
        $_SESSION = $update_run; 
        header('Location: ../views/register.php');
    }
    else
    {
        $_SESSION['status'] = "Data Updation Fail";
        header('Location: ../views/register.php');
    }
}


// ! Delete data

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $delete_run = delete_code($id);

    if($delete_run)
    {
        session_start();
        $_SESSION = $delete_run;
        header('Location: ../views/register.php');
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        header('Location: ../views/register.php');
    }
}



?>