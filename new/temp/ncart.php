<?php 
//session_start(); // Ensure the session is started

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