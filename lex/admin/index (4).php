<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

$c_categorie     = count_by_id('categories');
$c_product       = count_by_id('products');
$c_sale          = count_by_id('sales');
$c_user          = count_by_id('users');
$products_sold   = find_higest_saleing_product('10');
$recent_products = find_recent_product_added('5');
$recent_sales    = find_recent_sale_added('5');

$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
  
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
  
}else{
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
        <!-- Info boxes -->
        <br>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-lime elevation-1"><i class="fas fa-cog"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">
                <?php  echo $c_user['total']; ?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-indigo elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Categories</span>
                <span class="info-box-number"><?php  echo $c_categorie['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
  
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number"> <?php  echo $c_sale['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number"><?php  echo $c_product['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <div class="row">
          <div class="col-md-12">
            <!--<div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Performance Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
            </div>--->
              <!-- /.card-header -->
              <!--<div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Performance: 1 Jan , <?php echo date('Y') ?> - 31 Dec, <?php echo date('Y') ?></strong>
                    </p>

                    <div class="position-relative mb-4">
                      <!-- Sales Chart Canvas 
                      <canvas id="areaChart" style="height: 150px;"></canvas>
                    </div>
                    <!-- /.chart-responsive 
                  </div>
        
                </div>--->
                <!-- /.row -->            
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          <div class="card">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>
                      <span class="glyphicon glyphicon-th"></span>
                      <span>Highest Selling Products</span>
                    </strong>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed">
                      <thead>
                      <tr>
                        <th>Title</th>
                        <th>Total Sold</th>
                        <th>Total Quantity</th>
                      <tr>
                      </thead>
                      <tbody>
                        <?php foreach ($products_sold as  $product_sold): ?>
                          <tr>
                            <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                            <td><?php echo (int)$product_sold['totalSold']; ?></td>
                            <td><?php echo (int)$product_sold['totalQty']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>LATEST SALES</span>
                      </strong>
                    </div>
                    <div class="panel-body">
                      <table class="table table-striped table-bordered table-condensed">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">#</th>
                      <th>Product Name</th>
                      <th>Date</th>
                      <th>Total Sale</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($recent_sales as  $recent_sale): ?>
                    <tr>
                      <td class="text-center"><?php echo count_id();?></td>
                      <td>
                        <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                        <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                      </a>
                      </td>
                      <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                      <td>ksh<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                    </tr>

                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
              </div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>
                      <span class="glyphicon glyphicon-th"></span>
                      <span>Recently Added Products</span>
                    </strong>
                  </div>
                  <div class="panel-body">

                    <div class="list-group">
                  <?php foreach ($recent_products as  $recent_product): ?>
                        <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>">
                            <h4 class="list-group-item-heading">
                            <?php if($recent_product['media_id'] === '0'): ?>
                                <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                              <?php else: ?>
                              <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                            <?php endif;?>
                            <?php echo remove_junk(first_character($recent_product['name']));?>
                              <span class="label label-warning pull-right">
                            ksh<?php echo (int)$recent_product['sale_price']; ?>
                              </span>
                            </h4>
                            <span class="list-group-item-text pull-right">
                            <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
                          </span>
                      </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>

          </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
     
   
 
   
   
    
            

    
        

              
   
        
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>


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