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
		$pname=mysqli_real_escape_string($conn,$_POST['pname']);
		$rate=mysqli_real_escape_string($conn,$_POST['rate']);
		$cal=mysqli_real_escape_string($conn,$_POST['ical']);
		$ratetype=mysqli_real_escape_string($conn,$_POST['ratetype']);
		$fee=trim(mysqli_real_escape_string($conn,$_POST['fee']));
		$amt=mysqli_real_escape_string($conn,$_POST['amt']);
		$prule=mysqli_real_escape_string($conn,$_POST['prule']);
		$otheramt=mysqli_real_escape_string($conn,$_POST['otheramt']);
		$lmt=mysqli_real_escape_string($conn,$_POST['lmt']);
		$rate_explode = explode('|',$ratetype);
		$rtype=$rate_explode[0];
		$month=$rate_explode[1];
		$days=$rate_explode[2];
		
		$pdt= date('Ymd');
		$login=htmlentities($_SESSION['user']['username']);
	    $sql="INSERT INTO ratesetting (pname, calc, rate,ratetype,pfee,pamt,prule,pdate,login,otheramt,months,days,loanlimit) 
		VALUES ('$pname','$cal',$rate,'$rtype','$fee','$amt','$prule',$pdt,'$login',$otheramt,'$month',$days,$lmt)";
		
		
		
		$rs=mysqli_query($conn,$sql);
			if(!$rs){
				echo "Check your Value and Try again. ".$sql." ".mysqli_error($conn);
					
			echo '<meta http-equiv="refresh" content="2;URL=../ratesettings">';
				
			}else{
				
				echo '<h1 style="color: #00F;">New product created</h1>';
					
			echo '<meta http-equiv="refresh" content="2;URL=../vrate">';
					
			
			}
	}
}
?>