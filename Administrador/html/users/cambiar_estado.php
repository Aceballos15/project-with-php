<?php 
include("../../config/conect.php"); 
if(isset($_GET['et'])){
    $estado= $_GET['et'];
    $id= $_GET['id'];
    if($estado==1){
        $new_est= 2; 
    }elseif($estado==2){
        $new_est=1; 
    }
    $sql= $conexion->prepare("UPDATE empresas SET estado= ? WHERE idempresas=?"); 
    
    if($sql->execute(array($new_est, $id))){
        header('location: ../empresas.php'); 
    } 

}
if(isset($_GET['est_vend'])){
    $estado= $_GET['est_vend'];
    $id= $_GET['idvend'];
    if($estado==1){
        $new_est= 2; 
    }elseif($estado==2){
        $new_est=1; 
    }
    $sql= $conexion->prepare("UPDATE vendedores SET estado= ? WHERE idvendedores=?"); 
    if($sql->execute(array($new_est, $id))){
        header('location: ../vendedores.php'); 
    } 

}
if(isset($_GET['est_product'])){
    $estado= $_GET['est_product'];
    $id= $_GET['id_product'];
    if($estado==1){
        $new_est= 2; 
    }elseif($estado==2){
        $new_est=1; 
    }
    $sql= $conexion->prepare("UPDATE productos SET estado= ? WHERE idProductos=?"); 
    if($sql->execute(array($new_est, $id))){
        header('location: ../productos.php'); 
    } 

}
?>