<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 
    if(!empty($_SESSION['user_name']))
        {
            echo "welcome ".$_SESSION['user_name'];
        }
        else
        {
            header("location:form.php");
        }
        // session_destroy();
 
 ?>
</body>
</html>