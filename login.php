<?php
$isInvalid = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mysqli = require __DIR__ . "/database.php";
        $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user)
        {
            if (password_verify($_POST["password"], $user["password_hash"]))
            {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                echo "<h1>working2</h1>";
                header("Location: index.php");
                exit();
            }
        }
        //hhhhhhh8
        $isInvalid = true;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
    </head>
    <link rel = "stylesheet" type = "text/CSS" href = "login-website-formatting.css">

    <body>
        <?php include 'header.inc'; ?>

       <h1>Login</h1>
        <form method = "POST" action = "login.php">
            <label for = "email">email</label>
            <input type = "email" name = "email" id = "email"
                value = "email">

            <label for = "password">Password</label>
            <input type = "password" name = "password" id = "password">
            
            <button>Login in </button>
        </form>
        <?php include 'footer.inc'; ?>
    </body>