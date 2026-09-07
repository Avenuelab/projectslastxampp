<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
    // code for billing address updation
    if(isset($_POST['update']))
    {
        $baddress=$_POST['billingaddress'];
        $bstate=$_POST['bilingstate'];
        $bcity=$_POST['billingcity'];
        $bpincode=$_POST['billingpincode'];
        $query=mysqli_query($con,"update user set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
        if($query)
        {
echo "<script>alert('Billing Address has been updated');</script>";
        }
    }


// code for Shipping address updation
    if(isset($_POST['shipupdate']))
    {
        $saddress=$_POST['shippingaddress'];
        $sstate=$_POST['shippingstate'];
        $scity=$_POST['shippingcity'];
        $spincode=$_POST['shippingpincode'];
        $query=mysqli_query($con,"update user set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
        if($query)
        {
echo "<script>alert('Shipping Address has been updated');</script>";
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
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
                                            <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Billing City">Billing City <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
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