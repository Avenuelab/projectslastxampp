<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM products WHERE id={$id}";
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location:cart.php');
        }else{
            $message="Product ID is invalid";
        }
    }
}

$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
    if(strlen($_SESSION['login'])==0)
    {   
header('location:login-register.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');

}
}
if(isset($_POST['submit']))
{
    $qty=$_POST['quality'];
    $price=$_POST['price'];
    $value=$_POST['value'];
    $name=$_POST['name'];
    $summary=$_POST['summary'];
    $review=$_POST['review'];
    mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


?>
<?php include_once "temp/header.php"; ?>
<style>
    .product-image {
            max-height: 400px;
            object-fit: cover;
        }
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }
        .thumbnail:hover, .thumbnail.active {
            opacity: 1;
        }
</style>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include_once "temp/nav.php"; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Single Product Type</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

       <!-- Begin Uren's Single Product Area -->
        <?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
<div class="container mt-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">

            <img src="admin/productimages/<?php echo $row['productImage1'];?>" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
            <div class="d-flex justify-content-between">
                <img src="admin/productimages/<?php echo $row['productImage1'];?>" alt="Thumbnail 1" class="thumbnail rounded active" onclick="changeImage(event, this.src)">
                <img src="admin/productimages/<?php echo $row['productImage2'];?>" alt="Thumbnail 1" alt="Thumbnail 2" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                <img src="admin/productimages/<?php echo $row['productImage3'];?>" alt="Thumbnail 1" alt="Thumbnail 3" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2 class="mb-3"><?php echo htmlentities($row['productName']);?></h2>
            <p class="text-muted mb-4"><?php echo htmlentities($row['productCompany']);?></p>
            <div class="mb-3">
                <span class="h4 me-2">KSH. <?php echo htmlentities($row['productPrice']);?></span>
                <span class="text-muted"><s>KSHr.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></s></span>
            </div>
            <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
                $num=mysqli_num_rows($rt);
                {
                ?>
            <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                <span class="ms-2">(<?php echo htmlentities($num);?> Reviews)</span>
            </div>
            <?php } ?>
            <p class="mb-4"><?php echo $row['productDescription'];?></p>
            <div class="mb-4">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="text" value="1">
            </div>
            <button class="btn btn-primary btn-lg mb-3 me-2">
                    <a href="single-product.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
            </button>
            <button class="btn btn-outline-secondary btn-lg mb-3">
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="single-product.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
                                                <i class="fa fa-heart"></i>
                                            </a>
            </button>
        </div>
    </div>
</div>
        <!-- Uren's Product Area End Here -->

        

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
</script>

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
<?php } ?>
