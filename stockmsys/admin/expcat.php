<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

$role = htmlentities($_SESSION['user']['role_id']); 
if ($role > 1) {
    echo '<h1 style="color: #FF0;">You have no Rights to access this page.</h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
} else {
    $msg = '';
    $all_categories = find_all('categories');  // Fetch all categories
    $all_expenses = find_all('expense');  // Fetch all expenses

    if (isset($_POST['add_expense_category'])) {
        $req_field = array('expense_id', 'category_id');
        validate_fields($req_field);
        
        $expense_id = remove_junk($db->escape($_POST['expense_id']));
        $category_id = remove_junk($db->escape($_POST['category_id']));
        
        if (empty($errors)) {
            $sql = "INSERT INTO expense_category (category_id, expense_id) VALUES ('{$category_id}', '{$expense_id}')";
            if ($db->query($sql)) {
                $msg = "Successfully Added Expense Category Link";
                echo '<meta http-equiv="refresh" content="2;URL=expcat.php">';  // Redirect to the same page
            } else {
                $msg = "Sorry, failed to insert.";
                echo '<meta http-equiv="refresh" content="2;URL=expcat.php">';
            }
        } else {
            $msg = implode(', ', $errors);  // Display errors
            echo '<meta http-equiv="refresh" content="2;URL=expcat.php">';
        }
    }
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

<?php include_once '../temp/rightnav.php'; ?>
<?php include_once '../temp/sidemenu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo($msg); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>
                                                <span class="glyphicon glyphicon-th"></span>
                                                <span>Add Expense Category Link</span>
                                            </strong>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action="expcat.php">
                                                <div class="form-group">
                                                    <label for="expense_id">Select Expense</label>
                                                    <select class="form-control" name="expense_id" required>
                                                        <option value="">Select Expense</option>
                                                        <?php foreach ($all_expenses as $expense): ?>
                                                            <option value="<?php echo (int)$expense['id']; ?>">
                                                                <?php echo remove_junk(ucfirst($expense['expense_for'])); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id">Select Category</label>
                                                    <select class="form-control" name="category_id" required>
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($all_categories as $cat): ?>
                                                            <option value="<?php echo (int)$cat['id']; ?>">
                                                                <?php echo remove_junk(ucfirst($cat['name'])); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <button type="submit" name="add_expense_category" class="btn btn-primary">Add Expense Category Link</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>
                                                <span class="glyphicon glyphicon-th"></span>
                                                <span>All Categories</span>
                                            </strong>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50px;">#</th>
                                                        <th>Categories</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($all_categories as $cat): ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo count_id(); ?></td>
                                                            <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

<?php } ?>