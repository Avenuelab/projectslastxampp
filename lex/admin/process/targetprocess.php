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
	
		$empid=mysqli_real_escape_string($conn,$_POST['empid']);
		$tamt=mysqli_real_escape_string($conn,$_POST['tamount']);
		$dtoday=mysqli_real_escape_string($conn,$_POST['dtoday']);
		$tardt= date('Ymd',strtotime($dtoday));
		$tarch= date('Y-m-d',strtotime($dtoday));		
		$tSQL="SELECT * FROM target WHERE empid=trim('$empid') AND monthname(tdate)=monthname(CURRENT_DATE) AND year(tdate)=year(CURRENT_DATE)";
		//echo $tSQL;
		$tQuery=mysqli_query($conn,$tSQL);
		 $rowcount=mysqli_num_rows($tQuery);

		if($rowcount>0){
			echo '<h1 style="color: #F0F;">Target for the month already set. </h1>';
			echo '<meta http-equiv="refresh" content="2;URL=../target">';
		}else{		
		
			$tarSQL="INSERT INTO target(tdate,empid,target)VALUES($tardt,'$empid',$tamt)";
			$tarQuery=mysqli_query($conn,$tarSQL);
			
			if(!$tarQuery){
				echo "There is an Erro: ".mysqli_error($conn);
				}else{
						echo '<h1 style="color: #0F0;">Target Set successfully. </h1>';
						echo '<meta http-equiv="refresh" content="2;URL=../target">';
				}
		}
	}
}
?>