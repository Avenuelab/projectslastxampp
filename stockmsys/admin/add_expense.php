<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
 if(isset($_POST['add_expense'])){
   $req_fields = array('expense_for','expense_cat','amount' );
   validate_fields($req_fields);
   if(empty($errors)){
     $expense_for  = remove_junk($db->escape($_POST['expense_for']));
     $expense_catagory   = remove_junk($db->escape($_POST['expense_cat']));
     $expense_amount  = remove_junk($db->escape($_POST['amount']));
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $expense_date    = make_date();
     $query  = "INSERT INTO expense (";
     $query .=" expense_for,amount,ex_date,expense_cat";
     $query .=") VALUES (";
     $query .=" '{$expense_for}', '{$expense_amount}', '{$expense_cat}', '{$expense_date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$expense_for}'";
     if($db->query($query)){
       echo "Expense added ";
        echo '<meta http-equiv="refresh" content="2;URL=expense">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=add_expense">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=add_expense">';
   }

 }

?>
<?php
$expense = find_by_id('expense',(int)$_GET['id']);
$all_category = find_all('expense_catagory');
if(!$expense){
  echo "Missing expenset id.";
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
            <h1>Add Expense</h1>
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
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Expense</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_expense.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="expense-title" placeholder="Expense Title">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="expense-category">
                      <option value="">Select Expense Category</option>
                    <?php foreach ($all_category as $expense_catagory): ?>
                      <option value="<?php echo (int)$expense_cat['id']; ?>
                        <?php echo $expense_catagory['name']; ?>>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                     <input type="number" class="form-control" name="amount" placeholder="expense_amount">
                     <span class="input-group-addon">.00</span>
                  </div>
                 </div>
                  
               </div>
              </div>
              <button type="submit" name="add_expense" class="btn btn-danger">Add Expense</button>
          </form>
         </div>
        </div>
      </div>
    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        </div>
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




