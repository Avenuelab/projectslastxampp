<?php

require_once 'connection.php'; // Include your database connection

// Fetch products
function getProducts($table, $order = "sales") {
    $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fetch total sales
function getTotalSales($table) {
    $stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");
    $stmt->execute();
    return $stmt->fetch();
}

$products = getProducts('products');
$salesTotal = getTotalSales('products');
$colours = array("red", "green", "yellow", "aqua", "purple", "blue", "cyan", "magenta", "orange", "gold");

?>

<!--=====================================
Bestseller Products
======================================-->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Bestseller Products</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-7">
                <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                </div>
            </div>
            <div class="col-md-5">
                <ul class="chart-legend clearfix">
                    <?php for ($i = 0; $i < 10; $i++): ?>
                        <li><i class="fa fa-circle-o text-<?php echo $colours[$i]; ?>"></i> <?php echo $products[$i]["description"]; ?></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="box-footer no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <li>
                    <a>
                        <img src="<?php echo $products[$i]["image"]; ?>" class="img-thumbnail" width="60px" style="margin-right:10px"> 
                        <?php echo $products[$i]["description"]; ?>
                        <span class="pull-right text-<?php echo $colours[$i]; ?>">   
                            <?php echo ceil($products[$i]["sales"] * 100 / $salesTotal["total"]); ?>%
                        </span>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

<script>
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
        <?php for ($i = 0; $i < 10; $i++): ?>
            {
                value: <?php echo $products[$i]["sales"]; ?>,
                color: '<?php echo $colours[$i]; ?>',
                highlight: '<?php echo $colours[$i]; ?>',
                label: '<?php echo $products[$i]["description"]; ?>'
            },
        <?php endfor; ?>
    ];
    var pieOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: '#fff',
        segmentStrokeWidth: 1,
        percentageInnerCutout: 50,
        animationSteps: 100,
        animationEasing: 'easeOutBounce',
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: false,
        tooltipTemplate: '<%=value %> <%=label%>'
    };
    pieChart.Doughnut(PieData, pieOptions);
</script>