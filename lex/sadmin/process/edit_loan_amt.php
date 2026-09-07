<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	if(!empty($_POST)){ 
	$loanid=mysqli_real_escape_string($conn,$_POST['id']);
	$login=htmlentities($_SESSION['user']['username']); 
	$newloan=trim(mysqli_real_escape_string($conn,$_POST['loanamt']));
	$amtdeduct=mysqli_real_escape_string($conn,$_POST['amtdeduct']);
	$period=mysqli_real_escape_string($conn,$_POST['period']);
	$servicecharge=mysqli_real_escape_string($conn,$_POST['srvcharge']);
	$msg=mysqli_real_escape_string($conn,$_POST['msg']);
	$other='150';

	$loantotal=$amtdeduct+$newloan+$other;

	//**********************************************************************
	$loanSQL="UPDATE loan SET login='$login',disburse=$newloan,loantotal=$loantotal,period=$period,amtdeduct=$amtdeduct,servicecharge=$servicecharge,loanstatus='n',narration='$msg' WHERE loanid='$loanid'";	
	
		$RSloan=mysqli_query($conn,$loanSQL);
			  if(!$RSloan){
				echo $loanSQL." ". mysqli_error($conn);  
			 }else{
			echo '<h1 style="color: #0F0;">Amount successfully Deposited. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../loandetails">';
			 exit;
	}

		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../loandetails">';
			
		
		
	}
}


?>



