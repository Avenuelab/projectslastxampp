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
					<h3>Edit Banking</h3>
				</div>
			</div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">

                    <form method="POST" action="proc/proc_bank" enctype="multipart/form-data">
                      <?Php
                      $bnkSQL="SELECT * FROM banking";
                      $bnkQuery=mysqli_query($conn,$bnkSQL);
                      while ($row=mysqli_fetch_array($bnkQuery)) { 
                        $id=$row['id'];
                        $path=$row['pic_path'];
                        $pic=$row['pic'];
                        ?>                    
                      <div class="card mb-100">
                        <div class="card-body">
                          <div class="col-md-12 ">
                            <div class="col-md-3  col-sm-6">
                                <input type="radio" class="flat" name="id" value="<?php echo $id ;?>" class="form-control">
                            </div>
                            <div class="col-md-3  col-sm-6">
                              <input name="image_<?php echo $id ?>" type="file" accept="image/*" onchange="document.getElementById('output_<?php echo $id; ?>').src = window.URL.createObjectURL(this.files[0])" />
                            </div>
                            <div class="col-md-3  col-sm-6">
                              <img class="img-fluid"  id="output_<?php echo $id; ?>" src="../<?php echo $path.$pic; ?>" width="100px" height="100px" style="margin-bottom:2em;" />
                            </div>                          
                            <div class="col-md-6 col-sm-6">
                              <input type="text" class="form-control" name="name_<?php echo $id ?>" value="<?php echo $row['name'];?>">
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <textarea class="form-control" rows="5" name="feature_<?php echo $id ?>"><?php echo $row['feature'];?></textarea>
                            </div> 
                        
                          </div>                          
                        </div>
                      </div>

                      <?php } ?>
                        <div class="col-md-4 col-sm-6 pt-90 pb-40">
                          <button type="submit" class="btn btn-success" name="saving">
                            <span class="fa fa-plus"></span> Update Banking
                          </button>
                        </div>                        
                    </form> 

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
