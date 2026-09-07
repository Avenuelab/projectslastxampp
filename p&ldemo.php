<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

// Ensure the database connection is established
if (isset($pdo)) {
    // Initialize variables
    $role = htmlentities($_SESSION['user']['role_id']);
    $total_income = 0;
    $total_expenses = 0;
    $net_profit_loss = 0;
    $combined_totals = [];

    if ($role > 1) {
        echo '<h1 style="color: #FF0;">You have no Rights to access this page.</h1>';
        echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
    } else {
        // Fetch sales grouped by category and month
        $sales_query = $pdo->query("
            SELECT 
                p.categorie_id, 
                c.name AS category_name, 
                DATE_FORMAT(s.date, '%Y-%m') AS month, 
                SUM(s.price) AS total 
            FROM 
                sales s 
            JOIN 
                products p ON s.product_id = p.id 
            JOIN 
                categories c ON p.categorie_id = c.id 
            GROUP BY 
                p.categorie_id, month
        ");
        $sales_data = $sales_query->fetchAll(PDO::FETCH_ASSOC);

        // Prepare sales data for summary
        foreach ($sales_data as $row) {
            $combined_totals[$row['month']]['sales'][$row['categorie_id']] = [
                'categoru_name' => $row['category_name'],
                'total' => (float)$row['total']
            ];
        }

        // Fetch expenses grouped by category and month
        $expenses_query = $pdo->query("
            SELECT 
                ec.categorie_id, 
                c.name AS category_name, 
                DATE_FORMAT(e.ex_date, '%Y-%m') AS month, 
                SUM(e.amount) AS total 
            FROM 
                expense e 
            JOIN 
                expense_cat ec ON e.id = ec.expense_id 
            JOIN 
                categories c ON ec.categorie_id = c.id 
            GROUP BY 
                ec.categorie_id, month
        ");
        $expenses_data = $expenses_query->fetchAll(PDO::FETCH_ASSOC);

        // Prepare expenses data for summary
        foreach ($expenses_data as $row) {
            $combined_totals[$row['month']]['expenses'][$row['categorie_id']] = [
                'category_name' => $row['category_name'],
                'total' => (float)$row['total']
            ];
        }

        // Calculate overall totals for summary
        foreach ($combined_totals as $month => $totals) {
            $total_income += array_sum(array_column($totals['sales'] ?? [], 'total'));
            $total_expenses += array_sum(array_column($totals['expenses'] ?? [], 'total'));
        }
        $net_profit_loss = $total_income - $total_expenses;
    }
} else {
    // Handle the case where the database is not connected
    // Initialize variables and retrieve data as needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Profit and Loss Report</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <h1>Profit and Loss Summary</h1>
                <table class="table">
                    <tr>
                        <th>Total Income</th>
                        <td class="text-right"><?php echo number_format($total_income, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Total Expenses</th>
                        <td class="text-right"><?php echo number_format($total_expenses, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Net Profit/Loss</th>
                        <td class="text-right"><?php echo number_format($net_profit_loss, 2); ?></td>
                    </tr>
                </table>

                <h1>Income and Expenses by Month</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Income</h4>
                        <table class="table">
                            <tr>
                                <th>Month</th>
                                <th>Category</th>
                                <th>Total Income</th>
                            </tr>
                            <?php foreach ($combined_totals as $month => $totals): ?>
                                <?php if (isset($totals['sales'])): ?>
                                    <?php foreach ($totals['sales'] as $sale): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($month); ?></td>
                                            <td><?php echo htmlspecialchars($sale['category_name']); ?></td>
                                            <td class="text-right"><?php echo number_format($sale['total'], 2); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h4>Expenses</h4>
                        <table class="table">
                            <tr>
                                <th>Month</th>
                                <th>Category</th>
                                <th>Total Expenses</th>
                            </tr>
                            <?php foreach ($combined_totals as $month => $totals): ?>
                                <?php if (isset($totals['expenses'])): ?>
                                    <?php foreach ($totals['expenses'] as $expense): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($month); ?></td>
                                            <td><?php echo htmlspecialchars($expense['category_name']); ?></td>
                                            <td class="text-right"><?php echo number_format($expense['total'], 2); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>

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
</body>
</html>