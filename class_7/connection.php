<?php

// $con = mysqli_connect("localhost" , "root" , "" , "aptech");

$host_name = "localhost";
$host_username = "root";
$host_password = "";
$database_name = "aptech";

$con = mysqli_connect($host_name , $host_username , $host_password ,$database_name);

if(!$con)
{
    die();
}
else{
    echo "connection successful";
}


?>