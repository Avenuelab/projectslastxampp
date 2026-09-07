<?php
session_start();
error_reporting(0);
include('includes/config.php');

// User Registration
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con, "INSERT INTO user(name,email,contactno,password) VALUES('$name','$email','$contactno','$password')");
    
    if ($query) {
        echo "<script>alert('You are successfully login');</script>";
    } else {
        echo "<script>alert('Not registered, something went wrong');</script>";
    }
}

// User Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $num = mysqli_fetch_array($query);
    
    if ($num > 0) {
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['name'];

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        mysqli_query($con, "INSERT INTO userlogs(userEmail,userip,status) VALUES('".$_SESSION['login']."','$uip','$status')");

        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/index.php");
        exit();
    } else {
        $email = $_POST['email'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "INSERT INTO userlogs(userEmail,userip,status) VALUES('$email','$uip','$status')");

        $_SESSION['errmsg'] = "Invalid email id or Password";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/login-register.php");
        exit();
    }
}
?>
<?php include_once "temp/header.php"; ?>
<script type="text/javascript">
    function valid() {
        if (document.register.password.value != document.register.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match!!");
            document.register.confirmpassword.focus();
            return false;
        }
        return true;
    }

    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include_once "temp/nav.php"; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Other</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Login & Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Login Register Area -->
        <div class="uren-login-register_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="justify-content-center">
                        <!-- Login Form s-->
                        <form method="post">
                            <span style="color:red;">
                                <?php echo htmlentities($_SESSION['errmsg']); ?>
                                <?php $_SESSION['errmsg'] = ""; ?>
                            </span>
                            <div class="login-form">
                                <h4 class="login-title" for="exampleInputEmail1">Login</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Email Address *</label>
                                        <input type="email" placeholder="Email Address" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label class="info-title" for="exampleInputPassword1">Password</label>
                                        <input type="password" placeholder="Password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="check-box">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <a href="register.php"> Don't have an Account? Register Here.</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <a href="forgot-password.php"> Forgotten passward?</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="uren-login_btn checkout-page-button" name="login">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Uren's Login Register Area  End Here -->
        <!-- Begin Uren's Footer Area -->
        <?php include_once "temp/footer.php"; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $(".changecolor").switchstylesheet({ separator: "color" });
            $('.show-theme-options').click(function() {
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
            $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>

</body>


</html>