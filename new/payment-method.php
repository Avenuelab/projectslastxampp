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

        $querry=mysqli_query($con,"update orders set    paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
        
        if ($querry) {
        echo "Payment Successfull your order is being processed ";
        echo '<meta http-equiv="refresh" content="2;URL=cart.php">';
        //unset($_SESSION['cart']);
     } else {
       echo 'Sorry failed Payment Error Please chack!';
       echo '<meta http-equiv="refresh" content="2;URL=checkout.php">';
     }

    }

    }
?>
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
                                            <p>Other Payment methods will be available soon!!</p>
                                        </div>
                                        <!--<div class="card">
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
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion" >
                                                <div class="card-body">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-4">
                                                <input type="radio" name="paymethod" value="Debit / Credit card"> Debit / Credit card <br /><br />
         
                                            </div>
                                        </div>--->
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="submit" name="submit">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </form> 
                    </div>

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

    <?php  ?>