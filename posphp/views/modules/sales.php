<?php
if ($_SESSION["profile"] == "Special") {
    echo '<script>window.location = "home";</script>';
    return;
}

// Simulate XML file creation
$xmlFile = $_GET["xml"] ?? null;
if ($xmlFile) {
    rename($xmlFile . ".xml", "xml/" . $xmlFile . ".xml");
    echo '<a class="btn btn-block btn-success openXML" file="xml/' . $xmlFile . '.xml" href="sales">The XML file has been created successfully<span class="fa fa-times pull-right"></span></a>';
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Sales Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <a href="create-sale">
          <button class="btn btn-success"><i class="fa fa-plus"></i> Add Sale</button>
        </a>
        <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
          <span><i class="fa fa-calendar"></i> Date Range</span>
          <i class="fa fa-caret-down"></i>
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Bill</th>
              <th>Customer</th>
              <th>Seller</th>
              <th>Payment Method</th>
              <th>Net Cost</th>
              <th>Total Cost</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $initialDate = $_GET["initialDate"] ?? null;
            $finalDate = $_GET["finalDate"] ?? null;

            // Simulate fetching sales data
            $sales = []; // Replace with actual sales fetching logic

            foreach ($sales as $key => $value) {
                $customerName = "Customer Name"; // Replace with actual customer name fetching logic
                $sellerName = "Seller Name"; // Replace with actual seller name fetching logic

                echo '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["code"] . '</td>
                        <td>' . $customerName . '</td>
                        <td>' . $sellerName . '</td>
                        <td>' . $value["paymentMethod"] . '</td>
                        <td>$ ' . number_format($value["netPrice"], 2) . '</td>
                        <td>$ ' . number_format($value["totalPrice"], 2) . '</td>
                        <td>' . $value["saledate"] . '</td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-success" href="index.php?route=sales&xml=' . $value["code"] . '">XML</a>
                            <button class="btn btn-warning btnPrintBill" saleCode="' . $value["code"] . '"><i class="fa fa-print"></i></button>';
                
                if ($_SESSION["profile"] == "Administrator") {
                    echo '<button class="btn btn-primary btnEditSale" idSale="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnDeleteSale" idSale="' . $value["id"] . '"><i class="fa fa-trash"></i></button>';
                }

                echo '</div></td></tr>';
            }
            ?>
          </tbody>
        </table>

        <?php
        // Simulate sale deletion logic
        // $deleteSale = new ControllerSales();
        // $deleteSale->ctrDeleteSale();
        ?>
      </div>
    </div>
  </section>
</div>