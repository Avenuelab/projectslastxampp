<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
include_once '../_inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" />

    <title>Washa Sacco</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <link href="../css/style-main.css" rel="stylesheet" type="text/css">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Washa Sacco</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/team/13.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              <?php include_once 'tmp/nav.html'?>
            <!-- /sidebar menu -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Downloads</h3>
                </div>
            </div>

            <div class="clearfix"></div>
              <?php
                $i=1;
                $folder="../dwn_load";
                $singleImages = array();
                
                foreach (glob($folder . '/*.pdf', GLOB_BRACE) as $image) {
                    $imageElements = array();
                    $imageElements['source'] = $image;
                    $singleImages[$image] = $imageElements;
                }?>

              <div class="card">
                <form action="proc/proc_doc" method="POST" enctype="multipart/form-data">                
                <div class="card-body">
                    <?php

                    foreach ($singleImages as $file) { 

                      $name = substr($file['source'],12);
                        

                  ?>                  

                    <div class="row">
                        <div class="col-md-2  col-sm-6">
                          <input id="id" type="radio" name="id" value="<?php echo $i ?>">
                        </div>
                        <div class="col-md-4  col-sm-6">                  
                            <a class="brochure-box " href="<?php echo $file['source'] ?>" download="<?php echo $name ?>">
                              <i class="far fa-file-pdf brochure-icon "></i>
                              <span class="text-theme-colored4 font-size-14"><?php echo $name ?></span>
                              <input type="hidden" name="oldfile_<?php echo $i?>" value="<?php echo $name ?>">
                            </a> 
                        </div>
                        <div class="col-md-3  col-sm-6">
                          <input id="upload" name="upload_<?php echo $i ?>" type="file"  multiple />
                        </div> 
                      </div>
                      <hr>                                        
                    <?php $i++; } ?>                  
                </div> 

                <div class="card-footer">
                   <div class="col-md-3 col-sm-6">
                    <button type="submit" id="doc" class="btn btn-success" name="doc">
                       Update File
                    </button>
                  </div>
                </div>                  
              

                </form> 
                                             
              </div>



                    </div><!-- dont touch -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright Taraknishi Computer Solutions
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">

    document.getElementById('doc').addEventListener('click', function(e) {
     // var imgVal = $('#upload').val(); 
      if($('input:radio:checked').length ==0){
      e.preventDefault();
     
      alert('Select an option and upload an image');
       return true;
       
     }else{

     }
    });
       

    </script>  
  </body>
</html>
