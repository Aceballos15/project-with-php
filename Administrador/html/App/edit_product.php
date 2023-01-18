<?php 
include('../../config/conect.php'); 

if(isset($_POST['editar'])){
    $idproducto= $_POST['idproducto'];
    $nombre= $_POST['nombre'];  
    $precio= $_POST['precio'];  
    $stock= $_POST['stock'];  
    $descripcion= $_POST['descripcion']; 
    $estado= $_POST['estado'];  
    $sql= $conexion->prepare("UPDATE productos SET nombres=?, precio=?, stock=?, estado=?, descripcion=? WHERE idProductos=?"); 
    $result= $sql->execute(array($nombre, $precio, $stock, $estado, $descripcion, $idproducto)); 
    if($result){
        echo "<script>
            alert('Producto modificado correctamente'); 
            window.location.href= '../productos.php'; 
        </script>"; 
    }else{
        header("location: ../for_edit_product.php"); 
    }
}


?>