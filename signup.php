<!DOCTYPE html>
<html>
    <link rel = "stylesheet" type = "text/CSS" href = "login-website-formatting.css">
    <head>
        <title>Signup</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php include 'header.inc'; ?>
        <h1>Signup</h1>
        <form  action = "proccess-signup.php" method="POST" novalidate>
            <div>
                <label for = "name">Name</label>
                <input type = "text" id = "name" name = "name">
            </div>
            <div>
                <label for = "email">Email</label>
                <input type = "email" id = "email" name = "email">
            </div>
            <div>
                <label for = "password">Password</label>
                <input type = "password" id = "password" name = "password">
            </div>
            <div>
                <label for = "password_confirmation">Password</label>
                <input type = "password" id = "password_confirmation" name = "password_confirmation">
            </div>
            <input type = "submit">
        </form>
        <?php include 'footer.inc'; ?>
    </body>
</html>