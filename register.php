<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="scss\_login_register.scss" rel="stylesheet">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img\user.png" id="icon" height="140px" width="100px" alt="User Icon" />
            </div>

            <!-- Registration Form -->
            <form action="register_process.php" method="POST" autocomplete="off">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
                <input type="password" id="password" class="fadeIn fourth" name="password" placeholder="Password" required>
                <input type="password" id="confirm_password" class="fadeIn fifth" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" class="fadeIn sixth" value="Register">
            </form>

            <!-- Back to Login -->
            <div id="formFooter">
                <a class="underlineHover" href="login.php">Back to Login</a>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>