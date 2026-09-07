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
	
		$tedit=mysqli_real_escape_string($conn,$_POST['tarid']);
		$empid=mysqli_real_escape_string($conn,$_POST['empid']);
		$tamt=mysqli_real_escape_string($conn,$_POST['tamount']);
		$dtoday=mysqli_real_escape_string($conn,$_POST['dtoday']);
		$tardt= date('Ymd',strtotime($dtoday));
		
		$tarSQL="UPDATE target SET tdate=$tardt,target=$tamt WHERE targetid=$tedit";
		$tarQuery=mysqli_query($conn,$tarSQL);
		
		if(!$tarQuery){
			echo "There is an Error: ".mysqli_error($conn);
			}else{
						echo '<h1 style="color: #0F0;">Target Changed successfully. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../edittargetview?edit_id=' . $tedit . '">'; 
				}
		
	}
}
?>