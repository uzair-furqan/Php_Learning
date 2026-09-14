<?php
include("connection.php");
session_start();

if(empty($_SESSION["user_id"]))
    {
        header("Location:login.php");
    }
    else
    {
        $sql = "SELECT * FROM `registration` WHERE `id` = {$_SESSION['user_id']}";
        $data = mysqli_query($connection , $sql);
        if($data -> num_rows > 0)
            {
                $row = mysqli_fetch_array($data);
            }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .profile_pic
        {
            width: 122px;
            height: 122px;
            border:1px solid grey;
            img{
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Profile :</h1>
    <div class="profile_pic">
    <img src="<?php echo $row[4]?>" alt="">
    </div>

    <h3>Name : <?php echo $row[1];  ?></h3>
    <h3>Email : <?php echo $row[2];  ?></h3>

    <a href="update_profile.php">Edit</a>
    <a href="delete_profile.php">Delete</a>
    <a href="logout.php">Logout</a>
</body>
</html>
