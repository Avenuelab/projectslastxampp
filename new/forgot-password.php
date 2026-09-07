<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND contactno='$contact'");
    $num = mysqli_fetch_array($query);

    if ($num > 0) {
        $extra = "forgot-password.php";
        mysqli_query($con, "UPDATE users SET password='$password' WHERE email='$email' AND contactno='$contact'");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Password Changed Successfully";
        exit();
    } else {
        $extra = "forgot-password.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Invalid email id or Contact no";
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
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
 <div class="uren-login-register_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12">
                    <form class="register-form outer-top-xs" name="register" method="post" onsubmit="return valid();">
                        <span style="color:red;">
                            <?php
                            echo htmlentities($_SESSION['errmsg']);
                            $_SESSION['errmsg'] = ""; // Clear the message
                            ?>
                        </span>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Contact no <span>*</span></label>
                            <input type="text" name="contact" class="form-control unicase-form-control text-input" id="contact" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="confirmpassword">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required>
                        </div>
                        <button type="submit" class="uren-login_btn checkout-page-button" name="change">Change</button>
                    </form>					
                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sign-in-page -->
        
    </div><!-- /.container -->
</div><!-- /.body-content -->
</div>

<?php include('temp/footer.php'); ?>

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