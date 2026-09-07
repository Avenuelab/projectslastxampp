<?php include('config.php'); 

?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>UserAccounts - Login</title>

  <!-- style -->
  <link rel="stylesheet" href="../assets/css/pages/login.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 
  <!-- Custome styles -->
  <link rel="stylesheet" href="assets/css/style.css">
    <!-- style -->
  
</head>
<body>
  <div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">  
            <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
            <div class="container">
              <div class="row">
                <div class="col-md-4 ">
                  <form class="form" action="login.php" method="post">

                    <!-- display form error messages  -->
                    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                    <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                      <label class="control-label">Username or Email</label>
                      <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control">
                      <?php if (isset($errors['username'])): ?>
                        <span class="help-block"><?php echo $errors['username'] ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                      <label class="control-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                      <?php if (isset($errors['password'])): ?>
                        <span class="help-block"><?php echo $errors['password'] ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                    </div>
                    <p>Don't have an account? Contact admin</a></p>
                  </form>
                </div>
              </div>
            </div>
          <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- start js include path -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- bootstrap -->
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- end js include path -->
</body>
</html>