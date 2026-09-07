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
					<h3>Edit About_Governance</h3>
				</div>
			</div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                      
					<form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="proc/proc_gov">
					<div class="card">
						<div class="card-header">
						<div class="header">	<h2>Edit BOG</h2></div>
						</div>
						<div class="card-body">                
						  <?php
						    $bodSql="SELECT * FROM bod";
						    $bodQuery=mysqli_query($conn,$bodSql);
						    while ($bodRow=mysqli_fetch_array($bodQuery)) { 
	                        $path=$bodRow['pic_path'];
	                        $pic=$bodRow['pic'];
	                        $name=$bodRow['name'];
	                        $title=$bodRow['title'];
	                        $id=$bodRow['id'];
	                        
	                        ?>	
	                        

							<div class="col-md-12 ">
							<div class="radio col-md-2 col-sm-6  form-group">
								<label>
									<input type="radio" class="flat" name="id" value="<?php echo $id ?>">
									Select
								</label>
							</div>														
								<div class="col-md-4 col-sm-6  form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" name="name_<?php echo $id ?>" value="<?php echo $name ?>">
									<span class="fa fa-refresh form-control-feedback left" aria-hidden="true"></span>
								</div>

								<div class="col-md-3 col-sm-6  form-group has-feedback">
									<input type="text" class="form-control" name="title_<?php echo $id ?>" value="<?php echo $title ?>">
									<span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
								</div>

								<div class="col-md-2 col-sm-6  form-group has-feedback">
									<input name="image_<?php echo $id ?>" type="file" accept="image/*" onchange="document.getElementById('output_<?php echo $id; ?>').src = window.URL.createObjectURL(this.files[0])" multiple>
									
								</div>
								<div class="col-md-2 col-sm-6  form-group has-feedback">
									<img id="output_<?php echo $id; ?>" src="../<?php echo $path.$pic; ?>" width="100px" height="100px"/>
								</div>											
							</div>

						<?php } ?> 
						</div>												
							<div class="col-md-4 col-sm-6  form-group has-feedback">
								<button type="submit" class="btn btn-success" name="bog">
									<span class="fa fa-plus"></span> Update BOG
								</button>
							</div>											
						</div> 										
					</form>

					<form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="proc/proc_gov">
					<div class="card">
						<div class="card-header">
							<div class="header"><h2>Edit Supervisory Committee</h2></div>
						</div>
						<div class="card-body">                
				          <?php
					            $supSql="SELECT * FROM supcom";
					            $supQuery=mysqli_query($conn,$supSql);
					            while ($supRow=mysqli_fetch_array($supQuery)) { 
		                        $path=$supRow['sup_path'];
		                        $pic=$supRow['sup'];
		                        $name=$supRow['name'];
		                        $title=$supRow['title'];
		                        $id=$supRow['id'];
	                        ?>	
	                        

								<div class="col-md-12 ">
								<div class="radio col-md-2 col-sm-6  form-group">
									<label>
										<input type="radio" class="flat" name="id" value="<?php echo $id ?>">
										Select
									</label>
								</div>														
									<div class="col-md-4 col-sm-6  form-group has-feedback">
										<input type="text" class="form-control has-feedback-left" name="name_<?php echo $id ?>" value="<?php echo $name ?>">
										<span class="fa fa-refresh form-control-feedback left" aria-hidden="true"></span>
									</div>

									<div class="col-md-3 col-sm-6  form-group has-feedback">
										<input type="text" class="form-control" name="title_<?php echo $id ?>" value="<?php echo $title ?>">
										<span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
									</div>

									<div class="col-md-2 col-sm-6  form-group has-feedback">
										<input name="image_<?php echo $id ?>" type="file" accept="image/*" onchange="document.getElementById('img_<?php echo $id; ?>').src = window.URL.createObjectURL(this.files[0])" multiple>
										
									</div>
									<div class="col-md-2 col-sm-6  form-group has-feedback">
										<img id="img_<?php echo $id; ?>" src="../<?php echo $path.$pic; ?>" width="100px" height="100px"/>
									</div>											
								</div>

							<?php } ?> 
						</div>												
							<div class="col-md-4 col-sm-6  form-group has-feedback">
								<button type="submit" class="btn btn-success" name="sup">
									<span class="fa fa-plus"></span> Update Committee
								</button>
							</div>											
						</div> 										
					</form>					

					<form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="proc/proc_gov">
					<div class="card">
						<div class="card-header">
							<div class="header"><h2>Edit Management</h2></div>
						</div>
						<div class="card-body">                
				          <?php
					            $mgtSql="SELECT * FROM mgt";
					            $mgtQuery=mysqli_query($conn,$mgtSql);
					            while ($mgtRow=mysqli_fetch_array($mgtQuery)) { 
		                        $path=$mgtRow['pic_path'];
		                        $pic=$mgtRow['pic'];
		                        $name=$mgtRow['name'];
		                        $title=$mgtRow['title'];
		                        $id=$mgtRow['id'];
	                        ?>	
	                        

								<div class="col-md-12 ">
								<div class="radio col-md-2 col-sm-6  form-group">
									<label>
										<input type="radio" class="flat" name="id" value="<?php echo $id ?>">
										Select
									</label>
								</div>														
									<div class="col-md-4 col-sm-6  form-group has-feedback">
										<input type="text" class="form-control has-feedback-left" name="name_<?php echo $id ?>" value="<?php echo $name ?>">
										<span class="fa fa-refresh form-control-feedback left" aria-hidden="true"></span>
									</div>

									<div class="col-md-3 col-sm-6  form-group has-feedback">
										<input type="text" class="form-control" name="title_<?php echo $id ?>" value="<?php echo $title ?>">
										<span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
									</div>

									<div class="col-md-2 col-sm-6  form-group has-feedback">
										<input name="image_<?php echo $id ?>" type="file" accept="image/*" onchange="document.getElementById('mgt_<?php echo $id; ?>').src = window.URL.createObjectURL(this.files[0])" multiple>
										
									</div>
									<div class="col-md-2 col-sm-6  form-group has-feedback">
										<img id="mgt_<?php echo $id; ?>" src="../<?php echo $path.$pic; ?>" width="100px" height="100px"/>
									</div>											
								</div>

							<?php } ?> 
						</div>												
							<div class="col-md-4 col-sm-6  form-group has-feedback">
								<button type="submit" class="btn btn-success" name="mgt">
									<span class="fa fa-plus"></span> Update Management
								</button>
							</div>											
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
