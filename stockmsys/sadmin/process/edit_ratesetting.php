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
		$rid=mysqli_real_escape_string($conn,$_POST['rid']);
		$pname=mysqli_real_escape_string($conn,$_POST['pname']);
		$rate=mysqli_real_escape_string($conn,$_POST['rate']);
		$cal=mysqli_real_escape_string($conn,$_POST['ical']);
		$ratetype=mysqli_real_escape_string($conn,$_POST['ratetype']);
		$fee=trim(mysqli_real_escape_string($conn,$_POST['fee']));
		$amt=mysqli_real_escape_string($conn,$_POST['amt']);
		$prule=mysqli_real_escape_string($conn,$_POST['prule']);
		$lmt=mysqli_real_escape_string($conn,$_POST['lmt']);
		$pdt= date('Ymd');
		$login=htmlentities($_SESSION['user']['username']);
		$sql="UPDATE ratesetting SET pname='$pname', calc='$cal', loanlimit=$lmt,rate=$rate,ratetype='$ratetype',pfee='$fee',pamt='$amt',prule='$prule',pdate=$pdt,login='$login' WHERE rateid=$rid";
		$rs=mysqli_query($conn,$sql);
			if(!$rs){
				echo "Check your Value and Try again. ".$sql." ".mysqli_error($conn);
					
				echo '<meta http-equiv="refresh" content="2;URL=../ratesettings?edit_id=rid">';
				
			}else{
				
			echo '<h1 style="color: #0F0;">Product Updated</h1>';
					
			echo '<meta http-equiv="refresh" content="2;URL=../vrate">';
					
			
			}
	}
}
?>