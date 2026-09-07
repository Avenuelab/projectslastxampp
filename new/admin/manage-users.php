<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
include_once '../_inc/connect.php';
if(isset($_GET['del']))
      {
              mysqli_query($conn,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
      }
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
              <a href="../admin/index.php" class="site_title"><i class="fa fa-paw"></i> <span>Prormcoh</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
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
                           

                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                      <div class="module">
              <div class="module-head">
                <h3>Manage Users</h3>
              </div>
              <div class="module-body table">
  <?php if(isset($_GET['del']))
{?>
                  <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                  </div>
<?php } ?>

                  <br />

              
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> Name</th>
                      <th>Email </th>
                      <th>Contact no</th>
                      <th>Shippping Address/City/State/Pincode </th>
                      <th>Billing Address/City/State/Pincode </th>
                      <th>Reg. Date </th>
                    
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($conn,"select * from user");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($row['name']);?></td>
                      <td><?php echo htmlentities($row['email']);?></td>
                      <td> <?php echo htmlentities($row['contactno']);?></td>
                      <td><?php echo htmlentities($row['shippingAddress'].",".$row['shippingCity'].",".$row['shippingState']."-".$row['shippingPincode']);?></td>
                      <td><?php echo htmlentities($row['billingAddress'].",".$row['billingCity'].",".$row['billingState']."-".$row['billingPincode']);?></td>
                      <td><?php echo htmlentities($row['regDate']);?></td>
                      
                    <?php $cnt=$cnt+1; } ?>
                    
                </table>
              </div>
            </div>  


 
                    </div>
                </div>
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
    $(document).ready(function() {
      $('.datatable-1').dataTable();
      $('.dataTables_paginate').addClass("btn-group datatable-pagination");
      $('.dataTables_paginate > a').wrapInner('<span />');
      $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
  </script>
  </body>
</html>
</body>
<?php  ?>
