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

    <title>PRORMCOH</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index.php ?>" class="site_title"><i class="fa fa-paw"></i> <span>PRORMCOH</span></a>
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
							<h3>Edit Home page</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit slider</small></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="proc/index_proc.php">
                    <?php
                    $i=0;
                    $slide_sql="SELECT * FROM gallery";
                    $gal=mysqli_query($conn,$slide_sql);
                    while ($row=mysqli_fetch_array($gal)) { 
                        $path=$row['pic_path'];
                        $pic=$row['pic'];
                        $welcome=$row['welcome'];
                        $big_ad=$row['big_ad'];
                        $id=$row['id'];
                        
                        ?>	
                        

													<div class="col-md-12 ">
													<div class="radio col-md-2 col-sm-6  form-group">
														<label>
															<input type="radio" class="flat" name="id" value="<?php echo $id ?>">
															Select
														</label>
													</div>														
														<div class="col-md-2 col-sm-6  form-group has-feedback">
															<input type="text" class="form-control has-feedback-left" name="welcome_<?php echo $id ?>" value="<?php echo $welcome ?>">
															<span class="fa fa-refresh form-control-feedback left" aria-hidden="true"></span>
														</div>

														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<input type="text" class="form-control" name="slogan_<?php echo $id ?>" value="<?php echo $big_ad ?>">
															<span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
														</div>

														<div class="col-md-2 col-sm-6  form-group has-feedback">
															<input name="image_<?php echo $id ?>" type="file" accept="image/*" onchange="document.getElementById('output_<?php echo $id; ?>').src = window.URL.createObjectURL(this.files[0])" multiple>
															
														</div>
														<div class="col-md-2 col-sm-6  form-group has-feedback">
															<img id="output_<?php echo $id; ?>" src="../<?php echo $path.$pic; ?>" width="100px" height="100px"/>
														</div>											
													</div>

												
 										<?php $i++; } ?> 												
														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<button type="submit" class="btn btn-success" name="update">
																<span class="fa fa-plus"></span> Update Gallery
															</button>
														</div>											
													</div> 										
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--./end slider -->
					<div class="row">
						<div class="col-md-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit boxes bottom slider sticker</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                    <?php
                    $i=0;
                    $hmSql="SELECT * FROM home";
                    $hmQuery=mysqli_query($conn,$hmSql);
                    $rowHm=mysqli_fetch_array($hmQuery); ?>									
									<form method="POST" action="proc/index_proc.php">
										<div class="card">
											<div class="card-body">
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														<input type="text" name="gal_top_1" value="<?php echo $rowHm ['gal_1_top']?>">
													</label>
													<div class="col-md-9 col-sm-9 ">
														<textarea class="resizable_textarea form-control" name="gal_txt_1"><?php echo $rowHm ['gal_1_txt']?></textarea>
													</div>
												</div>
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														<input type="text" name="gal_top_2" value="<?php echo $rowHm ['gal_2_top']?>">
													</label>
													<div class="col-md-9 col-sm-9 ">
														<textarea class="resizable_textarea form-control" name="gal_txt_2" ><?php echo $rowHm ['gal_2_txt']?></textarea>
													</div>
												</div>																									
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														<input type="text" name="gal_top_3" value="<?php echo $rowHm ['gal_3_top']?>">
													</label>
													<div class="col-md-9 col-sm-9 ">
														<textarea class="resizable_textarea form-control" name="gal_txt_3" ><?php echo $rowHm ['gal_3_txt']?></textarea>
													</div>
												</div>

											</div>
											<div class="card-footer">
												<div class="col-md-8 col-sm-6 ">
													<button type="submit" class="btn btn-success" name="gal_update">
														<span class="fa fa-plus"></span> Update Sticker
													</button>
												</div>
											</div>										
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Welcome to Prormcoh Edit</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
							
									<form method="POST" action="proc/index_proc.php">
										<div class="card">
											<div class="card-body">
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														About
													</label>
													<div class="col-md-9 col-sm-9 ">
														<textarea class="resizable_textarea form-control" name="welmsg" rows="15"><?php echo $rowHm ['welcome']?></textarea>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="col-md-8 col-sm-6 ">
													<button type="submit" class="btn btn-success" name="welcome">
														<span class="fa fa-plus"></span> Update Welcome
													</button>
												</div>
											</div>										
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
					<div class="row">
						<div class="col-md-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Products Edit</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
							
									<form method="POST" action="proc/index_proc.php">
										<div class="card">
											<div class="card-body">
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														About
													</label>
													<div class="col-md-9 col-sm-9 ">
														<textarea class="resizable_textarea form-control" name="prdmsg" rows="5"><?php echo $rowHm ['product']?></textarea>
													</div>
												</div>
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Ordinary Savings
													</label>
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdordinary" value="<?php echo $rowHm ['ordinary_saving']?>">
													</div>
												</div>

												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Fanikisha Savings
													</label>
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdfanikisha" value="<?php echo $rowHm ['fanikisha_saving']?>">
													</div>
												</div>
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Group Savings
													</label>													
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdgroup" value="<?php echo $rowHm ['group_saving']?>">
													</div>
												</div>
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Junior Savings
													</label>
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdjunior" value="<?php echo $rowHm ['junior_saving']?>">
													</div>
												</div>

												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Festive Savings
													</label>
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdfestive" value="<?php echo $rowHm ['festive_saving']?>">
													</div>
												</div>
												<div class="col-md-8 col-sm-6  form-group has-feedback">
													<label class="control-label col-md-3 col-sm-3 ">
														Fixed Deposit
													</label>													
													<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" name="prdfixed" value="<?php echo $rowHm ['fixed_saving']?>">
													</div>
												</div>

											</div>
											<div class="card-footer">
												<div class="col-md-8 col-sm-6 ">
													<button type="submit" class="btn btn-success" name="product">
														<span class="fa fa-plus"></span> Update product
													</button>
												</div>
											</div>										
										</div>
									</form>


									
								</div>
							</div>
						</div>
				</div>

			</div><!-- dont touch -->

		</div>
			<!-- /page content -->


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright Lab Avenue
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
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>

</body>
</html>
