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
              <a href="../index" class="site_title"><i class="fa fa-paw"></i> <span>Washa Sacco</span></a>
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
							<h3>Edit About page</h3>
						</div>
					</div>
					<div class="clearfix"></div>
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

                    $washaSql="SELECT * FROM washa";
                    $washaQuery=mysqli_query($conn,$washaSql);
                    $rowHm=mysqli_fetch_array($washaQuery); ?>									
										<form enctype="multipart/form-data" method="POST" action="proc/proc_washa">
											<div class="card">
												<div class="card-body">
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Welcome
														</label>
														<div class="col-md-9 col-sm-9 ">
															<textarea class="form-control" name="welcome" rows="10"><?php echo $rowHm ['welcome']?></textarea>
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Welcome Bottom
														</label>
														<div class="col-md-9 col-sm-9 ">
															<textarea class="form-control" name="welcome1" rows="10"><?php echo $rowHm ['welcome1']?></textarea>
														</div>
													</div>	
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Welcome Photo
														</label>														
														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<input name="welpic" type="file" accept="image/*" onchange="document.getElementById('welpic').src = window.URL.createObjectURL(this.files[0])" multiple>
															
														</div>
														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<img id="welpic" src="../<?php echo $rowHm ['welpic_path'].$rowHm ['welpic']; ?>" width="100px" height="100px"/>
														</div>
													</div>	
												</div>
												<div class="card-footer">
													<div class="col-md-8 col-sm-6 ">
														<button type="submit" class="btn btn-success" name="welcome_update">
															<span class="fa fa-plus"></span> Update Welcome
														</button>
													</div>
												</div>												
											</div>
											</form>
											<form enctype="multipart/form-data" method="POST" action="proc/proc_value">																																															
											<div class="card">
												<div class="card-body">
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Vision
														</label>
														<div class="col-md-9 col-sm-9 ">
															<textarea class="resizable_textarea form-control" name="vision" ><?php echo $rowHm ['vision']?></textarea>
														</div>
													</div>																									
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Mission
														</label>
														<div class="col-md-9 col-sm-9 ">
															<textarea class="resizable_textarea form-control" name="mission" ><?php echo $rowHm ['mission']?></textarea>
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Objective
														</label>
														<div class="col-md-9 col-sm-9 ">
															<textarea class="resizable_textarea form-control" name="obj" ><?php echo $rowHm ['objective']?></textarea>
														</div>
													</div>																									
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value1
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val1" class="form-control" value="<?php echo $rowHm ['value1']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value2
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val2" class="form-control" value="<?php echo $rowHm ['value2']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value3
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val3" class="form-control" value="<?php echo $rowHm ['value3']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value4
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val4" class="form-control" value="<?php echo $rowHm ['value4']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value5
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val5" class="form-control" value="<?php echo $rowHm ['value5']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value6
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="val6" class="form-control" value="<?php echo $rowHm ['value6']?>">
														</div>
													</div>	

													<div class="col-md-8 col-sm-6  form-group has-feedback"><h3>Statistics</h3>		
														<label class="control-label col-md-3 col-sm-3 ">
															<input type="number" name="memcount" class="form-control" value="<?php echo $rowHm ['memcount']?>">
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="member" class="form-control" value="<?php echo $rowHm ['member']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															<input type="number" name="procount" class="form-control" value="<?php echo $rowHm ['procount']?>">
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="project" class="form-control" value="<?php echo $rowHm ['project']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															<input type="number" name="awardcount" class="form-control" value="<?php echo $rowHm ['awardcount']?>">
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="award" class="form-control" value="<?php echo $rowHm ['award']?>">
														</div>
													</div>
												
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															<input type="number" name="satisfycount" class="form-control" value="<?php echo $rowHm ['satisfycount']?>">
														</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" name="satisfy" class="form-control" value="<?php echo $rowHm ['satisfy']?>">
														</div>
													</div>
													<div class="col-md-8 col-sm-6  form-group has-feedback">
														<label class="control-label col-md-3 col-sm-3 ">
															Value Photo
														</label>														
														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<input name="valpic" type="file" accept="image/*" onchange="document.getElementById('welimg').src = window.URL.createObjectURL(this.files[0])" multiple>
															
														</div>
														<div class="col-md-4 col-sm-6  form-group has-feedback">
															<img id="welimg" src="../<?php echo $rowHm ['valpic_path'].$rowHm ['valpic']; ?>" width="100px" height="100px"/>
														</div>
												</div>
												<div class="card-footer">
													<div class="col-md-8 col-sm-6 ">
														<button type="submit" class="btn btn-success" name="washa_update">
															<span class="fa fa-plus"></span> Update Values
														</button>
													</div>
												</div>
											</div>
										</div>												
										</form>
								<div class="card">
									<div class="card-header">
										<h3>Select one option to Edit</h3>
									</div>
									<div class="card-body">
										<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="proc/proc_partner">
			                    <?php
			                    $i=0;
			                    $slide_sql="SELECT * FROM partner";
			                    $gal=mysqli_query($conn,$slide_sql);
			                    while ($row=mysqli_fetch_array($gal)) { 
			                        $path=$row['pic_path'];
			                        $pic=$row['pic'];
			                        $link=$row['link'];
			                        $id=$row['id'];
			                        
			                        ?>	
																<div class="col-md-12 ">
																<div class="radio col-md-2 col-sm-6  form-group">
																	<label>
																		<input type="radio" class="flat" name="id" value="<?php echo $id ?>">
																		Select
																	</label>
																</div>														

																	<div class="col-md-4 col-sm-6  form-group has-feedback">
																		<input type="text" class="form-control" name="link_<?php echo $id ?>" value="<?php echo $link ?>">
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
																		<button type="submit" class="btn btn-success" name="update_partner">
																			<span class="fa fa-plus"></span> Update Partner
																		</button>
																	</div>											
																								
												</form>
												</div> 		
											</div>
										</div>												
								
							</div>
						</div>
				</div>
				</div>
			</div>


			</div><!-- dont touch -->
		</div><!-- /page content -->
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