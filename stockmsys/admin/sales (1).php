<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
  
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
  
}else{
    $msg='';
    $sales = find_all_sale();

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Inventory System</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

<?php include_once '../temp/rightnav.php'?>
<?php include_once '../temp/sidemenu.php'?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
       
            <div class="row">
            <div class="col-md-12">
            
                <?php echo ($msg); ?>
                         
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>All Sales</span>
                            </strong>
                            <div class="pull-right">
                                <a href="add_sale.php" class="btn btn-primary">Add sale</a>
                            </div>
                            </div>
                            <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th> Product name </th>
                                    <th class="text-center" style="width: 15%;"> Quantity</th>
                                    <th class="text-center" style="width: 15%;"> Total </th>
                                    <th class="text-center" style="width: 15%;"> Date </th>
                                    <th class="text-center" style="width: 100px;"> Actions </th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php foreach ($sales as $sale):?>
                                <tr>
                                <td class="text-center"><?php echo count_id();?></td>
                                <td><?php echo remove_junk($sale['name']); ?></td>
                                <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                                <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
                                <td class="text-center"><?php echo $sale['date']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="edit_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                                        <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="delete_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                        <span class="fa fa-trash"></span>
                                        </a>
                                    </div>
                                </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                                                                                                            
                    </div>
                </div>
            


            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--Container row -->
    </div>

</div>
<!-- /.content-wrapper -->



  <!-- Main Footer -->
  <?php include_once '../temp/footer.php'?>
 <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>   
</body>
</html>
<?php } ?>