<?php
session_start();


if(isset($_SESSION["user_name"]))
{
    echo "<h1> WELCOME </h1> ".$_SESSION['user_name'];
    echo $_SESSION['user_email'];
}

?>
