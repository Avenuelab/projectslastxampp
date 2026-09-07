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
		$custid=mysqli_real_escape_string($conn,$_POST['custid']);

		$login=mysqli_real_escape_string($conn,$_POST['login']);
		$purpose=mysqli_real_escape_string($conn,$_POST['purpose']);
		$loanamt=mysqli_real_escape_string($conn,$_POST['loanamt']);
		$lword=mysqli_real_escape_string($conn,$_POST['lword']);
		$amtdeduct=mysqli_real_escape_string($conn,$_POST['amtdeduct']);
		$period=mysqli_real_escape_string($conn,$_POST['period']);
		$appdate=mysqli_real_escape_string($conn,$_POST['subscr']);
		$securities=mysqli_real_escape_string($conn,$_POST['securities']);
		$secval=mysqli_real_escape_string($conn,$_POST['secval']);
		$servicecharge=mysqli_real_escape_string($conn,$_POST['srvcharge']);
		$roid=mysqli_real_escape_string($conn,$_POST['roid']);
		$lntype=mysqli_real_escape_string($conn,$_POST['lntype']);
		$prule=mysqli_real_escape_string($conn,$_POST['prule']);
		$tel=mysqli_real_escape_string($conn,$_POST['phone']);
		$other=mysqli_real_escape_string($conn,$_POST['otheramt']);
		$amtInterest=(int)$amtdeduct; //*(int)$period;
		$loantotal=(int)$amtInterest+(int)$loanamt;
		//$dtloan= date('Ymd',strtotime($subscr));


	if($prule=='deduct'){
			
		$newtotal=(int)$loanamt-(int)$servicecharge-(int)$other;
		$loantot=(int)$amtdeduct+(int)$newtotal;
		$weeklyded=(int)$loantot*0.25;
	}elseif($prule=='no deduct'){
		$newtotal=$loantotal;
		$loantot=(int)$newtotal+(int)$other;
		$weeklyded=(int)$loantot*0.25;
	}
	
		$dedrule=(int)$amtInterest*(int)$period;
	
	function izrand($length = 32) {

					$random_string="";
					while(strlen($random_string)<$length && $length > 0) {
							$randnum = mt_rand(0,61);
							$random_string .= ($randnum < 10) ?
									chr($randnum+48) : ($randnum < 36 ? 
											chr($randnum+55) : $randnum+61);
					 }
					return $random_string;
	}

	$randomNumber = izrand(4, true);

	$lnNo= trim($custid.$randomNumber);
	$dtApp=date('Ymd',strtotime($appdate));
	$paydate=date('Ymd',strtotime('+30 days',strtotime($dtApp)));
	//**********************************************************************
	$loanSQL="INSERT INTO loan(loanid,custid,login,purpose,loanamt,amtword,loantotal,period,amtdeduct,securities,secval,servicecharge,appdate,paydate,gstatus,loanstatus,disburment,officerapprove,relationofficer,empid,lntype,phone,prule,otheramt,disburse,amtdedrule,weeklyded)
	VALUES('$lnNo','$custid','$login','$purpose',$loanamt,'$lword',$loantot,$period,$amtInterest,'$securities',$secval,$servicecharge,$dtApp,$paydate,'D','n','n','$roid','$roid','$roid','$lntype','$tel','$prule',$other,$loanamt,$dedrule,$weeklyded)";

	//echo $loanSQL;
		$RSloan=mysqli_query($conn,$loanSQL);
			  if(!$RSloan){
				echo $loanSQL." ". mysqli_error($conn);  
			 }else{
			echo '<h1 style="color: #0F0;">Amount successfully Deposited. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
			 exit;
			 }

		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../applyloan">';
			
		
		
		}
}
?>