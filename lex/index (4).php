<?php include("role/config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <style>
  body {
 background-image: url("images/1.jpeg");
 background-color: #cccccc;
}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
    
    
	
	<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card col-lg-12">
		
		<div class="card-body"  >
          <div class="row">
        <div class="col-lg-6">    
			<div class="card">
              <div class="card-body">
                <h2 >Introduction</h2>

                <p class="card-text">
Lab Avenue Management systems efficiently track, manage, and optimize your inventory with our powerful, easy-to-use Inventory Management System – streamline operations, reduce costs, and scale your business effortlessly.</p>
<p class="card-text">Key Features: Real-time inventory tracking, automated stock alerts, detailed reporting & analytics, seamless multi-location management and easy integration with existing systems – all designed to simplify your inventory management.
                </p>
              </div>
            </div>		 
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h2 >Sales Details</h2>

                <p class="card-text">
View Sales details including sales reports and sales category.</p>
<p class="card-text"></p>
<p class="card-text"> 
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h2 >Charts and Reports</h2>

                <p class="card-text">
                 View detailed charts and see how your sold products and most sold products are changing month to month.</p>
				<p class="card-text"> You can also view cash flow reports and profit/loss statements.</p>
				<p class="card-text">This will allow you to instantly see your business performance take informed decisions.
                </p>

              </div>
            </div>	
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h2 >Staff Management</h2>

                <p class="card-text">
                 Now you can manage your staff like an enterprise! You can assign duties to your staff and give them roles such as User, Super admin and Adminstrator. </p>
				<p class="card-text"> You can set permissions for each staff role and control what pages they can see and the branches they can operate in the admin area.</p>
				

              </div>
            </div>	
		</div>
		<!-- /.col-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h2 class="m-0">Features</h2>
              </div>
              <div class="card-body">
                <h4 >Products</h4>

                <p class="card-text">
				<ul>
					<li>Only Categories are needed to add products </li>
					<li>Upload picture and files if any</li>
					<li>Add details suchas Product Quantity, Buying price and Selling price</li>

				</ul>				
				</p>
                
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h4 class="m-0">Sales</h4>
              </div>
              <div class="card-body">
				<p class="card-text">
					<ul>
						<li>Choose Product </li>
						<li>Add order Quantity</li>
						<li>Add payment selection getaway</li>
						<li>Proceed to Pay</li>
						<li>Validate Payment</li>
					</ul>
				</p>
 
              </div>
            </div>
			
            <div class="card">
              <div class="card-header">
                <h2 class="m-0">Features</h2>
              </div>
              <div class="card-body">
                <h4 >Expenses</h4>

                <p class="card-text">
				<ul>
					<li>Select Expense Category</li>
					<li>Add Expense Description</li>
					<li>Add Expense Amount</li>
					<li>Manage all Expenses</li>
				</ul>				
				</p>
                
              </div>
            </div>			
          </div>
          <!-- /.col-md-6 -->
		</div>
		<!-- /.row-->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
	<?php include_once 'temp/footer.php'?>
 
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>