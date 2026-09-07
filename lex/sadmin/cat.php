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
    $all_categories = find_all('categories');
  
     if(isset($_POST['add_cat'])){
       $req_field = array('categorie-name');
       validate_fields($req_field);
       $cat_name = remove_junk($db->escape($_POST['categorie-name']));
       if(empty($errors)){
          $sql  = "INSERT INTO categories (name)";
          $sql .= " VALUES ('{$cat_name}')";
          if($db->query($sql)){
            $msg="Successfully Added New Category";
            redirect('categorie.php',false);
          } else {
            $msg=("Sorry Failed to insert.");
            redirect('categorie.php',false);
          }
       } else {
         $msg=($errors);
         redirect('categorie.php',false);
       }
     }

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Engaged Credit|Taraknishi Financial System</title>
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
              
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo($msg); ?>
                          </div>
                        </div> 
                        <div class="row">
                        <div class="col-md-5">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>Add New Category</span>
                            </strong>
                            </div>
                            <div class="panel-body">
                              <form method="post" action="categorie.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="categorie-name" placeholder="Category Name">
                                </div>
                                <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
                            </form>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <strong>
                              <span class="glyphicon glyphicon-th"></span>
                              <span>All Categories</span>
                          </strong>
                          </div>
                            <div class="panel-body">
                              <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Categories</th>
                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($all_categories as $cat):?>
                                    <tr>
                                        <td class="text-center"><?php echo count_id();?></td>
                                        <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                                        <td class="text-center">
                                          <div class="btn-group">
                                            <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                              <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                                              <span class="fa fa-trash"></span>
                                            </a>
                                          </div>
                                        </td>

                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
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