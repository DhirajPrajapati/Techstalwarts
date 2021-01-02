<?php

session_start();
include('dbconfig.php');

if(!$_SESSION['name'])
{
    header('Location: login.php');
}

?>