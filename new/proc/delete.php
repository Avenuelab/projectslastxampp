<?php 
session_start();
// Code for Remove a Product from Cart
if(isset($_GET))
    {

$id=$_GET['remove_code'];

unset($_SESSION['cart'][$id]);


echo "product removed ";
        echo '<meta http-equiv="refresh" content="2;URL=../cart.php">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=../checkout.php">';
     }
?>