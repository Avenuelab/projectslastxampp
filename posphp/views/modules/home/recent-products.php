<?php

require_once 'connection.php'; // Include your database connection

// Fetch products directly
function showProducts($table, $item = null, $value = null, $order = "id") {
    $query = "SELECT * FROM $table";
    if ($item != null) {
        $query .= " WHERE $item = :$item";
    }
    $query .= " ORDER BY $order";

    $stmt = Connection::connect()->prepare($query);
    if ($item != null) {
        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);
    }
    $stmt->execute();
    return $item ? $stmt->fetch() : $stmt->fetchAll();
}

$products = showProducts('products'); // Fetch products

?>

<!-- Log on to codeastro.com for more projects! -->
<div class="box box-default">

  <div class="box-header with-border">
    <h3 class="box-title">Recently Added Products</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove">
        <i class="fa fa-times"></i>
      </button>
    </div>
  </div>

  <div class="box-body">
    <ul class="products-list product-list-in-box">
    <?php
    foreach (array_slice($products, 0, 7) as $product) {
        echo '<li class="item">
          <div class="product-img">
            <img src="'.$product["image"].'" alt="Product Image">
          </div>
          <div class="product-info">
            <a href="" class="product-title">
              '.$product["description"].'
              <span class="label label-warning pull-right">$'.$product["sellingPrice"].'</span>
            </a>
          </div>
        </li>';
    }
    ?>
    </ul>
  </div>

  <div class="box-footer text-center">
    <a href="products" class="uppercase">View All Products</a>
  </div>
  <!-- Log on to codeastro.com for more projects! -->
</div>