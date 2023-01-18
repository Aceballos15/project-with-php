<?php 
session_start(); 
include('../../config/conect.php'); 
if(isset($_POST['agregar'])){
    $nombre=$_POST['nombre']; 
    $apellidos=$_POST['apellidos']; 
    $correo=$_POST['correo'];
    $cedula=$_POST['cedula'];
    $estado= 1; 
    $rol= 2; 
    $empresa= $_SESSION['idt']; 
}
$sql= $conexion->prepare("INSERT INTO vendedores(nombres, apellido, correo, contrasena, cedula, estado, empresas_idempresas) VALUES(?, ?, ?, ?, ?, ?, ?)"); 
$sql->bindParam(1 , $nombre, PDO::PARAM_STR, 45); 
$sql->bindParam(2, $apellidos, PDO::PARAM_STR, 45);
$sql->bindParam(3, $correo, PDO::PARAM_STR, 70); 
$sql->bindParam(4, $cedula, PDO::PARAM_INT); 
$sql->bindParam(5, $cedula, PDO::PARAM_INT); 
$sql->bindParam(6, $estado, PDO::PARAM_INT); 
$sql->bindParam(7, $empresa, PDO::PARAM_INT); 
$sql-> execute(); 
if($sql){
    $query= $conexion->prepare("INSERT INTO usuarios(nombres, apellidos, correo, contrasena, rol, cedula) VALUES(?, ?, ?, ?, ?, ?)"); 
    $query->bindParam(1, $nombre, PDO::PARAM_STR, 70); 
    $query->bindParam(2, $apellidos, PDO::PARAM_STR, 25); 
    $query->bindParam(3, $correo, PDO::PARAM_STR, 25); 
    $query->bindParam(4, $cedula, PDO::PARAM_INT); 
    $query->bindParam(5, $rol, PDO::PARAM_INT); 
    $query->bindParam(6, $cedula, PDO::PARAM_INT); 
    $query->execute(); 
    header('location: ../vendedores.php'); 
}


?>