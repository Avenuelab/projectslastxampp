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
    $shippingadd=$_POST['shippingAddress'];
    $shippingst=$_POST['shippingState'];
    $shippingcity=$_POST['shippingCity'];
    $shippingpin=$_POST['shippingPincode'];
    
    echo $query = mysqli_query($con, "INSERT INTO user(name,email,contactno,password,shippingAddress,shippingState, shippingCity, shippingPincode ) VALUES('$name','$email','$contactno','$password','$shippingadd', '$shippingst','$shippingcity', '$shippingpin')");
    
    if ($query) {
        echo "<script>alert('You are successfully registered');</script>";
        echo '<meta http-equiv="refresh" content="2;URL=login-register.php">';
    } else {
        echo "<script>alert('Not registered, something went wrong');</script>";
        echo '<meta http-equiv="refresh" content="2;URL=register.php">';
        
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
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login & Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="justify-content-center">
                        <form role="form" method="post" name="register" onSubmit="return valid();">
                            <div class="login-form">
                                <h4 class="login-title">Register</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="fullname">full name</label>
                                        <input type="text" placeholder="First Name" id="fullname" name="fullname" required="required">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" onBlur="userAvailability()" name="emailid" required>
                                        <span id="user-availability-status1" style="font-size:12px;"></span>
                                    </div>
                                    <div class="col-md-6">
                                <label class="info-title" for="contactno">Contact No. <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" placeholder="07123456789" required>
                                </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" id="password" name="password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" for="confirmpassword" required>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <div class="">
                                            <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                                            <textarea class="form-control unicase-form-control text-input" name="shippingAddress" placeholder="Enter Country Code ie:00100" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="info-title" for="Shipping State">Shipping State<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingState" placeholder="Enter Area/village ie:umoja 1"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="info-title" for="Shipping City">Shipping City<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingCity"  placeholder="Enter City"required="required" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <div class="">
                                            <label class="info-title" for="Shipping Pincode">Shipping Pincode<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingPincode" placeholder="Enter Area/village ie:umoja 1" required="required" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" class="uren-register_btn" id="submit">Register</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <a href="login-register.php"> Already have an account? Login here.</a>
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