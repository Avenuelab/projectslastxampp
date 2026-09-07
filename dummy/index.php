<?php 
//1. Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position.

$num=1;
while ($num<10){
	echo $num . '-';
	$num++;
	if ($num==10) {
		echo "10";
	}
}
echo "<br>";
for ($i=0; $i <10 ; $i++) { 
	echo $i . '-';
	
}if ($i==10) {
		echo "10";
	}
	



?>
<button><a href="q2.php"> Q2</a></button>
