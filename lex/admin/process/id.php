<?php
session_start();
include_once('../../_inc/connect.php');
error_reporting(E_ALL ^ E_NOTICE);
$custid=$_SESSION['custid'];
$newfilenameID=$_SESSION['newfilenameID'];
$newfilename=$_SESSION['newfilename'];

$strID = substr($newfilenameID, 3);
$str = substr($newfilename, 3);

$sql="UPDATE customer SET idpic='$strID',picpath='$str' WHERE customerid LIKE '".$custid. "'";
$query=mysqli_query($conn,$sql);
echo '<meta http-equiv="refresh" content="2;URL=../allmember">';


unset($_SESSION['custid']);
unset($_SESSION['newfilenameID']);
unset($_SESSION['newfilename']);


?>