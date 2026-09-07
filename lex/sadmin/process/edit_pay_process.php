<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
	if(!empty($_POST))
	{ 
		$transLoID=mysqli_real_escape_string($conn,$_POST['transLoID']);
		$TransID=mysqli_real_escape_string($conn,$_POST['TransID']);
		$BillRefNumber=mysqli_real_escape_string($conn,$_POST['billref']);
		$other=mysqli_real_escape_string($conn,$_POST['more']);


	if(empty($other)){
		$paySQL="UPDATE mobile_payments SET BillRefNumber=TRIM('$BillRefNumber') WHERE transLoID=$transLoID";
	}	else{
		$paySQL="UPDATE mobile_payments SET BillRefNumber=TRIM('$other') WHERE transLoID=$transLoID";
	}


		$payQuery=mysqli_query($conn,$paySQL);
		
		if(!$payQuery){
			echo "There is an Error: ".mysqli_error($conn);
			}else{
						echo '<h1 style="color: #0F0;">Target Changed successfully. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../editpay?edit_id=' . $transLoID . '">'; 
				}
		
	}