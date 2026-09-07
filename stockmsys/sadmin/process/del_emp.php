<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{

$empid=mysqli_real_escape_string($conn,$_GET['empid']);

$empSQL="DELETE FROM employee WHERE empid='$empid'";
$Q_emp=mysqli_query($conn,$empSQL);

		echo '<h1 style="color: #FF0;">Employee Deleted. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../empdele">';	
}