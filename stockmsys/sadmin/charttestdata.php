<?php
include_once('../_inc/connect.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];

$rowperpage = $_POST['length']; // Rows display per page

$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value
## Search

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND  MONTHNAME(CAST(TransactionCompletedDateTime AS DATE)) like '%".$searchValue."%'";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"SELECT COUNT(b2bID)allcount FROM b2c_api_response ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$tsql="SELECT COUNT(b2bID)allcount FROM b2c_api_response WHERE 1 ".$searchQuery;
$sel = mysqli_query($conn,$tsql);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT DATE_FORMAT((CAST(b.TransactionCompletedDateTime AS DATE)),'%d')monthDate,SUM((b.TransactionAmount))disbursed,sum((p.TransAmount))paid,
			SUM(l.servicecharge)transfee,MONTHNAME(CAST(b.TransactionCompletedDateTime AS DATE))month 
			FROM b2c_api_response b LEFT JOIN mobile_payments p ON p.MSISDN=SUBSTRING_INDEX(ReceiverPartyPublicName,' - ',1) LEFT JOIN loan l ON l.phone=SUBSTRING_INDEX(ReceiverPartyPublicName,' - ',1) WHERE 1 ".$searchQuery."  
			GROUP BY CAST(b.TransactionCompletedDateTime AS DATE) ORDER BY monthDate DESC LIMIT ".$row.",".$rowperpage;

$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
       "monthDate"=>$row['monthDate'],
      "paid"=>$row['paid'],
      "disbursed"=>$row['disbursed'],
     "transfee"=>$row['transfee'],		  
      "month"=>$row['month'],

   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);