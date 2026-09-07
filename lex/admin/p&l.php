<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

// Fetch all categories (shops)
$all_categories = find_all('categories');

// Initialize variables
$total_income = 0;
$total_expenses = 0;
$net_profit_loss = 0;
$combined_totals = [];

if (isset($pdo)) {
    $role = htmlentities($_SESSION['user']['role_id']); 
    
    if ($role > 1) {
        echo '<h1 style="color: #FF0;">You have no Rights to access this page.</h1>';
        echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
    } else {
        // Fetch income (sales) grouped by category (shop) and month
        $sales_query = $pdo->query("
            SELECT DATE_FORMAT(s.date, '%Y-%m') AS month, c.name AS category_name, SUM(s.price) AS total 
            FROM sales s
            JOIN products p ON s.product_id = p.id
            INNER JOIN categories c ON p.categorie_id = c.id
            GROUP BY month, category_name
        ");

        // Fetch expenses grouped by category (shop) and month
        $expenses_query = $pdo->query("
            SELECT DATE_FORMAT(e.ex_date, '%Y-%m') AS month, c.name AS category_name, SUM(e.amount) AS total 
            FROM expense e
            INNER JOIN categories c ON e.expense_cat = c.id
            GROUP BY month, category_name
        ");

        $sales_data = $sales_query->fetchAll(PDO::FETCH_ASSOC);
        $expenses_data = $expenses_query->fetchAll(PDO::FETCH_ASSOC);
        
        // Prepare data for summary
        foreach ($sales_data as $row) {
            $month = $row['month'];
            $category = $row['category_name'];
            $combined_totals[$month]['sales'][$category] = (float)$row['total'];
        }

        foreach ($expenses_data as $row) {
            $month = $row['month'];
            $category = $row['category_name'];
            $combined_totals[$month]['expenses'][$category] = (float)$row['total'];
        }

        // Calculate totals for summary
        $total_income = array_sum(array_map(function($item) {
            return array_sum($item['sales'] ?? []);
        }, $combined_totals));

        $total_expenses = array_sum(array_map(function($item) {
            return array_sum($item['expenses'] ?? []);
        }, $combined_totals));

        $net_profit_loss = $total_income - $total_expenses;
    }
} else {
    // If no database connection, fetch from functions
    $sales = find_all_sale();
    $all_expenses = find_all('expense');

    // Process sales data
    foreach ($sales as $sale) {
        $month = date('Y-M', strtotime($sale['date']));
        $category = $sale['category_name']; // Ensure category name is fetched in your find_all_sale() function
        $combined_totals[$month]['sales'][$category] = (isset($combined_totals[$month]['sales'][$category]) ? $combined_totals[$month]['sales'][$category] : 0) + (float)$sale['price'];
    }

    // Process expenses data
    foreach ($all_expenses as $expense) {
        $month = date('Y-M', strtotime($expense['ex_date']));
        $category = $expense['category_name']; // Ensure category name is fetched in your find_all() function
        $combined_totals[$month]['expenses'][$category] = (isset($combined_totals[$month]['expenses'][$category]) ? $combined_totals[$month]['expenses'][$category] : 0) + (float)$expense['amount'];
    }

    // Calculate totals for summary
    $total_income = array_sum(array_map(function($item) {
        return array_sum($item['sales'] ?? []);
    }, $combined_totals));

    $total_expenses = array_sum(array_map(function($item) {
        return array_sum($item['expenses'] ?? []);
    }, $combined_totals));

    $net_profit_loss = $total_income - $total_expenses;
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
                    <h1 class="m-0 text-dark">Profit and Loss Report (by Category/Shop)</h1>
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

                <!-- Buttons for Sales and Expense Summary -->
                <div class="text-right mb-3">
                    <a href="sale_summury.php" class="btn btn-primary">Sales Summary</a>
                    <a href="expense_sumrpt.php" class="btn btn-secondary">Expense Summary</a>
                </div>

                <!---<h1>Income and Expenses by Month (Category/Shop)</h1>-->
                <!--<div class="row">

                    <!-- Income Section 
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Income (by Shop)</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Category (Shop)</th>
                                            <th>Total Income</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($combined_totals as $month => $totals): ?>
                                            <?php foreach ($all_categories as $category): ?>
                                                <?php 
                                                    $category_name = $category['name'];
                                                    $total_income = isset($totals['sales'][$category_name]) ? $totals['sales'][$category_name] : 0;
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($month); ?></td>
                                                    <td><?php echo htmlspecialchars($category_name); ?></td>
                                                    <td class="text-right"><?php echo number_format($total_income, 2); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Expenses Section 
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Expenses (by Shop)</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Category (Shop)</th>
                                            <th>Total Expenses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($combined_totals as $month => $totals): ?>
                                            <?php foreach ($all_categories as $category): ?>
                                                <?php 
                                                    $category_name = $category['name'];
                                                    $total_expenses = isset($totals['expenses'][$category_name]) ? $totals['expenses'][$category_name] : 0;
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($month); ?></td>
                                                    <td><?php echo htmlspecialchars($category_name); ?></td>
                                                    <td class="text-right"><?php echo number_format($total_expenses, 2); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>-->

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