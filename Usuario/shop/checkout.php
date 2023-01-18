<?php 
include('../../Administrador/config/conect.php'); 
session_start(); 
if(isset($_POST['checkconfirm'])){
    $nombre= $_POST['nombre']; 
    $precio= 8000; 
    $apellido= $_POST['apellido']; 
    $pais= $_POST['pais']; 
    $est= 1; 
    $direccion= $_POST['direccion']; 
    $estado= $_POST['estado']; 
    $celular= $_POST['celular']; 
    $correo= $_POST['correo']; 
    $query= $conexion->prepare("SELECT * FROM clientes WHERE cedula=?"); 
    $query->execute([$_SESSION['cedula']]); 
    $resultaso= $query->fetchAll(PDO::FETCH_ASSOC); 
    foreach($resultaso as $result){
        $idcliente= $result['idClientes']; 
    } 
    foreach($_SESSION['carrito'] as $item=>$producto){
        $total_art = $producto['cantidad']*$producto['precio']; 
        $sql= $conexion->prepare("INSERT INTO carritos(cantidad, ptotal, clientes_idClientes, Productos_idProductos)
        VALUES(?,?,?,?)"); 
        $sql->execute(array($producto['cantidad'], $total_art, $idcliente, $producto['id_product']));
        $id_carr= $conexion->lastInsertId(); 
        if($sql){ 
            $new_cant= ($producto['stock'])-($producto['cantidad']); 
            $query= $conexion->prepare("UPDATE productos SET stock= ? WHERE idProductos= ?"); 
            $query->execute(array($new_cant, $producto['id_product'])); 
          
            if($query){
                $fecha= new DateTime();
                $fech= $fecha->format('Y-m-d H');  
                $dir= $estado. ", ".$direccion; 
                $query2= $conexion->prepare("INSERT INTO envios(precio_env, fecha, direccion, estado, empresas_idempresas, carritos_idcarritos)
                VALUES(?,?,?,?,?,?)"); 
                $query2->execute(array($precio, $fech, $dir, $est, $producto['empresa'], $id_carr)); 
                 echo "<script> 
                alert('Muchas Gracias por su compra, sus articulos estran en la puerta de su casa antes de lo que espeas');
                window.location.href='delete_carr.php?vaciar=true';  
                </script>"; 
            }
        }
        
    }
}

?>