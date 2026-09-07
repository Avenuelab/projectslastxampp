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
	$loanid=mysqli_real_escape_string($conn,$_POST['loanid']);
	$login=mysqli_real_escape_string($conn,$_POST['login']);
	$purpose=mysqli_real_escape_string($conn,$_POST['purpose']);
	$loanamt=mysqli_real_escape_string($conn,$_POST['loanamt']);
	$lword=trim(mysqli_real_escape_string($conn,$_POST['amtword']));
	$amtdeduct=mysqli_real_escape_string($conn,$_POST['amtdeduct']);
	$period=mysqli_real_escape_string($conn,$_POST['period']);
	$outstanding=mysqli_real_escape_string($conn,$_POST['outstanding']);
	$amtoutstanding=mysqli_real_escape_string($conn,$_POST['amtoutstanding']);
	$securities=mysqli_real_escape_string($conn,$_POST['securities']);
	$secval=mysqli_real_escape_string($conn,$_POST['secval']);
	$servicecharge=mysqli_real_escape_string($conn,$_POST['srvcharge']);

	$loantotal=$amtdeduct+$loanamt;

	//**********************************************************************
	$loanSQL="UPDATE loan SET login='$login',purpose='$purpose',loanamt=$loanamt,amtword='$lword',loantotal=$loantotal,period=$period,amtdeduct=$amtdeduct,outstanding='$outstanding',amtoutstanding=$amtoutstanding,securities='$securities',secval=$secval,servicecharge=$servicecharge,loanstatus='n' WHERE loanid='$loanid'";	

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



