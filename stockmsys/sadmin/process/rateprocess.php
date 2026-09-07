<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	if($_POST)
	{
			$id =mysqli_real_escape_string($conn, $_POST['nwinterest']);
			$loanfee =mysqli_real_escape_string($conn, $_POST['nwloan']);
			$crbcharge =mysqli_real_escape_string($conn, $_POST['crbcharge']);
			$login=$_SESSION['name'];
			
	}else{
			
echo "There was a problem";
			
			echo '<meta http-equiv="refresh" content="2;URL=../rates">';
			
    exit;

	}
	

	$sql="INSERT INTO interestrate(Rate,crbcharge,loanrate,login) VALUES($id,$crbcharge,$loanfee,'$login')";
	$rs=mysqli_query($conn,$sql);
	if(!$rs){
		echo "Check your Value and Try again. ".$sql." ".mysqli_error($conn);
			
		echo '<meta http-equiv="refresh" content="2;URL=../rates">';
		
	}else{
		
	echo "New Rates Effected";
			
		echo '<meta http-equiv="refresh" content="2;URL=../rates">';
			
	
	}
	
}	
?>