<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Redirect if user is not logged in
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    // Code for product deletion from wishlist
    $wid = intval($_GET['del']);
    if (isset($_GET['del'])) {
        $query = mysqli_query($con, "DELETE FROM wishlist WHERE id='$wid'");
    }

    // Code for adding product to cart from wishlist
    if (isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        $query = mysqli_query($con, "DELETE FROM wishlist WHERE productId='$id'");
        
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $sql_p = "SELECT * FROM products WHERE id={$id}";
            $query_p = mysqli_query($con, $sql_p);
            if (mysqli_num_rows($query_p) != 0) {
                $row_p = mysqli_fetch_array($query_p);
                $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
                header('location:my-wishlist.php');
            } else {
                $message = "Product ID is invalid";
            }
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
                        <li class="active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!--Begin Uren's Wishlist Area -->
        <div class="uren-wishlist_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="uren-product_remove">remove</th>
                                            <th class="uren-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="uren-product-price">Unit Price</th>
                                            <th class="uren-cart_btn">add to cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $ret = mysqli_query($con, "SELECT products.productName AS pname, products.productImage1 AS pimage, products.productPrice AS pprice, wishlist.productId AS pid, wishlist.id AS wid FROM wishlist JOIN products ON products.id=wishlist.productId WHERE wishlist.userId='" . $_SESSION['id'] . "'");
                                $num = mysqli_num_rows($ret);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                        <tr>
                                            <td class="uren-product_remove"><a href="wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class=""><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                            <td class="uren-product-thumbnail"><a href="javascript:void(0)"><img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" alt="Uren's Wishlist Thumbnail" width="60" height="100"></a>
                                            </td>
                                            <td class="uren-product-name"><a href="product-details.php?pid=<?php echo htmlentities($pd = $row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></td>
                                            <td class="uren-product-price"><span class="amount">KSH. 
                                            <?php echo htmlentities($row['pprice']);?>.00</span></td>
                                            <td class="uren-cart_btn"><a href="wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>">add to cart</a></td>
                                        </tr>
                                         <?php 
                                         }
                                          } else { 
                                             ?>
                                        <tr>
                                                <td style="font-size: 18px; font-weight:bold">Your Wishlist is Empty</td>
                                        </tr>
                                            <?php 
                                                } 
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Wishlist Area End Here -->
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
        $(".changecolor").switchstylesheet({ separator: "color" });
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