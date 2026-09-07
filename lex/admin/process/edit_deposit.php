<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	if(!empty($_POST))
	{ 
		$transid=mysqli_real_escape_string($conn,$_POST['transid']);
		$name=mysqli_real_escape_string($conn,$_POST['name']);
		$idno=mysqli_real_escape_string($conn,$_POST['idno']);
		$custid=mysqli_real_escape_string($conn,$_POST['custid']);
		$loanno=mysqli_real_escape_string($conn,$_POST['loanno']);
		$paidby=mysqli_real_escape_string($conn,$_POST['paidby']);
		$preparedby=mysqli_real_escape_string($conn,$_POST['preparedby']);
		$approve=mysqli_real_escape_string($conn,$_POST['approve']);
		$depoamt=mysqli_real_escape_string($conn,$_POST['depoamt']);
		$amtword=mysqli_real_escape_string($conn,$_POST[trim('amtword')]);
		$depodate=mysqli_real_escape_string($conn,$_POST['depodate']);
		$narration=mysqli_real_escape_string($conn,$_POST['narration']);
		$dtDepo= date('Ymd',strtotime($depodate));
		//**********************************************************************
		$paySQL="SELECT l.loantotal,SUM(p.amount)loanpaid FROM loan l JOIN loanpayment p ON l.loanid=p.loanno WHERE p.transactionid=$transid";
		$QueryPay=mysqli_query($conn,$paySQL);
		$rowPay=mysqli_fetch_assoc($QueryPay);
		
		$bal=$rowPay['loantotal']-$rowPay['loanpaid'];
		$newBal=$bal-$depoamt;
		if($bal<=0){
			$finLoan="UPDATE loan SET loanstatus='c' WHERE loanid='$loanno'";
			$finQuery=mysqli_query($conn,$finLoan);
			echo '<h1 style="color: #0F0;">Loan Payment completed. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../payment">';
			
		}else if($newBal<=0){
		
			$depoSQL="UPDATE loanpayment SET loanno='$loanno', idno=$idno, custid='$custid', preparedby='$preparedby', paidby='$paidby', approvedby='$approve', amount=$depoamt,amtword='".$amtword."',depodate=$dtDepo,narration='$narration', status='Edited Deposit' WHERE transactionid=$transid'";
						
					$RSdepo=mysqli_query($conn,$depoSQL);
					  if(!$RSdepo){
						echo $depoSQL." ". mysqli_error($conn);  
					 }else{
					$finLoan="UPDATE loan SET loanstatus='c' WHERE loanid='$loanno'";
					$finQuery=mysqli_query($conn,$finLoan);
					echo '<h1 style="color: #0F0;">Amount successfully updated. Loan has been cleared </h1>';
					echo '<meta http-equiv="refresh" content="2;URL=../payment">';
					 exit;
					 }
			}else{
			$depoSQL="UPDATE loanpayment SET loanno='$loanno', idno=$idno, custid='$custid', preparedby='$preparedby', paidby='$paidby', approvedby='$approve', amount=$depoamt,amtword='".$amtword."',depodate=$dtDepo,narration='$narration', status='Edited Deposit'  WHERE transactionid=$transid";
						
					$RSdepo=mysqli_query($conn,$depoSQL);
					  if(!$RSdepo){
						echo $depoSQL." ". mysqli_error($conn);  
					 }else{
					echo '<h1 style="color: #0F0;">Amount successfully updated. Loan has been cleared </h1>';
					echo '<meta http-equiv="refresh" content="2;URL=../payment">';
					 exit;
					 }
			}
				
			}else{
				echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../payment">';
			
		
		
			}
}
?>



