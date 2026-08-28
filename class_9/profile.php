<?php
session_start();

if(empty($_SESSION["user_name"]))
    {
        header("Location:login.php");
    }

if(isset($_SESSION["user_name"]))
{
    echo "<h1> WELCOME </h1> ".$_SESSION['user_name'];
}

?>

<a href="logout.php">Logout</a>
