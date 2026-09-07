<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location:my-cart.php');
        } else {
            $message = "Product ID is invalid";
        }
    }
}

$pid = intval($_GET['pid']);
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {   
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
        echo "<script>alert('Product added to wishlist');</script>";
        header('location:my-wishlist.php');
    }
}

if (isset($_POST['submit'])) {
    $qty = $_POST['quality'];
    $price = $_POST['price'];
    $value = $_POST['value'];
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $review = $_POST['review'];
    mysqli_query($con, "insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}

include_once "temp/header.php"; 
?>

<body class="template-color-1">
    <div class="main-wrapper">
        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <?php include_once "temp/nav.php"; ?>

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Shop</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop Left Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                        <div class="uren-sidebar-catagories_area">
                            <div class="category-module uren-sidebar_categories">
                                <div class="category-module_heading">
                                    <h5>Categories</h5>
                                </div>
                                <?php 
                                $sql = mysqli_query($con, "SELECT id, categoryName FROM category");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <div class="module-body">
                                    <ul class="module-list_item">
                                        <li>
                                            <a href="category.php?cid=<?php echo $row['id'];?>" class="accordion-toggle collapsed">
                                                <?php echo $row['categoryName'];?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="sidebar-banner_area">
                            <div class="banner-item img-hover_effect">
                                <a href="javascript:void(0)">
                                    <img src="assets/images/slider/1.jpg" alt="Uren's Shop Banner Image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="row"> <!-- Start a new row for the products -->
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM products");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>       
                            <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Adjusted column classes for responsive design -->
                                <div class="shop-product-wrap grid gridview-3 img-hover-effect_area shop-content_wrapper">
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img class="primary-img" src="admin/productimages/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="Uren's Product Image">
                                                    </a>
                                                    <div class="sticker-area-2">
                                                        <span class="sticker-2">-20%</span>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                                            <li><a class="uren-wishlist" data-toggle="tooltip" data-placement="right" title="Wishlist" href="single-product.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="rating-box"></div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <h6><a href="single-product.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">KSH. <?php echo htmlentities($row['productPrice']); ?></span>
                                                            <span class="old-price">KSH. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div> <!-- End of row -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shop Left Sidebar Area End Here -->

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
</body>
</html>