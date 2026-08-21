<?php
include("connection.php");
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
        elseif(strlen($user_password) <= 7 )
        {
            $error_flag = "yes";
            $user_pass_error = "Password must be greater than 8 character";
        }
        elseif(!preg_match('/[A-Z]/', $user_password))
        {       
            $error_flag = "yes";
            $user_pass_error = "Password must contain one capital letter";
        }
        elseif(!preg_match('/[0-9]/', $user_password))
        {       
            $error_flag = "yes";
            $user_pass_error = "Password must contain one number";
        }
        elseif(!preg_match('/[!@#$%^&*]/', $user_password))
        {       
            $error_flag = "yes";
            $user_pass_error = "Password must contain one special character";
        }

        if(empty($confirm_password))
        {
            $error_flag = "yes";
            $user_cpass_error = "Please Enter Your Confirm Password";
        }

        if(empty($error_flag))
        {
             if($user_password == $confirm_password)
            {
                $hash_password = password_hash($user_password , PASSWORD_DEFAULT);
                $sql = "INSERT INTO `registration` (`name` , `email`,`password`) VALUES ('$user_name' , '$user_email' , '$hash_password')";
                $result = mysqli_query($connection,$sql); // in create insert and delelte it returns 0 or 1 else returns result object
                if($result)
                    {
                        header("location:login.php");
                    }
                }

                else
                    {
                        $user_cpass_error = "Please Enter The Same Password";
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
        <input type="checkbox" name="" id="checkbox" onclick="toogle()">Show Password

        <br>
        <label for="cpass">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="cpass">
        <?php if(!empty($user_cpass_error)){ echo "<p style='color:red'>$user_cpass_error</p>"; } ?>

        <br>
        <input type="submit" name="registration_submit" value="REGISTER">
    </form>

    <script>
        function toogle()
        {
        let pass = document.getElementById("pass");
        let check = document.getElementById("checkbox");

        if (pass.type == "password") {
           pass.type == "text"
        }
        }

    </script>
</body>
</html>