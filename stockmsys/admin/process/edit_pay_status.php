<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
 

	if(!empty($_POST))
	{ 
		$transactionStatusID=mysqli_real_escape_string($conn,$_POST['transactionStatusID']);
		$TransID=mysqli_real_escape_string($conn,$_POST['TransID']);
		$TransTime=mysqli_real_escape_string($conn,$_POST['TransTime']);
		$newTransTime = date ('YmdHis', strtotime($TransTime));
		$TransAmount=TRIM(mysqli_real_escape_string($conn,$_POST['TransAmount']));
		$BusinessShortCode=mysqli_real_escape_string($conn,$_POST['BusinessShortCode']);
		$MSISDN=TRIM(mysqli_real_escape_string($conn,$_POST['MSISDN']));
		$BillRefNumber=mysqli_real_escape_string($conn,$_POST['billref']);
		$other=mysqli_real_escape_string($conn,$_POST['more']);
		$FirstName=mysqli_real_escape_string($conn,$_POST['FirstName']);
		$MiddleName=mysqli_real_escape_string($conn,$_POST['MiddleName']);
		$LastName=mysqli_real_escape_string($conn,$_POST['LastName']);
		

	if(empty($other)){
		
		$sqlPayment="INSERT INTO mobile_payments(TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, MSISDN, FirstName, MiddleName, LastName)
						VALUES('Pay Bill', '$TransID', '$newTransTime', '$TransAmount', '$BusinessShortCode', '$BillRefNumber', '$MSISDN', '$FirstName', '$MiddleName', '$LastName')";

	}	else{
		
		$sqlPayment="INSERT INTO mobile_payments(TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, MSISDN, FirstName, MiddleName, LastName)
						VALUES('Pay Bill', '$TransID', '$newTransTime', '$TransAmount', '$BusinessShortCode', '$other', '$MSISDN', '$FirstName', '$MiddleName', '$LastName')";
	}


		$payQuery=mysqli_query($conn,$sqlPayment);
		
		if(!$payQuery){
			echo "There is an Error: ".mysqli_error($conn);
			}else{

				$ctrlSQL="UPDATE transaction_status SET moved=1 WHERE ReceiptNo ='$TransID' ";
				$ctrlQuery=mysqli_query($conn,$ctrlSQL);
						echo '<h1 style="color: #0F0;">Target Changed successfully. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../../don/viewc2bstatus">'; 
				}
		
	}
