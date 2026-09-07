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
        <form action="add.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="name" name="name" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="e-mail" name="username" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password"  name="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <!--<div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>---->

            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>i have already account<a href="index.php">Login</a></p>

            </div>
        </form>
    </div>
</body>

</html>