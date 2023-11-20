<?php
session_start();
include('includes/config.php');

if($dbconfig)
{
    // echo "Database Connected";
}
else
{
    header("Location: includes/config.php");
}

if(!$_SESSION['login'])
{
    header('Location: index.php');
}


?>