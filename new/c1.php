<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){


        if(!empty($_SESSION['cart'])){
        foreach($_POST['quantity'] as $key => $val){
            if($val==0){
                unset($_SESSION['cart'][$key]);
            }else{
                $_SESSION['cart'][$key]['quantity']=$val;

            }
        }
            echo "<script>alert('Your Cart hasbeen Updated');</script>";
        }
    }
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
    {

if(!empty($_SESSION['cart'])){
        foreach($_POST['remove_code'] as $key){
            
                unset($_SESSION['cart'][$key]);
        }
            echo "<script>alert('Your Cart has been Updated');</script>";
    }
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
    
if(strlen($_SESSION['login'])==0)
    {   
header('location:login-register.php');
}
else{

    $quantity=$_POST['quantity'];
    $pdd=$_SESSION['pid'];
    $value=array_combine($pdd,$quantity);


        foreach($value as $qty=> $val34){

echo $cartSQL="insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')";

mysqli_query($con,$cartSQL);
header('location:check.php');
}
}
}


?>


        <?php include_once "temp/header.php"; ?>
    <style>
        .cart-wrapper {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-2px);
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 6px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .summary-card {
            background: white;
            border-radius: 12px;
            position: sticky;
            top: 20px;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border: none;
            transition: transform 0.2s;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #4f46e5, #4338ca);
        }

        .remove-btn {
            color: #dc2626;
            cursor: pointer;
            transition: all 0.2s;
        }

        .remove-btn:hover {
            color: #991b1b;
        }

        .quantity-btn {
            width: 28px;
            height: 28px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: #f3f4f6;
            border: none;
            transition: all 0.2s;
        }

        .quantity-btn:hover {
            background: #e5e7eb;
        }

        .discount-badge {
            background: #dcfce7;
            color: #166534;
            font-size: 0.875rem;
            padding: 4px 8px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <?php include_once "temp/nav.php"; ?>
    <div class="cart-wrapper">
        <div class="container">
            <form name="cart" method="post">
                <?php
                    if(!empty($_SESSION['cart'])){
                ?>
            <div class="row g-4">
                <!-- Cart Items Section -->
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Shopping Cart</h4>
                    </div>

                    <!-- Product Cards -->
                    <div class="d-flex flex-column gap-3">
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
                        <!-- Product 2 -->
                        <div class="product-card p-3 shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="admin/productimages/<?php echo $row['productImage1'];?>" alt="" width="30px" height="50px">
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1"><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

                                        $_SESSION['sid']=$pd;
                                     ?></a></h6>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="number" class="quantity-input" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="fw-bold"><?php echo "Ksh"." ".$row['productPrice']; ?>.00</span>
                                </div>
                                <br>
                                <div class="col-md-2">
                                    <span class="text-muted"></span>
                                    <span>Shipping <?php echo "Ksh"." ".$row['shippingCharge']; ?>.00</span>
                                </div>
                                <br>
                                <div class="col-md-2">
                                    <span class="text-muted"></span>
                                    <span>Total <?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span>
                                </div>
                                <div class="col-md-1">
                                    <a href="proc/delete.php?remove_code=<?php echo htmlentities($row['id']);?>" class="btn btn-light border text-danger icon-hover-danger"> <i class="bi bi-trash remove-btn"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Summary Section -->
                <?php } }
                    $_SESSION['pid']=$pdtid;
                ?>
                <div class="col-lg-4">
                    <div class="summary-card p-4 shadow-sm">
                        <h5 class="mb-4">Order Summary</h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>
                            <span>KSH <?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">KSH <?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
                        </div>
                        <button type="submit" name="ordersubmit" class="btn btn-primary checkout-btn w-100 mb-3">
                            Proceed to Checkout
                        </button>
                        
                        <div class="d-flex justify-content-center gap-2">
                            <div class="btn btn-checkout w-100">
                                <a class="btn btn-primary checkout-btn w-100 mb-3" href="shop-left-sidebar">To Shop</a>
                            </div>
                            <div class="btn btn-checkout w-100">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary checkout-btn w-100 mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php include('temp/footer.php');?>

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

    <!-- For demo purposes – can be removed on production -->
    
    <script src="switchstylesheet/switchstylesheet.js"></script>
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateQuantity(productId, change) {
            const input = event.target.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value) + change;
            if (value >= 1) {
                input.value = value;
            }
        }
    </script>
</body>
</html>
