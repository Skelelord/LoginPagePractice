<?php
    if (empty($_POST["name"]))
    {
        die("Name is required");
    }
    if (!filter_Var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        die("Valid email is required");
    }
    if (strlen($_POST["password"]) < 8)
    {
        die("Password  must be at least 8 characters");
    }
    if (!preg_match("/[a-z]/i", $_POST["password"]))
    {
        die("Password must contain at least one letter");
    }
    if (!preg_match("/[0-9]/" , $_POST["password"]))
    {
        die("Password must contain at least one number");
    }
    if ($_POST["password"] !== $_POST["password_confirmation"])
    {
        die("Passwords must match");
    }
    $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $mysqli = require __DIR__ . "/database.php";
    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
    $stmt = $mysqli -> stmt_init();

    if ($stmt->prepare($sql) == False)
    {
        die("SQL error: " . $mysqli->error);
    }
    $stmt -> bind_param("sss", $_POST["name"], $_POST["email"], $passwordHash);
    if ($stmt -> execute())
    {
        header("Location: signup-success.php");
        exit;
    }
    else {
        if ($mysqli->errorno === 1062)
        {
            die("email already taken");
        }
        else {
            
            die($mysqli->error . " " . $mysqli->errorno);
        }
    }
    var_dump($passwordHash);
?>