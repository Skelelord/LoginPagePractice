<?php
    session_start();
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
    </head>
    <link rel = "stylesheet" type = "text/CSS" href = "login-website-formatting.css">

    <body>
        <?php include 'header.inc'; ?>
        <h1>Home</h1>
        <?php
            if (isset($_SESSION["user_id"])) {?>
               <p>You are logged in.</p>
            <?php }
            else
                { ?>
                <p><a href = "login.php">log in</a> or <a href = "signup.php">Signup</a></p>
            <?php
            } ?>
        <?php include 'footer.inc'; ?>
    </body>
