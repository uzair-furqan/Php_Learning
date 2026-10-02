<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("navbar.php");
    if(empty($_SESSION["user_role"]))
        {
            header("Location:profile.php");
        }
    ?>

    <a href="add_products.php">Add Products</a>
</body>
</html>