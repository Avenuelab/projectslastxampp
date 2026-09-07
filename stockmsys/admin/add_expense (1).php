<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

if (isset($_POST['add_expense'])) {
    $req_fields = array('expense_for', 'expense_cat', 'amount');
    validate_fields($req_fields);
    
    if (empty($errors)) {
        $expense_for = remove_junk($db->escape($_POST['expense_for']));
        $expense_category = remove_junk($db->escape($_POST['expense_cat']));
        $expense_amount = remove_junk($db->escape($_POST['amount']));
        
        $expense_date = make_date();
        
        $query = "INSERT INTO expense (expense_for, amount, ex_date, expense_cat) VALUES ('{$expense_for}', '{$expense_amount}', '{$expense_date}', '{$expense_category}')";
        
        if ($db->query($query)) {
            echo "<div class='alert alert-success'>Expense added successfully.</div>";
            echo '<meta http-equiv="refresh" content="2;URL=expense">';
        } else {
            echo "<div class='alert alert-danger'>Sorry, failed to add expense! Error: " . $db->error . "</div>";
            echo '<meta http-equiv="refresh" content="2;URL=add_expense">';
        }
    } else {
        echo "<div class='alert alert-warning'>" . implode(', ', $errors) . "</div>";
        echo '<meta http-equiv="refresh" content="2;URL=add_expense">';
    }
}

$all_categories = find_all('categories');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory System</title>
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

<?php include_once '../temp/rightnav.php' ?>
<?php include_once '../temp/sidemenu.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Expense</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>
                                    <span class="glyphicon glyphicon-th"></span>
                                    <span>Add New Expense</span>
                                </strong>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <form method="post" action="add_expense.php" class="clearfix">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-th-large"></i>
                                                </span>
                                                <input type="text" class="form-control" name="expense_for" placeholder="Expense For" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="expense_cat" required>
                                                        <option value="">Select Expense Category</option>
                                                        <?php foreach ($all_categories as $cat): ?>
                                                            <option value="<?php echo (int)$cat['id'] ?>">
                                                                <?php echo $cat['name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-usd"></i>
                                                        </span>
                                                        <input type="number" class="form-control" name="amount" placeholder="Amount" required>
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                        <button type="submit" name="add_expense" class="btn btn-danger">Add Expense</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </section>
</div>
<?php include_once '../temp/footer.php' ?>

<aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>