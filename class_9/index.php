<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
    
    $error_flag = "";
    $user_name_error = "";
    $user_email_error = "";
    $user_pass_error = "";
    $user_cpass_error = "";

    if(isset($_POST['registration_submit']))
    {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $confirm_password = $_POST['confirm_password'];

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
        if(empty($user_password))
        {
            $error_flag = "yes";
            $user_pass_error = "Please Enter Your Password";
        }
        if(empty($confirm_password))
        {
            $error_flag = "yes";
            $user_cpass_error = "Please Enter Your Confirm Password";
        }

        if(empty($error_flag))
        {
            if($user_name == "uzair" && $user_password == "123")
            {
                if($user_password == $confirm_password)
                {
                    $_SESSION["user_name"] = $user_name;
                    $_SESSION["user_email"] = $user_email;
                    header("Location:profile.php");
                }
                else
                    {
                        $user_cpass_error = "Please Enter The Same Password";
                    }
            }
        }
    }

    
    
    ?>
    <form method="post">
        <label for="name">NAME :</label>
        <input type="text" name="user_name" id="name">
        <?php if(!empty($user_name_error)){ echo "<p style='color:red'>$user_name_error</p>"; } ?>
        <br>
        <label for="email">EMAIL :</label>
        <input type="email" name="user_email" id="email">
        <?php if(!empty($user_email_error)){ echo "<p style='color:red'>$user_email_error</p>"; } ?>

        <br>
        <label for="pass">PASSWORD :</label>
        <input type="password" name="user_password" id="pass">
        <?php if(!empty($user_pass_error)){ echo "<p style='color:red'>$user_pass_error</p>"; } ?>

        <br>
        <label for="cpass">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="cpass">
        <?php if(!empty($user_cpass_error)){ echo "<p style='color:red'>$user_cpass_error</p>"; } ?>

        <br>
        <input type="submit" name="registration_submit" value="REGISTER">
    </form>
</body>
</html>