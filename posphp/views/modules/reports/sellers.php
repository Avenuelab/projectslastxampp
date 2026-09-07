<?php

require_once 'connection.php'; // Include your database connection

// Fetch sales
function getSales($table) {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fetch users
function getUsers($table) {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll();
}

$sales = getSales('sales');
$users = getUsers('users');

$addingTotalSales = [];

// Capture seller names and total net prices
foreach ($sales as $sale) {
    foreach ($users as $user) {
        if ($user["id"] == $sale["idSeller"]) {
            $name = $user["name"];
            $addingTotalSales[$name] = ($addingTotalSales[$name] ?? 0) + $sale["netPrice"];
        }
    }
}

// Avoid repeated names
$uniqueSellers = array_keys($addingTotalSales);
?>

<!-- Log on to codeastro.com for more projects! -->

<!--=====================================
Sellers
======================================-->

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Sellers</h3>
    </div>

    <div class="box-body">
        <div class="chart-responsive">
            <div class="chart" id="bar-chart1" style="height: 300px;"></div>
        </div>
    </div>
</div>

<script>
// BAR CHART
var bar = new Morris.Bar({
    element: 'bar-chart1',
    resize: true,
    data: [
        <?php foreach ($uniqueSellers as $seller): ?>
            {y: '<?php echo $seller; ?>', a: <?php echo $addingTotalSales[$seller]; ?>},
        <?php endforeach; ?>
    ],
    barColors: ['#0af'],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['sales'],
    preUnits: '$',
    hideHover: 'auto'
});
</script>