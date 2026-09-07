<?php
session_start();
$custmail= $_SESSION['login'];
$custname= $_SESSION['username'];


$msg="Order Made by ". $custname ." Successfully";
	
	$email = "info@prormcoh.co.ke" . "\r\n" .
			"CC: ericsarglobalsuppliers@gmail.com"; // company mail
	  $mailto =  $custmail ; // recipient mail
	  $mailsubj = "Order Made";
	  $mailhead = "From: $email";
	  $mailbody=$msg;
	 if (mail($mailto,$mailsubj,$mailbody,$mailhead)) {
	   echo("<p>Email successfully sent!</p>");
	   echo '<meta http-equiv="refresh" content="2;URL=track-order.php">';
	   unset($_SESSION['cart']);
	  } else {
	   echo("<p>Email delivery failed…</p>");
	   echo '<meta http-equiv="refresh" content="2;URL=track-order.php">';
	   unset($_SESSION['cart']);
	  }
?>