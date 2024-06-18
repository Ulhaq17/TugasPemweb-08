<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finansialku</title>
    <link rel="stylesheet" href="css/loginStyle.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>
    <div class="container">
        <h2>Login</h2>
            <form action="index.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <div class="button-container">
                    <input type="submit" name="login" value="Login">
                    <a href="register.php" class="register-btn">Register</a>
                </div>
            </form>
    </div>

    <script src="js/welcomeScript.js"></script>
</body>
</html>