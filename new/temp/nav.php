<?php 
//session_start();
error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['action'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
    }
}
?>
<!-- Begin Uren's Header Main Area -->
        <header class="header-main_area bg--sapphire">
            <div class="header-top_area d-lg-block d-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="index.php">Home</a>
                                        </li>
                                        <li class="megamenu-holder "><a href="shop-left-sidebar.php">Shop</a>
                                            
                                        </li>
                                        <li class=""><a href="javascript:void(0)">Pages <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="my-account.php">My Account</a></li>
                                                <li><a href="order-history.php">Order History</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="cart.php">Cart</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="catalogue.php">Catalogue</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="about-us.php">About Us</a></li>
                                        <li class=""><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <?php if(strlen($_SESSION['login']))
                                        {   ?>
                <li><a href="#"><i class="icon fa fa-user"></i><?php echo htmlentities($_SESSION['username']);?></a></li>
                <?php } ?>
                                        <li><a href="my-account.php">My Account<i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-my_account">
                                                <?php if(strlen($_SESSION['login'])==0)
                                                    {   ?>
                                                <li><a href="login-register.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
                                                <?php }
                                                    else{ ?>
    
                <li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                <?php } ?>  
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-top_area header-sticky bg--sapphire">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="index.php">Home</a>
                                        </li>
                                        <li class="megamenu-holder "><a href="shop-left-sidebar.php">Shop</a>   
                                        </li>
                                        
                                        <li class=""><a href="javascript:void(0)">Pages <i
                                                class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="my-account.php">My Account</a></li>
                                                <li><a href="order-history.php">Order History</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="cart.php">Cart</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="catalogue.php">Catalogue</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="about-us.php">About Us</a></li>
                                        <li class=""><a href="contact.php">Contact</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-3 d-block d-lg-none">
                            <div class="header-logo_area header-sticky_logo">
                                <a href="index.php">
                                    <img src="" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-sm-9">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count"><?php echo $_SESSION['qnty']; ?></span>
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Cart:</span>
                                                <span class="total-price">ksh.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="contact-us_wrap">
                                        <a href="tel://+254740480164"><i class="ion-android-call"></i>+254 740 480164</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-logo_col col-12">
                            <div class="header-logo_area">
                                <a href="index.php">
                                    <img src="logo.png" alt="" style="height: 30px;">
                                </a>
                            </div>
                        </div>
                        
                        
                        <div class="custom-cart_col col-12">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count"><?php echo $_SESSION['qnty']; ?></span>
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Cart:</span>
                                                <span class="total-price"><?php echo $_SESSION['tp']; ?></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="contact-us_wrap">
                                        <a href="tel://+254740480164"><i class="ion-android-call"></i>+254 740 480164</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="index.php"><span
                                        class="mm-text">Home</span></a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-left-sidebar.php">
                                        <span class="mm-text">Shop</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php">
                                        <span class="mm-text">Pages</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.php">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li><a href="order-history.php">Order History</a></li>
                                        <li>
                                            <a href="wishlist.php">
                                                <span class="mm-text">Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.php">
                                                <span class="mm-text">Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="checkout.php">
                                                <span class="mm-text">Checkout</span>
                                            </a>
                                        </li>
                                        <li><a href="catalogue.php">Catalogue</a></li>
                                        <li>
                                    </ul>
                                    <li class=""><a href="about-us.php">About Us</a></li>
                                    <li class=""><a href="contact.php">Contact</a></li>
                                </li>
                            </ul>
                        </nav>
                        <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="javascript:void(0)">
                                    <span
                                        class="mm-text">User
                                        Setting</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <?php if(strlen($_SESSION['login']))
    {   ?>
                <li><a href="#"><i class="icon fa fa-user"></i><?php echo htmlentities($_SESSION['username']);?></a></li>
                <?php } ?>
                                            <a href="my-account.php">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <?php if(strlen($_SESSION['login'])==0)
                                             {   ?>
                                            <a href="login-register.php">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                        <?php }
                                                else{ ?>
    
                                                 <li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                                        <?php } ?>  
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
        <div class="minicart-content">
            <?php if (!empty($_SESSION['cart'])): ?>
            <div class="minicart-heading">
                <h4>Shopping Cart</h4>
            </div>
            <ul class="minicart-list">
                <?php
                $sql = "SELECT * FROM products WHERE id IN (";
                foreach ($_SESSION['cart'] as $id => $value) {
                    $sql .= $id . ",";
                }
                $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                $query = mysqli_query($con, $sql);
                $totalprice = 0;
                $totalqunty = 0;

                if (!empty($query)) {
                    while ($row = mysqli_fetch_array($query)) {
                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                        $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
                        $totalprice += $subtotal;
                        $_SESSION['qnty'] = $totalqunty += $quantity;
                ?>
                <li class="minicart-product">
                    <div class="product-item_img">
                        <a href="single-product.php?pid=<?php echo htmlentities($row['id']); ?>">
                            <img src="admin/productimages/<?php echo $row['productImage1']; ?>">
                        </a>
                    </div>
                    <div class="product-item_content">
                        <a href="index.php?page-detail"><?php echo $row['productName']; ?></a>
                        <span class="product-item_quantity">ksh.<?php echo ($row['productPrice'] + $row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></span>
                    </div>
                </li>
                <?php 
                    }
                }
                ?>
            </ul>
        </div>
        <div class="minicart-item_total">
            <span>Subtotal</span>
            <span class="ammount">ksh.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
        </div>
        <div class="minicart-btn_area">
            <a href="cart.php" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
        </div>
        <div class="minicart-btn_area">
            <a href="checkout.php" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
        </div>
    </div>
</div>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
        </header>
        <!-- Uren's Header Main Area End Here -->