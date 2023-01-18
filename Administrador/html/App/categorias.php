<?php 
$total= $conexion->prepare("SELECT * FROM productos"); 
$total->execute(); 
$prod_total= $total->rowCount(); 

$elect= $conexion->prepare("SELECT * FROM productos WHERE categoria= ?"); 
$elect->execute(["electronica"]); 
$electronica= $elect->rowCount();

$mod= $conexion->prepare("SELECT * FROM productos WHERE categoria= ?"); 
$mod->execute(["moda"]); 
$moda= $mod->rowCount(); 

$hog= $conexion->prepare("SELECT * FROM productos WHERE categoria= ?"); 
$hog->execute(["hogar"]); 
$hogar= $hog->rowCount(); 

$dep= $conexion->prepare("SELECT * FROM productos WHERE categoria= ?"); 
$dep->execute(["deporte"]); 
$deporte= $dep->rowCount();  


?>