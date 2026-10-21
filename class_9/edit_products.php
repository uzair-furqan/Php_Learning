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
    include("connection.php");

    if(isset($_GET['pd_id']))
        {
            $pd_id = $_GET["pd_id"];

            $sql = "SELECT * FROM `products` WHERE `product_id` = '$pd_id' LIMIT 1";
            $data = mysqli_query($connection , $sql);
            $row = mysqli_fetch_assoc($data);
            
            echo $row["name"];
        }
        else
            {
                header("location:products.php");
            }
    ?>
</body>
</html>
