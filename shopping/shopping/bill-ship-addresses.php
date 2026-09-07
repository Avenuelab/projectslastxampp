<?php
session_start();
// error_reporting(0);
include('includes/config.php');

// Redirect if user is not logged in
if (strlen($_SESSION['login']) == 0) {   
    header('location:index.php');
} else {
    // Code for billing address update
    if (isset($_POST['update'])) {
        $baddress = $_POST['billingaddress'];
        $bstate = $_POST['bilingstate'];
        $bcity = $_POST['billingcity'];
        $bpincode = $_POST['billingpincode'];
        
        $query = mysqli_query($con, "UPDATE users SET billingAddress='$baddress', billingState='$bstate', billingCity='$bcity', billingPincode='$bpincode' WHERE id='" . $_SESSION['id'] . "'");
        
        if ($query) {
            echo "<script>alert('Billing Address has been updated');</script>";
        }
    }

    // Code for shipping address update
    if (isset($_POST['shipupdate'])) {
        $saddress = $_POST['shippingaddress'];
        $sstate = $_POST['shippingstate'];
        $scity = $_POST['shippingcity'];
        $spincode = $_POST['shippingpincode'];
        
        $query = mysqli_query($con, "UPDATE users SET shippingAddress='$saddress', shippingState='$sstate', shippingCity='$scity', shippingPincode='$spincode' WHERE id='" . $_SESSION['id'] . "'");
        
        if ($query) {
            echo "<script>alert('Shipping Address has been updated');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>My Account</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/config.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
</head>
<body class="cnt-home">
<header class="header-style-1">
    <!-- Top Menu -->
    <?php include('includes/top-header.php'); ?>
    <?php include('includes/main-header.php'); ?>
    <?php include('includes/menu-bar.php'); ?>
</header>

<!-- Breadcrumb -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="body-content outer-top-bd">
    <div class="container">
        <div class="checkout-box inner-bottom-sm">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        

                        <!-- Checkout Step 2: Shipping Address -->
                        <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                        <span>2</span>Shipping Address
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <form class="register-form" role="form" method="post">
                                        <div class="form-group">
                                            <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                                            <textarea class="form-control unicase-form-control text-input" name="shippingaddress" required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Shipping State">Shipping State<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Shipping City">Shipping City<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Shipping Pincode">Shipping Pincode<span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode']; ?>">
                                        </div>
                                        <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.checkout-steps -->
                </div>
                <!-- Sidebar -->
                <?php include('includes/myaccount-sidebar.php'); ?>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <?php include('includes/brands-slider.php'); ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- For demo purposes – can be removed in production -->
<script src="switchstylesheet/switchstylesheet.js"></script>

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
<?php } ?>