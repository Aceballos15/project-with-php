<?php 
include('../../Administrador/config/conect.php'); 
if(isset($_POST['comentar'])){
    $fecha= new DateTime(); 
    $fech= $fecha->format('y-m-d H'); 
    $comentario= $_POST['comentario']; 
    $id= $_POST['id']; 
    $query= $conexion->prepare("INSERT INTO comentarios (comentarios, fec_public, Productos_idProductos) VALUES (?,?,?)");
    $query->bindParam(1, $comentario, PDO::PARAM_STR, 200); 
    $query->bindParam(2, $fech, PDO::PARAM_STR, 20); 
    $query->bindParam(3, $id, PDO::PARAM_INT); 
    $query->execute(); 
    if($query){  
        header('location: shop-details.php?id_product='.$id); 
    }else{
    echo $conexion->errorInfo(); 
}
}



?> 