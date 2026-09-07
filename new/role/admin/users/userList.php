<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
  $adminUsers = getAdminUsers();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>UserAccounts - Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
  </head>
  <body>
    <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
    <div class="container body">
      <div class="main_container">
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <div class="clearfix"></div>
            <div class="card-box">
              <div class="card-body">
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
            </div>
            
          </div>
          <!-- /do not touch -->   
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
  <script type="text/javascript" src="../../assets/js/display_profile_image.js"></script>

    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
  <script src="../../../assets/plugins/popper/popper.js"></script>
  <script src="../../../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
  <script src="../../../assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
  <script src="../../../assets/plugins/jquery-validation/js/additional-methods.min.js"></script>
  <script src="../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="../../../assets/plugins/feather/feather.min.js"></script>    
    <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <script src="../../../assets/plugins/flatpicker/js/flatpicker.min.js"></script>
  <script src="../../../assets/js/pages/date-time/date-time.init.js"></script>
 <!-- steps -->
  <script src="../../../assets/plugins/steps/jquery.steps.js"></script>
  <script src="../../../assets/js/pages/steps/steps-data.js"></script>    
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
  <!-- end js include path -->

</body>

</html>
