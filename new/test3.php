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
        mysqli_query($con,$sql);
        unset($_SESSION['cart']);
        echo "Payment Successfull your order is being processed ";
        echo '<meta http-equiv="refresh" content="2;URL=order-history.php">';
        //unset($_SESSION['cart']);
     } else {
       echo 'Sorry failed Payment Error Please chack!';
       echo '<meta http-equiv="refresh" content="2;URL=checkout.php">';
     

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
<div class="col-lg-6 col-12">
    <form name="payment" method="post" action="test3.php">
                        <div class="your-order">
                             
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <input type="text" value="<?php echo $_SESSION['tp'] ?>" name="amt">
                                    <h2>Total Amount</h2>
                                        <ul>
                                            <li>Subtotal <span><?php echo $_SESSION['tp'] ?></span></li>
                                            <li>Total <span><?php echo $_SESSION['tp'] ?></span></li>
                                        </ul>
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <input type="radio" name="paymethod" value="COD" checked="checked"> COD
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <input type="radio" name="paymethod" value="M-pesa"> M-pesa
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <input type="radio" name="paymethod" value="Internet Banking"> Internet Banking
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-4">
                                                <input type="radio" name="paymethod" value="Debit / Credit card"> Debit / Credit card <br /><br />
         
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="submit" name="submit">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </form> 
                    </div>
 <?php } ?>
