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
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Prormcoh</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
     <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
                            <h3>Edit Savings</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                       <div class="module">
              <div class="module-head">
                <h3>Pending Orders</h3>
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

              
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display table-responsive" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> Name</th>
                      <th width="50">Email /Contact no</th>
                      <th>Shipping Address</th>
                      <th>Product </th>
                      <th>Qty </th>
                      <th>Amount </th>
                      <th>Order Date</th>
                      <th>Action</th>
                      
                    
                    </tr>
                  </thead>
                
<tbody>
<?php 
$status='Delivered';
$query=mysqli_query($conn,"select user.name as username,user.email as useremail,user.contactno as usercontact,user.shippingAddress as shippingaddress,user.shippingCity as shippingcity,user.shippingState as shippingstate,user.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join user on  orders.userId=user.id join products on products.id=orders.productId where orders.  orderStatus!='$status' or orders.orderStatus is null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                    
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($row['username']);?></td>
<td><?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></td>
<td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></td>
                      <td><?php echo htmlentities($row['productname']);?></td>
                      <td><?php echo htmlentities($row['quantity']);?></td>
                      <td><?php echo htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']);?></td>
                      <td><?php echo htmlentities($row['orderdate']);?></td>
                      <td><a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" class="btn btn-warning btn-action" >Edit</a>
                      </td>
                      </tr>

                    <?php $cnt=$cnt+1; } ?>
                    </tbody>
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

