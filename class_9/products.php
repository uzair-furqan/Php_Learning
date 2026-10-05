<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
        }
        .card
        {
            width: 20%;
            height: 300px;
            background:white;
            margin: 2%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
            border-radius:20px;
box-shadow:  10px 10px 20px #9e9e9e,
             -10px -10px 20px #ffffff;
        }
        .card-img
        {
            width: 90%;
            height: 35%;
            background:black;
            
            img{
                width: 100%;
                height: 100%;
            }
        }
        .card-details

        {
            width: 90%;
            height: 60%;
            display: flex;
            flex-direction:column;
            justify-content: center;
            gap: 10px;

            
        }
    </style>
</head>
<body>
    <?php 
    include("navbar.php");
    include("connection.php");

    $sql = "SELECT * FROM products";
    $data = mysqli_query($connection , $sql);

    while($row = mysqli_fetch_assoc($data))
        {?>
        <div class="card">
        <div class="card-img">
            <img src="<?php echo $row["product_image"]; ?>" alt="">
        </div>
        <div class="card-details">
        <h1><?php echo $row["name"] ?></h1>
        <h2><?php echo $row["category"] ?></h2>
        <h2><?php echo $row["price"] ?></h2>
        </div>
        </div>
<?php } ?>


    
</body>
</html>