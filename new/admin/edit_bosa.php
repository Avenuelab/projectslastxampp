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
      					<h3>Edit BOSA LOANS</h3>
      				</div>
      			</div>
            <div class="clearfix"></div>
            <nav >
<style>
ul#menu li {
  display:inline;
  padding-right: 20px;
  color: blue;
}
</style>
                    <ul id="menu" style="list-style-type: none;">
                      <li ><a href="#bosa" >BOSA</a></li>
                      <li><a href="#instant" >INSTANT</a></li>
                      <li><a href="#emergency" >EMERGENCY </a></li>
                      <li><a href="#fees" >SCHOOL FEES </a></li>
                      <li><a href="#normal" >NORMAL</a></li>
                      <li><a href="#inua" >INUA </a></li>
                      <li><a href="#fanikisha" >FANIKISHA </a></li>
                    </ul>              
            </nav>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_loan.php">
                          <div class="card" id="bosa">
                            <div class="card-header">
                              <div class="header"> SCHOOL BOSA LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $foSql="SELECT * FROM bosa_fees";
                                $foQuery=mysqli_query($conn,$foSql);
                                while ($foRow=mysqli_fetch_array($foQuery)) { 
                                  $id=$foRow['id'];
                                  $description=$foRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-6 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="bosa_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-4 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="bosa">
                                  <span class="fa fa-plus"></span> Update BOSA
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>
                    <!-- Start Card Normal -->
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_normal.php">
                          <div class="card" id="normal">
                            <div class="card-header">
                              <div class="header"> NORMAL LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $feSql="SELECT * FROM bosa_normal";
                                $feQuery=mysqli_query($conn,$feSql);
                                while ($feRow=mysqli_fetch_array($feQuery)) { 
                                  $id=$feRow['id'];
                                  $description=$feRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-6 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="normal_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="normal">
                                  <span class="fa fa-plus"></span> Update Normal
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Festive -->
                      </form>
                    </div>

                   </div> <!-- end row -->

                   <div class="row">
                      <div class="col-md-7 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_instant.php">
                          <div class="card" id="instant">
                            <div class="card-header">
                              <div class="header"> INSTANT LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Description</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Special</b></label>
                              <?php
                                $exSql="SELECT * FROM fosa_instant";
                                $exQuery=mysqli_query($conn,$exSql);
                                while ($exRow=mysqli_fetch_array($exQuery)) { 
                                  $id=$exRow['id'];
                                  $description=$exRow['description'];
                                  $special=$exRow['special'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-5 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="instant_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
                              <div class="col-md-5 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="special_<?php echo $id ?>" ><?php echo $special ?></textarea>
                               
                              </div>
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="instant">
                                  <span class="fa fa-plus"></span> Update Instant
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Instant BOSA -->
                      </form>
                    </div>
                    <!-- Start Card Normal -->
                      <div class="col-md-5 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_emergency.php">
                          <div class="card" id="emergency">
                            <div class="card-header">
                              <div class="header"> EMERGENCY LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $feSql="SELECT * FROM bosa_emergency";
                                $feQuery=mysqli_query($conn,$feSql);
                                while ($feRow=mysqli_fetch_array($feQuery)) { 
                                  $id=$feRow['id'];
                                  $description=$feRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-6 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="emergency_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="emergency">
                                  <span class="fa fa-plus"></span> Update Emergency
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Festive -->
                      </form>
                    </div>

                   </div> <!-- end row -->

                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_inua.php">
                          <div class="card" id="inua">
                            <div class="card-header">
                              <div class="header"> INUA LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>
                              <?php
                                $exSql="SELECT * FROM bosa_inua";
                                $exQuery=mysqli_query($conn,$exSql);
                                while ($exRow=mysqli_fetch_array($exQuery)) { 
                                  $id=$exRow['id'];
                                  $description=$exRow['description'];
                                
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-5 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="inua_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>

                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="inua">
                                  <span class="fa fa-plus"></span> Update Inua
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Instant BOSA -->
                      </form>
                    </div>
                    <!-- Start Card Normal -->
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_bosa_fanikisha.php">
                          <div class="card" id="fanikisha">
                            <div class="card-header">
                              <div class="header"> FANIKISHA  LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $feSql="SELECT * FROM bosa_fanikisha";
                                $feQuery=mysqli_query($conn,$feSql);
                                while ($feRow=mysqli_fetch_array($feQuery)) { 
                                  $id=$feRow['id'];
                                  $description=$feRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-6 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="fanikisha_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="fanikisha">
                                  <span class="fa fa-plus"></span> Update Fanikisha
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Festive -->
                      </form>
                    </div>

                   </div> <!-- end row -->
 
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
