<?php 

include_once('../../_inc/connect.php');
//error_reporting(E_ALL && ~E_NOTICE);
if(!empty($_POST)){ 

	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$sql="INSERT INTO comments(name) VALUES ('$email')";
	echo $sql;
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "You have been successfully subscribed.";
		echo "<td onblur='myFunction();'></td>";
			echo '<meta http-equiv="refresh" content="2;URL=test.php">';
			
	}
}
?>


        <script>
		 function myFunction() {
    window.print();
}

		</script>
