<?php
    session_start();
?>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div class="container">
        <form class = "loginform" method = "POST" action = "connectlogin.php">
            <h5 class = "login">Login</h5>
            <br>
            <input type = "text" class="form-control" name = "username" placeholder = "Username" required>
            <br>
            <input type = "password" class="form-control" name = "password" placeholder="Password" required>
            <br><br>
            <br><br>
            <input class="form-end" id="submit" type="submit" value="Continue"><br>
            <?php
                    if(isset($_SESSION["error"])){
                        echo '<script>alert("Incorrect email/password")</script>';
                    }
                ?>
        </form>
    </div>
    <div class="info">
            <img src="login_logo.png" class="logopic">
        </div>
    <div class = yb></div>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>