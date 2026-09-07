<?php
include_once('../_inc/connect.php');

//setting header to json
header('Content-Type: application/json');

$sql="SELECT SUM(loanamt)Loan,MONTHNAME(appdate)Month FROM `loan` WHERE loanstatus='y' AND YEAR(appdate)=YEAR(CURDATE()) GROUP BY month(appdate) ORDER BY month(appdate) ASC";
//echo $sql;
//execute query
$result=mysqli_query($conn,$sql);
$rowCount=mysqli_num_rows($result);
$sqlPay="SELECT monthname(TransTime)Month,SUM(TransAmount)Payment FROM mobile_payments WHERE 1 AND YEAR(TransTime)=YEAR(CURDATE()) GROUP by Month ORDER BY Month(TransTime) ASC";
$payQuery=mysqli_query($conn,$sqlPay);
//loop through the returned data
$data1 = array();
$my_arr = array();


 while($row=mysqli_fetch_assoc($result)) {
                    
  $data1[] = $row;
   
}

$data2= array();
 while($rowPay=mysqli_fetch_assoc($payQuery)) {
                   
  $data2[] = $rowPay;
   
}
//$data=array_merge($data1,$data2);

for ($i=0; $i <$rowCount ; $i++) { 

  $my_arr[]=array_unique(array_merge($data2[$i],$data1[$i]), SORT_REGULAR);
 
 
}
//free memory associated with result
$result->close();
$payQuery->close();


//close connection

$conn->close();
//now print the data
print json_encode($my_arr);

?>

