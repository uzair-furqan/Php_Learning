<?php

$connection = mysqli_connect("localhost" , "root" , "" , "aptech");

if(!$connection)
{
    die();
}
else
{
    echo "connection successful";
}




?>