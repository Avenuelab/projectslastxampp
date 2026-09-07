<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

$role = htmlentities($_SESSION['user']['role_id']); 
if ($role > 1) {
    echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
} else {
    $msg = '';

    // Fetch only approved products
    $products = join_product_table_approved(); // Modify this function

?>
<!DOCTYPE html>
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

<?php include_once '../temp/rightnav.php'?>
<?php include_once '../temp/sidemenu.php'?>
<div class="content-wrapper">
  
    <section class="content">
        <div class="container-fluid">
       
            <div class="row">
            <div class="col-md-12">
            
                <?php echo ($msg); ?>
                         
                <div class="card">
                    <div class="card-body">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                        <div class="pull-right">
                        <a href="add_product.php" class="btn btn-primary">Add New</a>
                        </div>
                        </div>
                        <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th> Photo</th>
                                <th> Product Title </th>
                                <!--<th class="text-center" style="width: 10%;"> Categories </th>-->
                                <th class="text-center" style="width: 10%;"> In-Stock </th>
                                <th class="text-center" style="width: 10%;"> Buying Price </th>
                                <th class="text-center" style="width: 10%;"> Selling Price </th>
                                <th class="text-center" style="width: 10%;"> Product Added </th>
                                <th class="text-center" style="width: 100px;"> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id();?></td>
                                <td>
                                <?php if($product['media_id'] === '0'): ?>
                                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                                <?php else: ?>
                                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                                <?php endif; ?>
                                </td>
                                <td> <?php echo remove_junk($product['name']); ?></td>
                                <!--<td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>--->
                                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                                <td class="text-center">
                                <div class="btn-group">
                                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                                    <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                                    <span class="fa fa-trash"></span>
                                    </a>
                                </div>
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
            </div>
        </div>
    </div>

</div>

<?php include_once '../temp/footer.php'?>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
</body>
</html>

<?php } ?>

<?php
function join_product_table_approved() {
    global $db; // Assuming you have a database connection established
    $query = "SELECT * FROM products WHERE approve = 1"; // Modify the table name as necessary
    return $db->query($query); // Adjust based on your database interaction method
}
?>