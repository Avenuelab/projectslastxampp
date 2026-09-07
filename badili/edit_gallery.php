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
                    <h3>Edit Gallery</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <section class="our-team">
                          <div class="container pb-3">
                       
                            <div class="section-content pb-3">
                              <div class="tm-sc-section-title section-title">
                                <div class="title-wrapper">
                                  <h3 class="mb-0 text-theme-colored4">CSR</h3>
                                  <?php

                                  // open this directory 
                                  $dir="../images/gallery/csr/";
                                  $myDirectory = opendir($dir);

                                  // get each entry
                                  while($entryName = readdir($myDirectory)) {
                                      $dirArray[] = $entryName;
                                  }

                                  // close directory
                                  closedir($myDirectory);

                                  //  count elements in array
                                  $indexCount = count($dirArray);

                                  ?>               
                                </div>
                              </div>          
                              <div class="row"> 

                                        
                                <form method="POST" action="proc/proc_gallery" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">                                    
                                          <?php
                                          // loop through the array of files and print them all in a list
                                          for($index=0; $index < $indexCount; $index++) {
                                              $extension = substr($dirArray[$index], -3);
                                                //jpg,jpeg,png,gif,JPEG,JPG
                                              if ($extension == 'jpg' || $extension == 'jpeg'|| $extension == 'png'|| $extension == 'JPG'){ 
                                                    $id=strtok($dirArray[$index], ".");  
                                                ?>

                                              <div class="col-md-6 col-xl-3">
                                                <div class="tm-sc-team-box">
                                                  <div class="team-social">
                                                    Select to Delete
                                                    <input type="radio" name="id" value="<?php echo $dirArray[$index] ?>" />
                                                  </div>                
                                                  <div class="tm-thumb">
                                                    <img class="img-fullwidth" src="<?php echo $dir.$dirArray[$index] ?>" alt="1.jpg">
                                                  </div>

                                                </div>
                                              </div>
                                             <?php }   
                                                }
                                              ?>

                                        </div>
                                        <div class="card-footer">
                                             <div class="col-md-4 col-sm-6">
                                              <button type="submit" class="btn btn-success" name="csr">
                                                <span class="fa fa-plus"></span> Update CSR
                                              </button>
                                            </div> 

                                        </div>
                                
                                    </div><!--end of CARD-->                                              

                                  </form>
                                 
                              </div>
                            </div><!--end of section content-->
                          </div>
                        </section>

                        <section class="our-team">
                          <div class="container pb-3">
                       
                            <div class="section-content pb-3">
                              <div class="tm-sc-section-title section-title">
                                <div class="title-wrapper">
                                  <h3 class="mb-0 text-theme-colored4">Events</h3>
                                  <?php

                                  // open this directory 
                                  $dirEvent="../images/gallery/events/thumb/";
                                  $myEventDirectory = opendir($dirEvent);

                                  // get each entry
                                  while($entryNameEvent = readdir($myEventDirectory)) {
                                      $dirArrayEvent[] = $entryNameEvent;
                                  }

                                  // close directory
                                  closedir($myEventDirectory);

                                  //  count elements in array
                                   $indexCountEvent = count($dirArrayEvent);

                                  ?>               
                                </div>
                              </div>          
                              <div class="row"> 

                                        
                                <form method="POST" action="proc/proc_gallery" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">                                    
                                          <?php
                                          // loop through the array of files and print them all in a list
                                          for($index=0; $index < $indexCountEvent; $index++) {
                                              $extension = substr($dirArrayEvent[$index], -3);
                                                //jpg,jpeg,png,gif,JPEG,JPG
                                              if ($extension == 'jpg' || $extension == 'jpeg'|| $extension == 'png'|| $extension == 'JPG'){
                                                    $id=strtok($dirArrayEvent[$index], ".");  
                                                ?>

                                              <div class="col-md-6 col-xl-3">
                                                <div class="tm-sc-team-box">
                                                  <div class="team-social">
                                                    Select to Delete
                                                    <input type="radio" name="id" value="<?php echo $dirArrayEvent[$index] ?>" />
                                                  </div>                
                                                  <div class="tm-thumb">
                                                    <img class="img-fullwidth" src="<?php echo $dirEvent.$dirArrayEvent[$index] ?>" alt="1.jpg">
                                                  </div>
                                                </div>
                                              </div>
                                             <?php }   
                                                }
                                              ?>

                                        </div>
                                        <div class="card-footer">
                                             <div class="col-md-4 col-sm-6">
                                              <button type="submit" class="btn btn-success" name="event">
                                                <span class="fa fa-plus"></span> Update Events
                                              </button>
                                            </div> 

                                        </div>
                                
                                    </div><!--end of CARD-->                                              

                                  </form>
                                 
                              </div>
                            </div><!--end of section content-->
                          </div>
                        </section>

                        <section class="our-team">
                          <div class="container pb-3">
                       
                            <div class="section-content pb-3">
                              <div class="tm-sc-section-title section-title">
                                <div class="title-wrapper">
                                  <h3 class="mb-0 text-theme-colored4">AGM</h3>
                                  <?php

                                  // open this directory 
                                  $dirAgm="../images/gallery/agm/thumb/";
                                  $myAgmDirectory = opendir($dirAgm);

                                  // get each entry
                                  while($entryNameAgm = readdir($myAgmDirectory)) {
                                      $dirArrayAgm[] = $entryNameAgm;
                                  }

                                  // close directory
                                  closedir($myAgmDirectory);

                                  //  count elements in array
                                  $indexCountAgm = count($dirArrayAgm);

                                  ?>               
                                </div>
                              </div>          
                              <div class="row"> 

                                        
                                <form method="POST" action="proc/proc_gallery" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">                                    
                                          <?php
                                          // loop through the array of files and print them all in a list
                                          for($index=0; $index < $indexCountAgm; $index++) {
                                              $extension = substr($dirArrayAgm[$index], -3);
                                               
                                              if ($extension == 'jpg' || $extension == 'jpeg'|| $extension == 'png'|| $extension == 'JPG'){
                                                    $id=strtok($dirArrayAgm[$index], ".");  
                                                ?>

                                              <div class="col-md-6 col-xl-3">
                                                <div class="tm-sc-team-box">
                                                  <div class="team-social">
                                                    Select to Delete
                                                    <input type="radio" name="id" value="<?php echo $dirArrayAgm[$index] ?>" />
                                                  </div>                
                                                  <div class="tm-thumb">
                                                    <img class="img-fullwidth" src="<?php echo $dirAgm.$dirArrayAgm[$index] ?>" alt="1.jpg">
                                                  </div>

                                                </div>
                                              </div>
                                             <?php }   
                                                }
                                              ?>

                                        </div>
                                        <div class="card-footer">
                                             <div class="col-md-4 col-sm-6">
                                              <button type="submit" class="btn btn-success" name="agm">
                                                <span class="fa fa-plus"></span> Delete AGM
                                              </button>
                                            </div> 

                                        </div>
                                
                                    </div><!--end of CARD-->                                              

                                  </form>
                                 
                              </div>
                            </div><!--end of section content-->
                          </div>
                        </section>
                        <section class="our-team">
                          <div class="container pb-3">
                       
                            <div class="section-content pb-3">
                              <div class="tm-sc-section-title section-title">
                                <div class="title-wrapper">
                                  <h3 class="mb-0 text-theme-colored4">Others</h3>
                                  <?php

                                  // open this directory 
                                  $dirWasha="../images/gallery/washa/thumb/";
                                  $myWashaDirectory = opendir($dirWasha);

                                  // get each entry
                                  while($entryNameWasha = readdir($myWashaDirectory)) {
                                      $dirArrayWasha[] = $entryNameWasha;
                                  }

                                  // close directory
                                  closedir($myWashaDirectory);

                                  //  count elements in array
                                  $indexCountWasha = count($dirArrayWasha);

                                  ?>               
                                </div>
                              </div>          
                              <div class="row"> 

                                        
                                <form method="POST" action="proc/proc_gallery" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">                                    
                                          <?php
                                          // loop through the array of files and print them all in a list
                                          for($index=0; $index < $indexCountWasha; $index++) {
                                              $extension = substr($dirArrayWasha[$index], -3);
                                               
                                              if ($extension == 'jpg' || $extension == 'jpeg'|| $extension == 'png'|| $extension == 'JPG'){
                                                    $id=strtok($dirArrayWasha[$index], ".");  
                                                ?>

                                              <div class="col-md-6 col-xl-3">
                                                <div class="tm-sc-team-box">
                                                  <div class="team-social">
                                                    Select to Delete
                                                    <input type="radio" name="id" value="<?php echo $dirArrayWasha[$index] ?>" />
                                                  </div>                
                                                  <div class="tm-thumb">
                                                    <img class="img-fullwidth" src="<?php echo $dirWasha.$dirArrayWasha[$index] ?>" alt="1.jpg">
                                                  </div>

                                                </div>
                                              </div>
                                             <?php }   
                                                }
                                              ?>

                                        </div>
                                        <div class="card-footer">
                                             <div class="col-md-4 col-sm-6">
                                              <button type="submit" class="btn btn-success" name="agm">
                                                <span class="fa fa-plus"></span> Delete Other
                                              </button>
                                            </div> 

                                        </div>
                                
                                    </div><!--end of CARD-->                                              

                                  </form>
                                 
                              </div>
                            </div><!--end of section content-->
                          </div>
                        </section>

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
  </body>
</html>
