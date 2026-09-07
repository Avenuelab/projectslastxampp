<?php
session_start();
include_once('../../_inc/connect.php');
	error_reporting(E_ALL ^ E_NOTICE);
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{	
	if(empty($_SESSION['usermail'])|| $_SESSION['membertype']!=='admin' ) 
	{
		header("location:../index.html");
		
	}
	?>	
		<style>
		.notice, .success, .error {padding:0.8em;margin:0.77em 0.77em 0 0.77em;border-width:2px;border-style:solid;}
		
		.notice {background-color:#FFF6BF;color:#514721;border-color:#FFD324;}
		
		.success {background-color:#E6EFC2;color:#264409;border-color:#C6D880;}
		
		.error {background-color:#FBE3E4;color:#8a1f11;border-color:#FBC2C4;}
		
		.error a {color:#8a1f11;}
		
		.notice a {color:#514721;}
		
		.success a {color:#264409;}
		</style>

	<?php 
	if(isset($_POST))
	{
	  $email =mysqli_real_escape_string($conn,trim($_POST['txtemail']));
	  $upass = mysqli_real_escape_string($conn,trim($_POST['txtupass']));
	  $empid =mysqli_real_escape_string($conn,trim($_POST['empid']));
	  $memtype =mysqli_real_escape_string($conn,trim($_POST['memtype']));
	  $password=md5($upass);
	  
	   $sql="UPDATE employee SET email='$email',password='$password',membertype='$memtype' WHERE empid LIKE '$empid'";

	  $_query=mysqli_query($conn,$sql);
	  
			if (!$_query) {
						  die('Invalid Transaction: ' .  mysqli_error($conn));
			}else{?>
				<div class='success'>Login Details have changed</div> 
			<?php
				echo '<meta http-equiv="refresh" content="2;URL=../adminhome">';
				exit;
			}
			
	}else{ ?>
				<div class='error'>Check your entries</div> 
					<?php
					echo '<meta http-equiv="refresh" content="2;URL=../memberpass">';
	}
}
?>
