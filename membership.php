<?php
include_once '_inc/connect.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
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
  <?php include_once 'tmp/menu_mem.php'?>

  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg3.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Membership</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#">Membership</a></span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      $memSql="SELECT * FROM membership WHERE id=1";
      $memQuery=mysqli_query($conn,$memSql);
      $rowMem=mysqli_fetch_array($memQuery);
      
    ?>
    <section>
      <div class="container pb-10">
              <div class="section-title">
                <div class="row justify-content-center">
                  <div class="col-lg-10 col-xl-10">
                    <div class="tm-sc-section-title section-title text-center">
                      <div class="title-wrapper">
                        <h2 class="title">WASHA MEBERSHIP</h2>
                        <p><?php echo $rowMem['description'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section-content">
                <div class="row">
                  <div class="col-sm-6 col-xl-6">
                    <div class="tm-sc-icon-box icon-box icon-left text-left iconbox-centered-in-responsive bg-theme-colored4 animate-icon-on-hover animate-icon-rotate-y p-30 mb-30" data-tm-border-radius="15px">
                      <div class="icon-box-wrapper">
                        
                        <div class="icon-text">
                          <h3 class="icon-box-title text-center text-white">ELIGIBILITY</h3>
                          <hr class="text-white">
                          <div class="content text-white">
                             <ul class="list-styled">
                                <?php
                                $feature=$rowMem['feature'];
                                echo $feature = '<li>' . implode('</li><li>', explode('.', $feature)) . '</li>';
                                ?>
                              </ul> 
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-6">
                    <div class="tm-sc-icon-box icon-box icon-left text-left iconbox-centered-in-responsive bg-theme-colored2 animate-icon-on-hover animate-icon-rotate-y p-30 mb-30" data-tm-border-radius="15px">
                      <div class="icon-box-wrapper">
                        <h3 class="icon-box-title text-center text-white">REQUIREMENTS</h3>
                      <hr class="text-white">
                          <div class="content text-white">
                             <ul class="list-styled">
                                <?php
                                $requirement=$rowMem['requirement'];
                                echo $requirement = '<li>' . implode('</li><li>', explode('.', $requirement)) . '</li>';
                                ?>
                                <div class="btn-add-to-cart">
                                  <a href="download" class="btn btn-theme-colored4 ml-10">Registration Form</a>
                                </div>
                              </ul> 
                          </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>      
      </section> 
    <?php
      $depSql="SELECT * FROM membership WHERE id=2";
      $depQuery=mysqli_query($conn,$depSql);
      $rowDep=mysqli_fetch_array($depQuery);
      //SELECT `id`, `name`, `feature`, `requirement`, `description` FROM `membership` WHERE 1
    ?>           
      <section class="container pb-60">
          <div class="product-single">
        <div class="section-title">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
              <div class="tm-sc-section-title section-title text-center">
                <div class="title-wrapper">
                  <h3 class="title">MEMBER<span class="text-theme-colored2">DEPOSITS</span></h3>
                  <p><?php echo $rowMem['description'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="section-content pm-40">
            <div class="row">
              <div class="col-lg-6">
                <div class="product-summary">
                   <div class="short-description"> 
                    <ul class="list-styled">
                        <?php
                        $feature=$rowMem['feature'];
                        echo $feature = '<li>' . implode('</li><li>', explode('.', $feature)) . '</li>';
                        ?>
                    </ul>                      
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="product-summary">
                  <div class="short-description">
                    <ul class="list-styled-tick">
                      <?php
                      $requirement=$rowMem['requirement'];
                      echo $requirement = '<li>' . implode('</li><li>', explode('.', $requirement)) . '</li>';
                      ?>
                    </ul>                      
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>     
      </section>
      <?php
        $depSql="SELECT * FROM membership WHERE id=3";
        $depQuery=mysqli_query($conn,$depSql);
        $rowDep=mysqli_fetch_array($depQuery);
        //SELECT `id`, `name`, `feature`, `requirement`, `description` FROM `membership` WHERE 1
      ?>           
      <section class="container pb-60">
          <div class="product-single">
        <div class="section-title">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
              <div class="tm-sc-section-title section-title text-center">
                <div class="title-wrapper">
                  <h3 class="title">SHARE <span class="text-theme-colored4">CAPITAL</span></h3>
                  <p><?php echo $rowDep['description'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="section-content pm-40">
            <div class="row">
              <div class="col-lg-6">
                <div class="product-summary">
                   <div class="short-description"> 
                    <ul class="list-styled">
                        <?php
                        $feature=$rowDep['feature'];
                        echo $feature = '<li>' . implode('</li><li>', explode('.', $feature)) . '</li>';
                        ?>
                    </ul>                      
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="product-summary">
                  <div class="short-description">
                    <ul class="list-styled-tick">
                      <?php
                      $requirement=$rowDep['requirement'];
                      echo $requirement = '<li>' . implode('</li><li>', explode('.', $requirement)) . '</li>';
                      ?>
                    </ul>                      
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>     
      </section>         
<!-- Section: Pricing Table -->
    <section class="pricing-table">
      <div class="container pb-30">
        <div class="section-title">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
              <div class="tm-sc-section-title section-title text-center">
                <div class="title-wrapper">
                  <h3 class="title">MEMBER <span class="text-theme-colored5">BENEFITS</span></h3>
                </div>
              </div>
            </div>
          </div>
        </div>        
        <div class="section-content">
          <div class="row">
            <?php
           
            $benSql="SELECT * FROM member_benefit WHERE id BETWEEN 1 AND 3";
            $benQuery=mysqli_query($conn,$benSql);
            while($rowBen=mysqli_fetch_array($benQuery)){ 

            ?>             
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
              <div class="tm-sc-service service-item-current-style2 text-center">

                <div class="service-content <?php echo $rowBen['boxcolor'] ?>">
                  <h4 class="title text-white"><?php echo $rowBen['name'] ?></h4>
                  <p class="text-white"><?php echo $rowBen['description'] ?></p>
                  <a class="btn btn-xs btn-theme-colored1 btn-view-details btn-outline-light" href="FOSA">Read More</a>
                </div>
              </div>
            </div>  
          <?php } mysqli_free_result($benQuery); ?>
      

          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <?php
            //SELECT `id`, `name`, `description`, `boxcolor` FROM `member_benefit` WHERE 1
            $benSql="SELECT * FROM member_benefit WHERE id BETWEEN 4 AND 6";
            $benQuery=mysqli_query($conn,$benSql);
            while($rowBen=mysqli_fetch_array($benQuery)){ 

            ?>             
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
              <div class="tm-sc-service service-item-current-style2 text-center">

                <div class="service-content <?php echo $rowBen['boxcolor'] ?>">
                  <h4 class="title text-white"><?php echo $rowBen['name'] ?></h4>
                  <p class="text-white"><?php echo $rowBen['description'] ?></p>
                  <a class="btn btn-xs btn-theme-colored1 btn-view-details btn-outline-light" href="FOSA">Read More</a>
                </div>
              </div>
            </div>  
          <?php } mysqli_free_result($benQuery); ?>            

          </div>
        </div>        
      </div>
    
    </section>
  </div>
  <!-- end main-content -->

  <!-- Footer -->
    <!-- Section: Partners -->
 <?php include_once 'tmp/partner.php'?>
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