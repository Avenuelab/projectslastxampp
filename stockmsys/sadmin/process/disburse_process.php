<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{

	$lst="custno,damt,descr,subscr,dtype";
	if(!empty($_POST)){ 
	$custno=mysqli_real_escape_string($conn,$_POST['custno']);
	$login=mysqli_real_escape_string($conn,$_POST['login']);
	$damt=mysqli_real_escape_string($conn,$_POST['damt']);
	$descr=mysqli_real_escape_string($conn,$_POST['descr']);
	$subscr=trim(mysqli_real_escape_string($conn,$_POST['subscr']));
	$dtype=mysqli_real_escape_string($conn,$_POST['dtype']);

	$disbdate=date('Ymd',strtotime($subscr));
	//**********************************************************************
	$disSQL="INSERT INTO disbursement (noofcustomer,amount, disbursmentdate, type,mpesacode,login)
	VALUES($custno,$damt,$disbdate,'$dtype','$descr','$login')";	
		$RSdis=mysqli_query($conn,$disSQL);
			  if(!$RSdis){
				echo $disSQL." ". mysqli_error($conn);  
			 }else{
			echo '<h1 style="color: #0F0;"> successfully. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../adminhome">';
			 exit;
			 }

		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../adddisbursment">';
			
		
		
		}

}

?>



