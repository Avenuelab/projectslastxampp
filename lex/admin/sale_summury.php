<?php 
include('../role/config.php'); 
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');  

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$role = htmlentities($_SESSION['user']['role_id']); 
if ($role > 1) { 
    echo '<h1 style="color: #FF0;">You have no rights to access this page.</h1>'; 
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
} else { 
    $msg = ''; 

    // Fetch all sales with product and category details using MySQLi
    $query = "SELECT s.*, p.name AS product_name, c.name AS category_name 
              FROM sales s 
              JOIN products p ON s.product_id = p.id 
              JOIN categories c ON p.categorie_id = c.id";
    
    // Execute the query
    $result = $db->query($query); // Assuming $db is your MySQLi connection

    // Check for errors
    if (!$result) {
        die("Database query error: " . $db->error);
    }

    // Fetch all results into an array
    $all_sales = [];
    while ($row = $result->fetch_assoc()) {
        $all_sales[] = $row;
    }

    // Calculate total sales
    $total_sales = 0;
    foreach ($all_sales as $sale) {
        $total_sales += $sale['price']; // Assuming 'price' is the field for sale amount
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sales Summary Report</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include_once '../temp/rightnav.php'; ?>
        <?php include_once '../temp/sidemenu.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo htmlentities($msg); ?>

                            <div class="card">
                                <div class="card-body">
                                    <h3>Sales Summary Report</h3>
                                    <p><strong>Total Sales: </strong><?php echo number_format($total_sales, 2); ?> USD</p>
                                    
                                    <!-- Print to Excel Button -->
                                    <button class="btn btn-success mb-3" onclick="exportToExcel()">Print to Excel</button>
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <table id="salesTable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50px;">#</th>
                                                        <th>Product Name</th>
                                                        <th class="text-center" style="width: 15%;">Quantity</th>
                                                        <th class="text-center" style="width: 15%;">Total</th>
                                                        <th class="text-center" style="width: 15%;">Date</th>
                                                        <th class="text-center" style="width: 15%;">Category</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($all_sales as $sale): ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo count_id(); ?></td>
                                                            <td><?php echo htmlentities(remove_junk($sale['product_name'])); ?></td>
                                                            <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                                                            <td class="text-center"><?php echo htmlentities(remove_junk($sale['price'])); ?></td>
                                                            <td class="text-center"><?php echo htmlentities(remove_junk($sale['date'])); ?></td>
                                                            <td class="text-center"><?php echo htmlentities(remove_junk($sale['category_name'])); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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
            </section>
        </div> 
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include_once '../temp/footer.php'; ?>

        <!-- REQUIRED SCRIPTS -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="../dist/js/adminlte.js"></script>

        <!-- Export to Excel Script -->
        <script>
            function exportToExcel() {
                let table = document.getElementById('salesTable');
                let rows = table.rows;
                let csv = [];

                for (let i = 0; i < rows.length; i++) {
                    let cols = rows[i].querySelectorAll('td, th');
                    let row = [];
                    for (let j = 0; j < cols.length; j++) {
                        row.push(cols[j].innerText);
                    }
                    csv.push(row.join(','));
                }

                // Create a CSV blob
                let csvFile = new Blob([csv.join('\n')], { type: 'text/csv' });
                let downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(csvFile);
                downloadLink.download = 'sales_summary_report.csv';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            }
        </script>
    </div>
</body>
</html>

<?php } ?>