<?php 
include('../role/config.php'); 
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');  

// Check user role and access control
$role = htmlentities($_SESSION['user']['role_id']); 

if ($role > 1) { 
    echo '<h1 style="color: #FF0;">You have no rights to access this page.</h1>'; 
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">'; 
} else { 
    $msg = ''; 
    // Fetch all expenses
    $all_expenses = find_all('expense'); 
    
    // Fetch all categories
    $all_categories = find_all('categories'); 
    
    // Create an array to map category IDs to category names
    $category_map = [];
    foreach($all_categories as $category) {
        $category_map[$category['id']] = $category['name'];
    }

    // Calculate total expenses
    $total_expenses = 0;
    foreach ($all_expenses as $expense) {
        $total_expenses += $expense['amount'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Expense Summary Report</title>
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
                                    <h3>Expense Summary Report</h3>
                                    <p><strong>Total Expenses: </strong><?php echo number_format($total_expenses, 2); ?></p>
                                    
                                    <!-- Print to Excel Button -->
                                    <button class="btn btn-success mb-3" onclick="exportToExcel()">Print to Excel</button>
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <table id="expenseTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Expense For</th>
                                                        <th>Amount</th>
                                                        <th>Category</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($all_expenses as $expense): ?>
                                                        <tr>
                                                            <td><?php echo htmlentities(remove_junk($expense['ex_date'])); ?></td>
                                                            <td><?php echo htmlentities(remove_junk($expense['expense_for'])); ?></td>
                                                            <td><?php echo htmlentities(remove_junk($expense['amount'])); ?></td>
                                                            <td>
                                                                <?php 
                                                                // Display the category name using the map
                                                                $category_id = $expense['expense_cat'];
                                                                echo htmlentities($category_map[$category_id] ?? 'Unknown');
                                                                ?>
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
                let table = document.getElementById('expenseTable');
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
                downloadLink.download = 'expense_summary_report.csv';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            }
        </script>
    </div>
</body>
</html>

<?php } ?>