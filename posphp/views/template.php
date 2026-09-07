<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="views/img/template/icono-negro.png">
    
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="views/plugins/iCheck/all.css">
    <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="views/bower_components/morris.js/morris.css">
    
    <!-- JS Plugins -->
    <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="views/dist/js/adminlte.min.js"></script>
    <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="views/plugins/iCheck/icheck.min.js"></script>
    <script src="views/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="views/plugins/jqueryNumber/jquerynumber.min.js"></script>
    <script src="views/bower_components/moment/min/moment.min.js"></script>
    <script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="views/bower_components/raphael/raphael.min.js"></script>
    <script src="views/bower_components/morris.js/morris.min.js"></script>
    <script src="views/bower_components/Chart.js/Chart.js"></script>
</head>

<body class="hold-transition skin-red-light sidebar-collapse sidebar-mini login-page">

<?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "ok"): ?>
    <div class="wrapper">
        <?php include "modules/header.php"; ?>
        <?php include "modules/sidebar.php"; ?>

        <div class="content-wrapper">
            <?php
            $route = $_GET["route"] ?? 'home';
            $validRoutes = ['home', 'users', 'categories', 'products', 'customers', 'sales', 'create-sale', 'edit-sale', 'reports', 'logout'];

            if (in_array($route, $validRoutes)) {
                include "modules/$route.php";
            } else {
                include "modules/404.php";
            }
            ?>
        </div>

        <?php include "modules/footer.php"; ?>
    </div>
<?php else: ?>
    <?php include "modules/login.php"; ?>
<?php endif; ?>

<script src="views/js/template.js"></script>
<script src="views/js/users.js"></script>
<script src="views/js/categories.js"></script>
<script src="views/js/products.js"></script>
<script src="views/js/customers.js"></script>
<script src="views/js/sales.js"></script>
<script src="views/js/reports.js"></script>

</body>
</html>