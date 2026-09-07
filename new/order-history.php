<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login-register.php');
}
else{

?>
<?php include_once "temp/header.php"; ?>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<body>
    <?php include_once "temp/nav.php"; ?>
    <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>Other</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">order hitory</li>
                        </ul>
                    </div>
                </div>
            </div>
    <div class="col-lg-9">
        <div class="m-4">
            <div class="body-content outer-top-xs">
                <div class="container">
                    <div class="row inner-bottom-sm">
                        <div class="shopping-cart">
                            <div class="col-md-12 col-sm-12 shopping-cart-table ">
                                <div class="table-responsive">
                                    <form name="cart" method="post">    

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="cart-romove item">#</th>
                                                    <th class="cart-description item">Image</th>
                                                    <th class="cart-product-name item">Product Name</th>
                                            
                                                    <th class="cart-qty item">Quantity</th>
                                                    <th class="cart-sub-total item">Price Per unit</th>
                                                    <th class="cart-sub-total item">Shipping Charge</th>
                                                    <th class="cart-total item">Grandtotal</th>
                                                    <th class="cart-total item">Payment Method</th>
                                                    <th class="cart-description item">Order Date</th>
                                                    <th class="cart-total last-item">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td class="cart-image">
                                                        <a class="entry-thumbnail" href="detail.html">
                                                            <img src="admin/productimages/<?php echo $row['pimg1'];?>" alt="" width="150px" height="100px">
                                                        </a>
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                        <h4 class='cart-product-description'><a href="single-product.php?pid=<?php echo $row['opid'];?>">
                                                        <?php echo $row['pname'];?></a></h4>   
                                                    </td>
                                                    <td class="cart-product-quantity">
                                                        <?php echo $qty=$row['qty']; ?>   
                                                    </td>
                                                    <td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
                                                    <td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  
                                                    </td>
                                                    <td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
                                                    <td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
                                                    <td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
                                                    
                                                    <td>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">
                                                        Track</a>
                                                    </td>
                                                </tr>
                                                <?php $cnt=$cnt+1;} ?>
                
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- For demo purposes – can be removed on production : End -->
</body>
</html>
<?php }  ?>