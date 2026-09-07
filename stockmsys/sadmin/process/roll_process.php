<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
$name=htmlentities($_SESSION['user']['username']); 
if($role!=1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	if(!empty($_POST)){ 
			$custid=mysqli_real_escape_string($conn,$_POST['custid']);
			$oldLN=mysqli_real_escape_string($conn,$_POST['lnid']);
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
			$loantotal=(int)$amtdeduct+(int)$loanamt;
			$narration=mysqli_real_escape_string($conn,$_POST['msg']);
			//$dtloan= date('Ymd',strtotime($subscr));
		
			$loantot=0;
			$weeklyded=0;
			$newtotal=0;
	if($prule=='deduct'){
			
		$newtotal=(int)$loanamt-(int)$servicecharge-(int)$other;
		$loantot=(int)$amtdeduct+(int)$loanamt;
		$weeklyded=(int)$loantot*0.25;
		

	}elseif($prule=='no deduct'){
		$newtotal=$loanamt;
		$loantot=(int)$loantotal+(int)$other;
		$weeklyded=(int)$loantot*0.25;
		
	}
	
		$dedrule=(int)$amtdeduct*(int)$period;
	
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
	$dtOff=date('Ymd');
	$paydate=date('Ymd',strtotime('+30 days',strtotime($dtApp)));
		//**********************************************************************
	$loanSQL="INSERT INTO loan(loanid,custid,login,purpose,loanamt,amtword,loantotal,period,amtdeduct,securities,secval,servicecharge,appdate,paydate,gstatus,loanstatus,disburment,officerapprove,relationofficer,empid,lntype,phone,prule,otheramt,disburse,amtdedrule,weeklyded,narration,approvedbyOfficer,offecerdate,mgrapprove)
		VALUES('$lnNo','$custid','$login','$purpose',$loanamt,'$lword',$loantot,$period,$amtdeduct,'$securities',$secval,$servicecharge,$dtApp,$paydate,'A','n','y','$roid','$roid','$roid','$lntype','$tel','$prule',$other,$newtotal,$dedrule,$weeklyded,'$narration','$name',$dtOff,1)";

		$query=mysqli_query($conn,$loanSQL);
		if(!$query){
			echo "Error in content: ".mysqli_error($conn);
		}else{

			echo '<h1 style="color: #FF0;">Rollover successfully Created. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../rollover">';	

		}
	}
}
?>