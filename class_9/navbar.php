<?php

session_start();
?>
<style>
    *
    {
        margin: 0;
        padding: 0;
    }
    nav{
        width: 100%;
        height: 10vh;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logo
    {
        color:white;
        width: 30%;
        height: 100%;
         display: flex;
        justify-content: center;
        align-items: center;

    }
        .buttons
    {
        color:white;
        width: 30%;
        height: 100%;
         display: flex;
        justify-content: center;
        align-items: center;

    }
    .buttons a{
        padding: 12px 15px;
        background-color:transparent;
        border:2px solid white;
        color:white;
        text-decoration:none;
        border-radius:12px;

    }
    .links
    {
        width: 40%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap:20px;
    }
    .links a{
        color:white;
        text-decoration:none;
    }
</style>


<nav>
    <div class="logo"><h1>LOGO</h1></div>
    <div class="links">
        <a href="">Home</a>
        <a href="">About</a>
        <a href="">Contact</a>
        <a href="products.php">Products</a>
        <a href="profile.php">profile</a>
        <?php
            if(!empty($_SESSION["user_role"]))
                {?>
                <a href="admin_panel.php">ADMIN PANEL</a>
               <?php }
        ?>
        
    </div>
    <div class="buttons">
        <?php
        if(empty($_SESSION["user_id"]))
            { ?>
                <a href="login.php">LOGIN</a>
           <?php }

           else
            { ?>
                <a href="logout.php">LOGOUT</a>
          <?php  }
        ?>
    </div>
</nav>

<script>
    
</script>