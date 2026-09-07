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
        if ($sql) {
        echo "Payment Successfull ";
        echo '<meta http-equiv="refresh" content="2;URL=cart.php">';
     } else {
       echo 'Sorry Payment error!';
       echo '<meta http-equiv="refresh" content="2;URL=index.php">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=index.php>';
   
    }
  }

?>
<?php include_once "temp/header.php"; ?>

    <style>
.icon-hover-primary:hover {
  border-color: #3b71ca !important;
  background-color: white !important;
}

.icon-hover-primary:hover i {
  color: #3b71ca !important;
}
.icon-hover-danger:hover {
  border-color: #dc4c64 !important;
  background-color: white !important;
}

.icon-hover-danger:hover i {
  color: #dc4c64 !important;
}
</style>
<?php include_once "temp/nav.php"; ?>


<header>
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
</header>

<!-- cart + summary -->
<section class="bg-light my-5">
  <div class="container">
    <div class="row">
      <!-- cart -->
      
      <div class="col-lg-9">
        <div class="card border shadow-0">
          
          <div class="m-4">
            <h4 class="card-title mb-4">Shopping cart Summary</h4>
            <?php
            $pdtid=array();
            $sql = "SELECT * FROM products WHERE id IN(";
            foreach($_SESSION['cart'] as $id => $value){
            $sql .=$id. ",";
            }
            $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
            $query = mysqli_query($con,$sql);
            $totalprice=0;
            $totalqunty=0;
            if(!empty($query)){
            while($row = mysqli_fetch_array($query)){
                $quantity=$_SESSION['cart'][$row['id']]['quantity'];
                $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
                $totalprice += $subtotal;
                $_SESSION['qnty']=$totalqunty+=$quantity;

                array_push($pdtid,$row['id']);
              //print_r($_SESSION['pid'])=$pdtid;exit;
            ?>
            <div class="row gy-3 mb-4">
              <div class="col-lg-5">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="admin/productimages/<?php echo $row['productImage1'];?>" alt=""style="width: 96px; height: 96px;">
                    <div class="">
                          <a href="single-product.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

                            $_SESSION['sid']=$pd;
                         ?></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                </div>
                <div class="">
                  <text class="h6">KSH <?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</text> <br />
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <a href="proc/delete.php?remove_code=<?php echo htmlentities($row['id']);?>" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>


          <div class="border-top pt-4 mx-4 mb-4">
            <p><i class="fas fa-truck text-muted fa-lg"></i>Delivery Fee KSH 250/=</p>
            <p class="text-muted">
            </p>
          </div>
        </div>
      </div>
    
      <!-- cart -->
      <!-- summary -->
      <div class="col-lg-3">
        <div class="card mb-3 border shadow-0">
          <div class="card-body">
            <form>
              <div class="form-group">
                <label class="form-label">Total Amount</label>
                <div class="input-group">
                  <input type="text" value="<?php echo $_SESSION['tp'] ?>" name="amt">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card shadow-0 border">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total Amount:</p>
              <p class="mb-2">KSH <?php echo $_SESSION['tp'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
            </div>
            <div class="mt-3">
              <a href="checkout.php" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
              <a href="shop-left-sidebar.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>
              <a href="cart.php" class="btn btn-light w-100 border mt-2"> Back to cart </a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
    </div>
  </div>
</section>
<!-- cart + summary -->

<!-- Recommended -->

<!-- Begin Uren's Footer Area -->
<?php include_once "temp/footer.php"; ?>
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
       <!-- Uren's Footer Area End Here -->
        <?php } ?>
