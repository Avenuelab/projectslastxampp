<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	$customerid=$_POST['customerid'] ;
	$description = $_POST['descr'];
	$serialno = $_POST['serialno'];
	$ivalue = $_POST['cost'];
	$i =0;

	$strdel="DELETE FROM chattel WHERE customerid='$customerid' ";
	$result=mysqli_query($conn,$strdel);
	$custid=$customerid;

	extract($_POST);
	$error=array();

	$cSQL="SELECT chattelid FROM chattel WHERE customerid='$customerid'";
	$extension=array("jpeg","jpg","png","gif");
	foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
		$file_name=$_FILES["files"]["name"][$key];
		$file_tmp=$_FILES["files"]["tmp_name"][$key];
		$ext=pathinfo($file_name,PATHINFO_EXTENSION);
		$cQuery=mysqli_query($conn,$cSQL);
		$rowCount=mysqli_fetch_array($cQuery);
		
		if(in_array($ext,$extension)) {
			if(!file_exists("../../chattel/".$custid."/".$file_name)) {
			   move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../chattel/".$custid.$file_name);
			   $dbname="../chattel/".$custid.$file_name;
			   $id=$rowCount['chattelid']+$key;
			   
	$sql= "INSERT INTO chattel (customerid,description,serialno,ivalue,photo) VALUES ('".$customerid."','".$description[$key]."','".$serialno[$key]."','".$ivalue[$key]."','". $dbname."')";
			
							$insert=mysqli_query($conn,$sql);

									 if(!$insert){
										echo "There was an error ".$pSQL.mysqli_error(); 
									 }else{
										echo $dbname."Image uploaded successfully <br>"; 
										echo '<meta http-equiv="refresh" content="2;URL=../chattel">';
									 }
			}
			else {
				$filename=basename($file_name,$ext);
				$newFileName=$filename.time().".".$ext;
			   move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../chattel/".$custid.$newFileName);
			   
			   $id=$rowCount['chattelid']+$key;
							echo $pSQL="UPDATE chattel SET photo='".$dbname."' WHERE chattelid='$id' AND  customerid='$customerid'";
									 $update=mysqli_query($conn,$pSQL);
									 if(!$update){
										echo "There was an error ".$pSQL.mysqli_error(); 
									 }else{
										echo $dbname."Image uploaded Replaced <br>"; 
										echo '<meta http-equiv="refresh" content="2;URL=../chattel">';
									 }
			
			}
		}
		else {
			array_push($error,"$file_name, ");
		}
	}
}
?>