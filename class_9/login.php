<?php
error_reporting(0);
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include("navbar.php"); ?>
    <h1>Login</h1>
    <?php
    
    $error_flag = "";
    $user_email_error = "";
    $user_pass_error = "";

    if(isset($_POST['login_submit']))
    {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(empty($user_email))
        {
            $error_flag = "yes";
            $user_email_error = "Please Enter Your Email";
        }
        if(empty($user_password))
        {
            $error_flag = "yes";
            $user_pass_error = "Please Enter Your Password";
        }


        if(empty($error_flag))
        {
            $sql = "SELECT * FROM `registration` where `email` = '$user_email' ORDER BY `id` LIMIT 1";
            $data = mysqli_query($connection,$sql);

            if($data->num_rows > 0)
            {
                $row = mysqli_fetch_assoc($data);
                if(password_verify($user_password , $row['password']))
                {
                    $user_id = $row['id'];
                    $user_role = $row['role'];
                    $_SESSION["user_role"] = $user_role;
                    $_SESSION["user_id"] = $user_id;
                    header("Location: profile.php");
                }
                else
                {
                    $user_pass_error = "EMAIL/PASSWORD IS INCORRECT";
                }
            }
            else
            {
                $user_email_error = "The email not registered";
            }
        }
    }

    
    
    ?>
    <form method="post" enctype="">
        
        <label for="email">EMAIL :</label>
        <input type="email" name="user_email" id="email">
        <?php if(!empty($user_email_error)){ echo "<p style='color:red'>$user_email_error</p>"; } ?>

        <br>
        <label for="pass">PASSWORD :</label>
        <input type="password" name="user_password" id="pass">
        <?php if(!empty($user_pass_error)){ echo "<p style='color:red'>$user_pass_error</p>"; } ?>
        

        <br>
        <input type="submit" name="login_submit" value="REGISTER">
        <a href="index.php">Register</a>
    </form>


    </script>
</body>
</html>