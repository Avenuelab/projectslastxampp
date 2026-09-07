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

	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$voucherno=mysqli_real_escape_string($conn,$_POST['voucherno']);
	$idno=mysqli_real_escape_string($conn,$_POST['idno']);
	$shareno=mysqli_real_escape_string($conn,$_POST['shareno']);
	$preparedby=mysqli_real_escape_string($conn,$_POST['preparedby']);
	$paidby=mysqli_real_escape_string($conn,$_POST['paidby']);
	$apporver=mysqli_real_escape_string($conn,$_POST['apporver']);
	$transtype=mysqli_real_escape_string($conn,$_POST['transtype']);
	$depoamt=mysqli_real_escape_string($conn,$_POST['depoamt']);
	$lword=mysqli_real_escape_string($conn,$_POST['lword']);
	$depodate=mysqli_real_escape_string($conn,$_POST['depodate']);
	$narration=mysqli_real_escape_string($conn,$_POST['narration']);
	$other=mysqli_real_escape_string($conn,$_POST['other']);

	$dtDepo= date('Ymd',strtotime($depodate));
	//**********************************************************************
		
		
	$depoSQL="UPDATE transaction SET name='$name',idno=$idno,shareno=$shareno,preparedby='$preparedby',paidby='$paidby',approvedby='$apporver',transtype='$transtype',amount=$depoamt,amtword='$lword',depodate=$dtDepo,narration='$narration',other='$other',status='Alteration Successful' WHERE voucherno=$voucherno AND description='deposit'";
			$RSdepo=mysqli_query($conn,$depoSQL);
			  if(!$RSdepo){
				echo $depoSQL." ". mysqli_error($conn);  
			 }else{
			echo '<h1 style="color: #0F0;">Details successfully Updated. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../depositdetails">';
			 exit;
			 }

		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../editdeposit">';
			
		
		
		}
}
?>



