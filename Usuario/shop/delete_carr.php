<?php 
session_start(); 
if(isset($_GET['vaciar'])){
    unset($_SESSION['carrito'], $_SESSION['total']); 
    header('location: ../shop.php'); 
}
if(isset($_GET['item'])){
    $producto= $_GET['item'];  
    unset($_SESSION['carrito'][$producto]); 
    header('location: ../xdetails/shopping-cart.php'); 
}


?>