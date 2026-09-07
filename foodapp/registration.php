<!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
error_reporting(0); 
include("connection/connect.php"); 

if(isset($_POST['submit'])) {
    if(empty($_POST['firstname']) || 
       empty($_POST['lastname']) || 
       empty($_POST['email']) ||  
       empty($_POST['phone']) ||
       empty($_POST['password']) ||
       empty($_POST['cpassword'])) {
        $message = "All fields must be Required!";
    } else {
        $check_username = mysqli_query($db, "SELECT username FROM users WHERE username = '".$_POST['username']."' ");
        $check_email = mysqli_query($db, "SELECT email FROM users WHERE email = '".$_POST['email']."' ");
        
        if($_POST['password'] != $_POST['cpassword']) {  
            echo "<script>alert('Password does not match');</script>"; 
        } elseif(strlen($_POST['password']) < 6) {
            echo "<script>alert('Password must be at least 6 characters');</script>"; 
        } elseif(strlen($_POST['phone']) < 10) {
            echo "<script>alert('Invalid phone number!');</script>"; 
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address!');</script>"; 
        } elseif(mysqli_num_rows($check_username) > 0) {
            echo "<script>alert('Username already exists!');</script>"; 
        } elseif(mysqli_num_rows($check_email) > 0) {
            echo "<script>alert('Email already exists!');</script>"; 
        } else {
            $mql = "INSERT INTO users(username, f_name, l_name, email, phone, password, address) VALUES('".$_POST['username']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['phone']."', '".md5($_POST['password'])."', '".$_POST['address']."')";
            mysqli_query($db, $mql);
            header("refresh:0.1;url=login.php");
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="#">
    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div style="background-image: url('images/img/pimg.jpg');">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"><img class="img-rounded" src="images/logo.png" alt="" width="18%"></a>
                    <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a class="nav-link active" href="restaurants.php">Restaurants</a></li>
                            <?php
                            if(empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>';
                                echo '<li class="nav-item"><a href="registration.php" class="nav-link active">Register</a></li>';
                            } else {
                                echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a></li>';
                                echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="page-wrapper">
            <div class="container">
                <section class="contact-page inner-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label for="username">User-Name</label>
                                                    <input class="form-control" type="text" name="username" id="username" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="firstname">First Name</label>
                                                    <input class="form-control" type="text" name="firstname" id="firstname" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="lastname">Last Name</label>
                                                    <input class="form-control" type="text" name="lastname" id="lastname" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="phone">Phone Number</label>
                                                    <input class="form-control" type="text" name="phone" id="phone" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="address">Delivery Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Register" name="submit" class="btn theme-btn"> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php include "include/footer.php"; ?>
            </div>

            <script src="js/jquery.min.js"></script>
            <script src="js/tether.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/animsition.min.js"></script>
            <script src="js/bootstrap-slider.min.js"></script>
            <script src="js/jquery.isotope.min.js"></script>
            <script src="js/headroom.js"></script>
            <script src="js/foodpicky.min.js"></script>
        </div>
    </div>
</body>
</html>