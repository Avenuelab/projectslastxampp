<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <?php include_once '../temp/rightnav.php'; ?>
    <?php include_once '../temp/sidemenu.php'; ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Approval</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Approve Products</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $SQLapprove = "SELECT * FROM products WHERE approve=0";
                            $AppQuery = mysqli_query($conn, $SQLapprove);	

                            while ($Approw = mysqli_fetch_array($AppQuery)) {
                            ?>
                            <tr>
                                <form method="post" action="app_proc.php">
                                    <input type="hidden" name="val" value="<?php echo $Approw['id']?>">	
                                    <td><?php echo $Approw['id']; ?></td>
                                    <td><?php echo $Approw['name']; ?></td>
                                    <td><?php echo $Approw['quantity']; ?></td>
                                    <td><?php echo number_format($Approw['buy_price'], 2); ?></td>
                                    <td><?php echo number_format($Approw['sale_price'], 2); ?></td>
                                    <td>
                                        <button type="submit" name="save" class="btn btn-success">Approve</button>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <?php include_once '../temp/footer.php'; ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>