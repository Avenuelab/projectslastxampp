<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3adb7007d7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="e-mail" name="username" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password"  name="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register.php">Register</a></p>

            </div>
        </form>
    </div>
</body>
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>

</html>