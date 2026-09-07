<?php 
/*3. Create a script to construct the following pattern, using nested for loop.

* 
* * 
* * * 
* * * * 
* * * * * */


for ($i=0; $i <5 ; $i++) { 
	
	for ($j=0; $j <$i; $j++) { 
		echo "*";
	}
	echo "<br>";

}
for ($i=5; $i>0 ; $i--) { 
	
	for ($j=0; $j <$i; $j++) { 
		echo "*";
	}
	echo "<br>";

}
?>
<button><a href="q4.php"> Q4</a></button>
