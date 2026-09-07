<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');

$lnid=$_SESSION['lnid'];
$gid=$_SESSION['gurantorid'];

$newfilenameID=$_SESSION['newfilenameID'];
$newfilename=$_SESSION['newfilename'];

$strID = substr($newfilenameID, 3);
$str = substr($newfilename, 3);

$sql="UPDATE guarantor SET idpic='$strID',picpath='$str',accstatus='n' WHERE guarantorid='".$gid. "'";
$query=mysqli_query($conn,$sql);
$Lsql="UPDATE loan SET gstatus='A' WHERE loanid='".$lnid. "'";
$Lquery=mysqli_query($conn,$Lsql);

echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';

unset($_SESSION['custid']);
unset($_SESSION['newfilenameID']);
unset($_SESSION['newfilename']);


?>