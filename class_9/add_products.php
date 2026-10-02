<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>
<body>
    <?php

    include("navbar.php");
    include("connection.php");
    if(empty($_SESSION["user_role"]))
    {
        header("Location:profile.php");
    }
    
    
    $error_flag = "";
    $product_name_error = "";
    $product_category_error = "";
    $product_price_error = "";
    $product_img_error = "";
    $success = "";

    if(isset($_POST['product_submit']))
    {
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_img = $_FILES["product_img"];
        $product_img_name = $_FILES["product_img"]["name"];
        $product_img_tmp_name = $_FILES["product_img"]["tmp_name"];
        $product_img_type = $_FILES["product_img"]["type"];
        $product_img_size = $_FILES["product_img"]["size"];

        if(empty($product_name))
        {
            $error_flag = "yes";
            $product_name_error = "Please Enter Your Product Name";
        }
        if(empty($product_category))
        {
            $error_flag = "yes";
            $product_category_error = "Please Enter Your Product Category";
        }

        if(empty($product_price))
        {
            $error_flag = "yes";
            $product_price_error = "Please Enter Your Product Price";
        }
         if(empty($product_img_name))
        {
            
            $error_flag = "yes";
            $product_img_error = "Please Upload the Image";
        }
        else
        {
            if($product_img_type == "image/jpeg" || $product_img_type == "image/jpg" || $product_img_type == "image/png" || $product_img_type == "image/jfif" || $product_img_type == "image/avif")
                {
                    if($product_img_size > 1024 * 1024 )
                        {
                            $error_flag = "Yes";
                            $product_img_error = "Image Must be smaller than 1 MB";
                        }
                        else
                            {
                                move_uploaded_file($product_img_tmp_name , "product_images/".$product_img_name);
                                $image_path = "user_images/".$product_img_name;
                            }
                   
                }
                else
                {
                    $error_flag = "yes";
                    $product_img_error = "The Image Must Be .JPG , .PNG";
                }


        }
        

        if(empty($error_flag))
        {
            $sql = "INSERT INTO `products` (`name`,`category`,`price` , `product_image`) VALUES ('$product_name','$product_category','$product_price' , '$image_path')";
            $result = mysqli_query($connection , $sql);
            if($result)
                {
                    $success = "The Product is added successfully";
                }

        }
    }

    if(!empty($success))
        {
            echo "<div style='width:98vw; height:4vh; border-radius: 20px; background:green; margin:1%;'>
            <h3 style = 'color: white; margin-left:20px; '>$success</h3></div>"    ;        
        }
    
    ?>

    <h1 style="margin: 30px;">ADD PRODUCTS</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="name">PRODUCT NAME :</label>
        <input type="text" name="product_name" id="name">
        <?php if(!empty($product_name_error)){ echo "<p style='color:red'>$product_name_error</p>"; } ?>
        <br>
        <label for="email">PRODUCT CATEGORY : </label>
        <select name="product_category" id="">
            <option value="">SELECT</option>
            <option value="electronic">ELECTRONICS</option>
            <option value="furniture">FURNITURE</option>
            <option value="game">GAMES</option>
        </select>
        <?php if(!empty($product_category_error)){ echo "<p style='color:red'>$product_category_error</p>"; } ?>

        <br>
        <label for="pass">PRODUCT PRICE : </label>
        <input type="text" name="product_price" id="password">
        <?php if(!empty($product_price_error)){ echo "<p style='color:red'>$product_price_error</p>"; } ?>
        <br>
        <label for="">PRODUCT IMAGE : </label>
        <input type="file" name="product_img">
        <?php if(!empty($product_img_error)){ echo "<p style='color:red'>$product_img_error</p>"; } ?>
        <br>
        <input type="submit" name="product_submit" value="Add Product">
       
    </form>


</body>
</html>