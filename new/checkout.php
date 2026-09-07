<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login-register.php');
}
else{
    if (isset($_POST['submit'])) {
        $paymtd=mysqli_real_escape_string($con, $_POST['paymethod']);
        $orderst='Paid';
        $userid=$_SESSION['id'];
        $sql="UPDATE orders SET paymentMethod='$paymtd',orderStatus='$orderst' WHERE userId='$userid' AND paymentMethod is null" ;
        $querry=mysqli_query($con,$sql);
    if ($querry) { 
        echo "Payment Successfull your order is being processed ";
        echo '<meta http-equiv="refresh" content="2;URL=mail.php">';

        //unset($_SESSION['cart']);

     } else {
       echo 'Sorry failed Payment Error Please chack!';
       echo '<meta http-equiv="refresh" content="2;URL=checkout.php">';
     }

    }
?>
<?php include_once "temp/header.php"; ?>

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
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Checkout Area -->
        <div class="checkout-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12" style="z-index: 100;">
                            <?php
                            $query=mysqli_query($con,"select * from user where id='".$_SESSION['id']."'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                        <form class="register-form" role="form" method="post">
                            <div class="checkbox-form">
                                <h3>Shipping Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                                            <textarea class="form-control unicase-form-control text-input" name="shippingaddress" required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Shipping State">Shipping State<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Shipping City">Shipping City<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Shipping Pincode">Shipping Pincode<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="checkout-form-list">
                                           <button type="submit" name="update" class="uren-login_btn">Update</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                    <?php include('payment-method.php');?>
                </div>
            </div>
        </div>
        <!-- Uren's Checkout Area End Here -->
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

   <script>
        $(document).ready(function(){ 
            $(".changecolor").switchstylesheet( { seperator:"color"} );
            $('.show-theme-options').click(function(){
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
           $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


</html>
<?php } ?>