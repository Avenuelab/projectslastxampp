<?php

require_once 'connection.php'; // Include your database connection

// Fetch sales
function getSales($table) {
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

$sales = getSales('sales');
$customers = getCustomers('customers');

$arrayCustomers = [];
$addingTotalSales = [];

// Capture customer names and total net prices
foreach ($sales as $sale) {
    foreach ($customers as $customer) {
        if ($customer["id"] == $sale["idCustomer"]) {
            $name = $customer["name"];
            $arrayCustomers[] = $name;
            $addingTotalSales[$name] = ($addingTotalSales[$name] ?? 0) + $sale["netPrice"];
        }
    }
}

// Avoiding repeated names
$uniqueCustomers = array_unique($arrayCustomers);

?>

<!-- Log on to codeastro.com for more projects! -->

<!--=====================================
Customers
======================================-->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Customers</h3>
    </div>
    <div class="box-body">
        <div class="chart-responsive">
            <div class="chart" id="bar-chart2" style="height: 300px;"></div>
        </div>
    </div>
</div>
<!-- Log on to codeastro.com for more projects! -->

<script>
// BAR CHART
var bar = new Morris.Bar({
    element: 'bar-chart2',
    resize: true,
    data: [
        <?php foreach ($uniqueCustomers as $customer): ?>
            {y: '<?php echo $customer; ?>', a: <?php echo $addingTotalSales[$customer] ?? 0; ?>},
        <?php endforeach; ?>
    ],
    barColors: ['#faae20'],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['sales'],
    preUnits: '$',
    hideHover: 'auto'
});
</script>