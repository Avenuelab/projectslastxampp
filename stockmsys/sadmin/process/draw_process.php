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
	$received=mysqli_real_escape_string($conn,$_POST['received']);
	$apporver=mysqli_real_escape_string($conn,$_POST['apporver']);
	$transtype=mysqli_real_escape_string($conn,$_POST['transtype']);
	$withamt=mysqli_real_escape_string($conn,$_POST['withamt']);
	$lword=mysqli_real_escape_string($conn,$_POST['lword']);
	$depodate=mysqli_real_escape_string($conn,$_POST['depodate']);
	$narration=mysqli_real_escape_string($conn,$_POST['narration']);
	$other=mysqli_real_escape_string($conn,$_POST['other']);

	$dtDepo= date('Ymd',strtotime($depodate));
	$charge=$withamt*.02;
	//**********************************************************************

	/***********************************************************************/
		$_SESSION['voucher']=$voucherno;
		
	$depoSQL="INSERT INTO transaction(voucherno,name,idno,shareno,preparedby,receivedby,approvedby,amount,amtword,depodate,narration,other,description,charges)
			VALUES($voucherno,'$name',$idno,$shareno,'$preparedby','$received','$apporver',$withamt,'$lword',$dtDepo,'$narration','$other','Withdraw',$charge)";	
			$RSdepo=mysqli_query($conn,$depoSQL);
			  if(!$RSdepo){
				echo $depoSQL." ". mysqli_error($conn);  
			 }else{
				 
				
				$cgSQL="INSERT INTO suspense(shareno,voucherno,servedby,eventdate,description,amount)
				VALUES('$shareno',$voucherno,'$apporver',$dtDepo,'Withdrawal',$charge)";	
				$cgdepo=mysqli_query($conn,$cgSQL);
		 
				 
			echo '<h1 style="color: #0F0;">Amount successfully withdrawn. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../withdraw_receipt">';
			 exit;
			 }

		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../withdraw">';
			
		
		
		}
}
?>



