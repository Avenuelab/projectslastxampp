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

    <title>Prormcoh</title>

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
              <a href="../index.php" class="site_title"><i class="fa fa-paw"></i> <span>Prormcoh</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
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
      					<h3></h3>
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
            </nav>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_loan.php">
                          <div class="card" id="fosa">
                            <div class="card-header">
                              <div class="header"> FOSA LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $foSql="SELECT * FROM fosa_loan";
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
                                <textarea class="form-control" name="fosa_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-4 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="fosa">
                                  <span class="fa fa-plus"></span> Update FOSA
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>
                    <!-- Start Card festive -->
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_festive.php">
                          <div class="card" id="festive">
                            <div class="card-header">
                              <div class="header"> DD/CHRISTMAS LOAN</div>
                            </div>
                            <div class="card-body">

                              <?php
                                $feSql="SELECT * FROM fosa_festive";
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
                                <textarea class="form-control" name="festive_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="festive">
                                  <span class="fa fa-plus"></span> Update Festive
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card Festive -->
                      </form>
                    </div>

                   </div> <!-- end row -->
                   <hr/>
                   <div class="row">
                      <div class="col-md-5 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_dev.php">
                          <div class="card" id="devt">
                            <div class="card-header">
                              <div class="header"> FOSA DEVELOPMENT LOAN</div>
                            </div>
                            <div class="card-body">
                            <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;<label><b>Description</b></label>
                              <?php
                                $devSql="SELECT * FROM fosa_devt";
                                $devQuery=mysqli_query($conn,$devSql);
                                while ($devRow=mysqli_fetch_array($devQuery)) { 
                                  $id=$devRow['id'];
                                  $description=$devRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              
                            </div>                            
                              <div class="col-md-8 col-sm-4  form-group ">
                                <textarea class="form-control" name="dev_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="dev">
                                  <span class="fa fa-plus"></span> Update devt
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                      <div class="col-md-7 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_express.php">
                          <div class="card" id="express">
                            <div class="card-header">
                              <div class="header"> EXPRESS LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Description</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Special</b></label>
                              <?php
                                $exSql="SELECT * FROM fosa_express";
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
                                <textarea class="form-control" name="express_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
                              <div class="col-md-5 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="special_<?php echo $id ?>" ><?php echo $special ?></textarea>
                               
                              </div>
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="express">
                                  <span class="fa fa-plus"></span> Update Festive
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                   </div> <!-- end row -->
                   <hr/>
                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_advance.php">
                          <div class="card" id="advance">
                            <div class="card-header">
                              <div class="header"> FOSA SALARY ADVANCE</div>
                            </div>
                            <div class="card-body">
                            <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;<label><b>Description</b></label>
                              <?php
                                $advSql="SELECT * FROM fosa_advance";
                                $advQuery=mysqli_query($conn,$advSql);
                                while ($advRow=mysqli_fetch_array($advQuery)) { 
                                  $id=$advRow['id'];
                                  $description=$advRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
    
                            </div>                            
                              <div class="col-md-8 col-sm-4  form-group ">
                                <textarea class="form-control" name="advance_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="advance">
                                  <span class="fa fa-plus"></span> Update Advance
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_sos.php">
                          <div class="card" id="sos">
                            <div class="card-header">
                              <div class="header"> SOS LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Description</b></label>
                              <?php
                                $sosSql="SELECT * FROM fosa_sos";
                                $sosQuery=mysqli_query($conn,$sosSql);
                                while ($sosRow=mysqli_fetch_array($sosQuery)) { 
                                  $id=$sosRow['id'];
                                  $description=$sosRow['description'];
                                 
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-5 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="sos_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>

                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="sos">
                                  <span class="fa fa-plus"></span> Update SOS
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                   </div> <!-- end row -->
                   <hr/>
                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_major.php">
                          <div class="card" id="major">
                            <div class="card-header">
                              <div class="header"> FOSA MAJOR LOAN</div>
                            </div>
                            <div class="card-body">
                            <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;<label><b>Description</b></label>
                              <?php
                                $maSql="SELECT * FROM fosa_major";
                                $maQuery=mysqli_query($conn,$maSql);
                                while ($maRow=mysqli_fetch_array($maQuery)) { 
                                  $id=$maRow['id'];
                                  $description=$maRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
    
                            </div>                            
                              <div class="col-md-8 col-sm-4  form-group ">
                                <textarea class="form-control" name="major_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="major">
                                  <span class="fa fa-plus"></span> Update Major
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_beba.php">
                          <div class="card" id="beba">
                            <div class="card-header">
                              <div class="header"> BEBABEBA LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Description</b></label>
                              <?php
                                $bebaSql="SELECT * FROM fosa_beba";
                                $bebaQuery=mysqli_query($conn,$bebaSql);
                                while ($bebaRow=mysqli_fetch_array($bebaQuery)) { 
                                  $id=$bebaRow['id'];
                                  $description=$bebaRow['description'];
                                 
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-8 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="beba_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>

                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="beba">
                                  <span class="fa fa-plus"></span> Update Beba
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                   </div> <!-- end row -->

                   <hr/>
                   <div class="row">
                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_biashara.php">
                          <div class="card" id="biashara">
                            <div class="card-header">
                              <div class="header"> FOSA BIASHARA LOAN</div>
                            </div>
                            <div class="card-body">
                            <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;<label><b>Description</b></label>
                              <?php
                                $biSql="SELECT * FROM fosa_biashara";
                                $biQuery=mysqli_query($conn,$biSql);
                                while ($biRow=mysqli_fetch_array($biQuery)) { 
                                  $id=$biRow['id'];
                                  $description=$biRow['description'];
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
    
                            </div>                            
                              <div class="col-md-8 col-sm-4  form-group ">
                                <textarea class="form-control" name="bi_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>
   
                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="biashara">
                                  <span class="fa fa-plus"></span> Update Biashara
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
                      </form>
                    </div>

                      <div class="col-md-6 col-sm-12  ">
                          <form method="POST" action="proc/proc_fosa_overdraft.php">
                          <div class="card" id="overdraft">
                            <div class="card-header">
                              <div class="header"> OVERDRAFT LOAN</div>
                            </div>
                            <div class="card-body">
                              <label ><b>Select</b></label>&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;<label><b>Description</b></label>
                              <?php
                                $overSql="SELECT * FROM fosa_overdraft";
                                $overQuery=mysqli_query($conn,$overSql);
                                while ($overRow=mysqli_fetch_array($overQuery)) { 
                                  $id=$overRow['id'];
                                  $description=$overRow['description'];
                                 
                              ?>
   
                            <div class="col-md-12 ">
                            <div class="radio col-md-2 col-sm-6  form-group">
                              <label>
                                <input type="radio" class="flat" name="id" value="<?php echo $id ?>">
                                
                              </label>
                            </div>                            
                              <div class="col-md-8 col-sm-8  form-group has-feedback">
                                <textarea class="form-control" name="over_<?php echo $id ?>" ><?php echo $description ?></textarea>
                               
                              </div>

                            </div>
                           <?php } ?>        
                          </div>
                          <div class="card-footer">
                              <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success" name="overdraft">
                                  <span class="fa fa-plus"></span> Update Overdraft
                                </button>
                              </div>                          
                          </div>
                        </div><!-- end Card FOSA -->
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
