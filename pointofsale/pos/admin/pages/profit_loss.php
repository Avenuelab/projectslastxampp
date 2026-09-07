<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
?>

    <style>
        html,
        body {
            background-color: #222222;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
}



<table border="1" align="center">
<tr><th colspan="2">Profit & Loss</th></tr>
<tr><th>Type</th><th>Value</th></tr>
<tr><th>Total Income</th><th><?php echo sales(); ?></th></tr>
<tr><th>Total Expenses</th><th><?php echo expense(); ?></th></tr>
<tr><th>Balance</th><th><?php echo profit_loss(); ?></th></tr>
</table>


</body>
</html>

<?php

function profit_loss()
{

$income = income();
$expense = expense();
  if ($income>$expense)
  {
    $profit = $income - $expense;
    return "Profit ".$profit;
  }
  else
  {
    $loss = $expense - $income;
    return "Loss ".$loss;
  }

}

function income()
{
$query = "select sum(grandtot) from `invoice`;";
$result = mysql_query ($query);
$total = mysql_result ($result, 0);

return $total;
}

function expense()
{
$query = "select sum(totexp) from `stock`;";
$result = mysql_query ($query);
$total = mysql_result ($result, 0);

return $total;
}
?>
</body>
</html>