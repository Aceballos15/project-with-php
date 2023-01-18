<?php 
if(isset($_GET['ctr'])){
    $ctr = $_GET['ctr'];
    header('location: ../shop.php?ctr='.$ctr); 
}elseif(isset($_GET['emp'])){
    $emp=$_GET['emp']; 
    header('location: ../shop.php?emp='.$emp); 
}elseif(isset($_GET['price'])){
    $price= $_GET['price']; 
    header('location: ../shop.php?price='.$price); 
}else{
    header('location: ../shop.php'); 
}
?>