<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
  $adminUsers = getAdminUsers();
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Financial System</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=".../../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
<div class="wrapper">
<?php include_once '../../../temp/rightnav.php'?>
<?php include_once '../../../temp/sidemenu.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  <div class="col-md-8 col-md-offset-2">
    <a href="userForm.php" class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span>
      Create new user
    </a>
    <hr>
    <h1 class="text-center">Admin Users</h1>
    <br />
    <?php if (isset($users)): ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>N</th>
            <th>Username</th>
            <th>Role</th>
            <th colspan="2" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($adminUsers as $key => $value): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td><?php echo $value['username'] ?></td>
              <td><?php echo $value['role']; ?></td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?edit_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <h2 class="text-center">No users in database</h2>
    <?php endif; ?>
  </div>
   </div><!--/. container-fluid -->
   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
	<?php include_once '../../../temp/footer.php'?>
 
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script type="text/javascript" src="../../assets/js/display_profile_image.js"></script>
</body>
</html>