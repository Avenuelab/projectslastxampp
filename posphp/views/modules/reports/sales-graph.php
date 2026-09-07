<?php

error_reporting(0);

$initialDate = $_GET["initialDate"] ?? null;
$finalDate = $_GET["finalDate"] ?? null;

// Fetch sales data based on date range
function getSalesByDateRange($initialDate, $finalDate) {
    $query = "SELECT DATE_FORMAT(saledate, '%Y-%m') as month, SUM(totalPrice) as totalPrice FROM sales";
    if ($initialDate && $finalDate) {
        $query .= " WHERE saledate BETWEEN :initialDate AND :finalDate";
    }
    $query .= " GROUP BY month ORDER BY month";

    $stmt = Connection::connect()->prepare($query);
    if ($initialDate && $finalDate) {
        $stmt->bindParam(":initialDate", $initialDate);
        $stmt->bindParam(":finalDate", $finalDate);
    }
    $stmt->execute();
    return $stmt->fetchAll();
}

$salesData = getSalesByDateRange($initialDate, $finalDate);

$addingMonthPayments = [];

foreach ($salesData as $sale) {
    $month = $sale["month"];
    $totalPrice = $sale["totalPrice"];
    $addingMonthPayments[$month] = ($addingMonthPayments[$month] ?? 0) + $totalPrice;
}

$noRepeatDates = array_keys($addingMonthPayments);
?>

<!--=====================================
SALES GRAPH
======================================-->

<!-- Log on to codeastro.com for more projects! -->
<div class="box box-solid bg-red-gradient">
    <div class="box-header">
        <i class="fa fa-th"></i>
        <h3 class="box-title">Sales Graph</h3>
    </div>

    <div class="box-body border-radius-none newSalesGraph">
        <div class="chart" id="line-chart-Sales" style="height: 250px;"></div>
    </div>
</div>

<script>
var line = new Morris.Line({
    element: 'line-chart-Sales',
    resize: true,
    data: [
        <?php
        foreach ($noRepeatDates as $month) {
            echo "{ y: '$month', Sales: " . ($addingMonthPayments[$month] ?? 0) . " },";
        }
        ?>
    ],
    xkey: 'y',
    ykeys: ['Sales'],
    labels: ['Sales'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: '#fff',
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor: '#efefef',
    gridTextFamily: 'Open Sans',
    preUnits: '$',
    gridTextSize: 10
});
</script>