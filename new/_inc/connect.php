<?php
	    $uname="root";
        $pass="";
        $servername="localhost";
        $dbname="washa_db";

$conn=new mysqli($servername, $uname, $pass, $dbname)or trigger_error(mysqli_connect_error(),E_USER_ERROR);
//////// Do not Edit below /////////
try {
$link = new PDO('mysql:host='.$servername.';dbname='.$dbname, $uname, $pass);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}


?>
