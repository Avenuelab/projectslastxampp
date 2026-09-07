<?php
$q =$_GET['q'];

$connect = new PDO('mysql:host=localhost;dbname=pesafin', 'admin', 'password');
$query = "SELECT e.empid,e.name,MONTHNAME(t.tdate)month,YEAR(t.tdate)year,t.target,SUM(l.loanamt)amt ,((SUM(l.loanamt)/ t.target)*100)met FROM employee e JOIN target t ON t.empid=e.empid
	JOIN loan l ON l.empid=t.empid WHERE MONTHNAME(t.tdate) ='$q' GROUP BY targetid ORDER BY MONTHNAME(t.tdate) ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
 
     <?php
     foreach($result as $row)
     {
      echo '
      <tr>
       <td>'.$row["name"].'</td>
	   <td>'.number_format($row["target"]).'</td>
       <td>'.number_format($row["amt"]).'</td>
	   <td>'.number_format($row["met"]).'%</td>
      </tr>
      ';
     }
     ?>


  
