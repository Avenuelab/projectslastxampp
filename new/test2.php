<?php
session_start();
error_reporting(0);
include('includes/config.php');

<?php include_once "temp/header.php"; ?>

<body class="template-color-1">

    <div class="main-wrapper">

        <?php include_once "temp/nav.php"; ?>

        <!-- Begin Popular Search Area -->

        <!-- Popular Search Area End Here -->

        <div class="uren-slider_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-slider slider-navigation_style-2">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-01 bg-1">
                                <div class="slider-content">
                                    <span>Best selling Product</span>
                                    <h3>Quality Grinder</h3>
                                    <h4>KSH <span>8,000/-</span></h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="shop-left-sidebar.php">Shop Here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-02 bg-2">
                                <div class="slider-content slider-content-2">
                                    <span class="primary-text_color">Drills &amp; Grinders</span>
                                    <h3>Quality &amp; Classy</h3>
                                    <h4>At Affordable Prices</h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="shop-left-sidebar.php">Shop with Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        

        <!-- Begin Uren's Product Area -->
        <div class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Top Products</span>
                            <h3>Products</h3>
                        </div>
                        <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                            ]'>
                                            <?php
                                $ret = mysqli_query($con, "SELECT * FROM products");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                <img class="primary-img" src="admin/productimages/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/1/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="Uren's Product Image">
                                                
                                            </a>
                                            <div class="sticker">
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="test1.php?page=product&action=add&id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.php" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">Ksh <?php echo htmlentities($row['productPrice']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Product Area End Here -->
        <?php include_once "temp/footer.php"; ?>

        
        <!-- Begin Uren's Modal Area -->
        
        <!-- Uren's Modal Area End Here -->

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