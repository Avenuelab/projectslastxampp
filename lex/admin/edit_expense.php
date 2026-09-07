<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
$expense = find_by_id('expense',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$expense){
  echo "Missing expense id.";
 echo '<meta http-equiv="refresh" content="2;URL=expense">';
}
?>
<?php
 if(isset($_POST['expense'])){
    $req_fields = array('expense-title','expense-categorie','price' );
    validate_fields($req_fields);

   if(empty($errors)){
       $e_name  = remove_junk($db->escape($_POST['expense-title']));
       $e_cat   = (int)$_POST['expense-categorie'];
       $price   = remove_junk($db->escape($_POST['price']));
       if (is_null($_POST['expense-photo']) || $_POST['expense-photo'] === "") {
         $media_id = '0';
       } else {
         $media_id = remove_junk($db->escape($_POST['expense-photo']));
       }
       $query   = "UPDATE expenses SET";
       $query  .=" name ='{$e_name}',";
       $query  .=" price ='{$price}', categorie_id ='{$e_cat}',media_id='{$media_id}'";
       $query  .=" WHERE id ='{$expense['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 echo "Product updated ";
                 echo '<meta http-equiv="refresh" content="2;URL=expense">';
               } else {
                 echo 'Sorry failed to updated!';
                  echo '<meta http-equiv="refresh" content="2;URL=edit_expense">';
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_expense.php?id='.$expense['id'], false);
   }

 }

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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit expense</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New expense</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_expense.php?id=<?php echo (int)$expense['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="expense-title" value="<?php echo remove_junk($expense['name']);?>">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="expense-categorie">
                    <option value=""> Select a categorie</option>
                   <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($expense['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['name']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 
                  <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">price</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                       <input type="number" class="form-control" name="price" value="<?php echo remove_junk($expense['price']);?>">
                       <span class="input-group-addon">.00</span>
                    </div>
                   </div>
                  </div>
               </div>
              </div>
              <button type="submit" name="expense" class="btn btn-danger">Update</button>
          </form>
         </div>
        </div>
      </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../temp/footer.php'?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
