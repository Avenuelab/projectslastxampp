<?php
include_once '_inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Sacco Management System" />
<meta name="keywords" content="Loans and Saving" />
<meta name="author" content="Taraknishi" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>Washa Sacco</title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">


<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="css/javascript-plugins-bundle.css" rel="stylesheet"/>

<!-- CSS | menuzord megamenu skins -->
<link href="js/menuzord/css/menuzord.css" rel="stylesheet"/>

<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>

<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/javascript-plugins-bundle.js"></script>
<script src="js/menuzord/js/menuzord.js"></script>

</head>
<body class="tm-container-1230px has-side-panel side-panel-right">
<div id="wrapper" class="clearfix">
  <!-- Header -->
  <?php include_once 'tmp/menu_srv.php'?>
  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title divider layer-overlay overlay-dark-5 section-typo-light bg-img-center" data-tm-bg-img="images/bg/save.gif">
      <div class="container pt-90 pb-90">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title text-white">Services</h2>
              <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                <div class="breadcrumbs">
                  <span class="trail-item trail-begin">
                    <a href="#"><span>Home</span></a>
                  </span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="trail-item"><a href="#"><span>service</span></a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="trail-item trail-end text-theme-colored1">Savings</span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="section-content">
          <h2 class="product-title mt-30 text-center text-theme-colored2">SAVINGS PRODUCTS</h2>
          <?Php
          $savingSQL="SELECT * FROM saving";
          $savingQuery=mysqli_query($conn,$savingSQL);
          while ($row=mysqli_fetch_array($savingQuery)) { ?>          
          <div class="product-single mt-60">
            <div class="row">

              <div class="col-lg-6">
                <div class="product-image-slider lightgallery-lightbox mb-md-30">
                  <div class="tm-owl-thumb-carousel" data-nav="true" data-slider-id="1">
                    <div >
                      <img class="img-fullwidth" src="<?php echo $row['pic_path'].$row['pic'];?>" alt="images">

                    </div>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-6">
                <div class="product-summary">
                  <h4 class="product-title mt-0"><?php echo $row['name'];?>  </h4>
     
                  <div class="short-description">
                    <p><?php echo $row['description'];?></p>
                     <h3 class="text-theme-colored1">Features</h3>
                    <ul class="list-styled">
                      <?php
                      $feature=$row['feature'];
                      echo $feature = '<li>' . implode('</li><li>', explode('.', $feature)) . '</li>';
                      ?>

                    </ul>                      
                  </div>
                  <div class="product_meta">
                    <h3 class="text-theme-colored2">Requirements</h3>
                    <ul class="mb-30 list-styled">
                      <?php
                      $req=$row['requirement'];
                      echo $req = '<li>' . implode('</li><li>', explode('.', $req)) . '</li>';
                      ?>
                    </ul>
                  </div>
                  <div class="btn-add-to-cart">
                    <a href="#" class="btn btn-theme-colored4 ml-10" download="Savings Form">Savings Form</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>  
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->


  <!-- Footer -->
  <?php include_once 'tmp/footer.php' ?> 
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>
</body>
</html>