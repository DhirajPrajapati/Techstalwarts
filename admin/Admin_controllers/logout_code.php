<?php

session_start();

if(isset($_POST['logout']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: ../views/login.php');
}
else
{
    echo "Something went wrong try again later";
}

?>