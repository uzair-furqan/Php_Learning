<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
    <?php
    $sql = "SELECT * FROM `registration` WHERE `id` = {$_SESSION['user_id']}";
        $data = mysqli_query($connection , $sql);
        if($data -> num_rows > 0)
            {
                $row = mysqli_fetch_array($data);
            }
    
    $error_flag = "";
    $user_name_error = "";
    $user_email_error = "";
    $user_img_error = "";

    if(isset($_POST['update_submit']))
    {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_img = $_FILES["user_img"];
        $user_img_name = $_FILES["user_img"]["name"];
        $user_img_tmp_name = $_FILES["user_img"]["tmp_name"];
        move_uploaded_file($user_img_tmp_name , "user_images/".$user_img_name);
        $image_path = "user_images/".$user_img_name;


        if(empty($user_name))
        {
            $error_flag = "yes";
            $user_name_error = "Please Enter Your UserName";
        }
        if(empty($user_email))
        {
            $error_flag = "yes";
            $user_email_error = "Please Enter Your Email";
        }
        if(empty($user_img))
        {
            $error_flag = "yes";
            $user_img_error = "Please Enter Your Image";
        }
        else
        {
            $check_email = "SELECT `email` from `registration` where `email` = '$user_email' AND `id` != {$_SESSION['user_id']} ";
            $check_data = mysqli_query($connection , $check_email);
            if($check_data->num_rows > 0)
            {
                $error_flag = "yes";
                $user_email_error = "This Email is already Registered";
            }
        }
       
        if(empty($error_flag))
        {

                $sql = "UPDATE `registration` set `name` = '$user_name' , `email` = '$user_email' , `user_img` = '$image_path' where `id` = {$_SESSION['user_id']}";
                $result = mysqli_query($connection,$sql); 
                if($result)
                    {
                        header("location:profile.php");
                    }


        }
    }

    
    
    ?>
    <h1>Edit Profile</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="profile_pic">
     <img src="<?php echo $row[4]?>" alt="">
    </div>
        <label for="name">NAME :</label>
        <input type="text" name="user_name" id="name" value="<?php echo $row[1];?>">
        <?php if(!empty($user_name_error)){ echo "<p style='color:red'>$user_name_error</p>"; } ?>
        <br>
        <label for="email">EMAIL :</label>
        <input type="email" name="user_email" id="email" value="<?php echo $row[2];?>">
        <?php if(!empty($user_email_error)){ echo "<p style='color:red'>$user_email_error</p>"; } ?>
        <br>
        <input type="file" name="user_img">
        <br>
        <input type="submit" name="update_submit" value="REGISTER">
        <a href="profile.php">Goto Profile</a>
    </form>


</body>
</html>