<?php

require_once 'connection.php'; // Include your database connection

// Fetch total sales
function getTotalSales($table) {
    $stmt = Connection::connect()->prepare("SELECT SUM(netPrice) as total FROM $table");
    $stmt->execute();
    return $stmt->fetch();
}

// Fetch categories
function getCategories($table) {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fetch customers
function getCustomers($table) {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fetch products
function getProducts($table, $order = "id") {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Retrieve data
$sales = getTotalSales('sales');
$categories = getCategories('categories');
$totalCategories = count($categories);
$customers = getCustomers('customers');
$totalCustomers = count($customers);
$products = getProducts('products');
$totalProducts = count($products);

?>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <h3>$<?php echo number_format($sales["total"], 2); ?></h3>
      <p>Sales</p>
    </div>
    <div class="icon">
      <i class="ion ion-social-usd"></i>
    </div>
    <a href="sales" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-primary">
    <div class="inner">
      <h3><?php echo number_format($totalCategories); ?></h3>
      <p>Categories</p>
    </div>
    <div class="icon">
      <i class="ion ion-clipboard"></i>
    </div>
    <a href="categories" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?php echo number_format($totalCustomers); ?></h3>
      <p>Customers</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="customers" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo number_format($totalProducts); ?></h3>
      <p>Products</p>
    </div>
    <div class="icon">
      <i class="ion ion-ios-cart"></i>
    </div>
    <a href="products" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>