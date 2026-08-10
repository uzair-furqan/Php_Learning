<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>

<?php


$error_flag = "";
$username_error = "";
$userpassword_error = "";



if(isset($_POST['login_submit']))
{

    // if($_SERVER["REQUEST_METHOD"] == "POST")
    //     {
    //         echo "the method is post";
    //     }
    //     else
    //         {
    //             echo "the method is get";
    //         }


    $user_name = $_POST["user_name"];
    $user_pass = $_POST["user_password"];

    if(empty($user_name))
    {
        $error_flag = "yes";
        $username_error = "PLEASE ENTER THE USERNAME";
    }

    if(empty($user_pass))
    {
        $error_flag = "yes";
        $userpassword_error = "PLEASE ENTER THE PASSWORD";
    }

    if(empty($error_flag))
    {
        if($user_name == "ali" && $user_pass == "123")
            {
                $_SESSION['user_name'] = $user_name; 
                header("Location:profile.php");
            }
            else
            {
                echo "USERNAME OR PASS WORD IS INCORRECT";
            }
    }

}

?>

<h1>LOGIN</h1>

<form action="" method="post">

<label for="u">Username :</label>
<input type="text" id="u" name="user_name">
<?php
if(!empty($username_error))
    {
        echo "<p style = 'color:red'>$username_error</p>";
    }
?>

<br><br>


<label for="p">Password :</label>
<input type="password" name="user_password" id="p">
<?php
if(!empty($userpassword_error))
    {
        echo "<p style = 'color:red'>$userpassword_error</p>";
    }
?>


<br><br>

<input type="submit" value="Login" name="login_submit">

</form>

</body>
</html>