<?php
include_once('../_inc/connect.php');

//setting header to json
header('Content-Type: application/json');

$sql="SELECT SUM((b.TransactionAmount))disbursed,sum((p.TransAmount))paid,
sum(l.servicecharge)transfee,MONTHNAME(CAST(b.TransactionCompletedDateTime AS DATE))month
			FROM b2c_api_response b LEFT JOIN mobile_payments p ON p.MSISDN=SUBSTRING_INDEX(ReceiverPartyPublicName,' - ',1) 
			LEFT JOIN loan l ON l.phone=SUBSTRING_INDEX(ReceiverPartyPublicName,' - ',1) 
            GROUP BY MONTHNAME(CAST(b.TransactionCompletedDateTime AS DATE)) ORDER BY month DESC";
//echo $sql;
//execute query
$result=mysqli_query($conn,$sql);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}


//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>

