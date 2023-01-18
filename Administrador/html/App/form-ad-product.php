<?php 
session_start();
include('../../config/conect.php');
$id= $_SESSION['idt']; 
if(isset($_POST['add'])){
    if($_SESSION['rol']==2){
        $query= $conexion->prepare("SELECT empresas_idempresas FROM vendedores WHERE idvendedores=?");
        $query->execute(array($id)); 
        $result= $query->fetchAll(PDO::FETCH_ASSOC );
        foreach($result as $r){
            $idemp= $r['empresas_idempresas']; 
        }
    }else{
        $idemp= $_SESSION['idt']; 
    }
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio']; 
    $imagen= $_FILES['imagen']; 
    $stock= $_POST['stock'];  
    $estado= $_POST['estado']; 
    $descripcion= $_POST['descripcion']; 
    $categoria= $_POST['categoria']; 
    $fecha= new DateTime(); 
    $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES['imagen']['name']:"imagen.jpg"; 
    $tmpImage= $_FILES['imagen']['tmp_name']; 

    if ($tmpImage!="") {
        move_uploaded_file($tmpImage, "../../img/productos/". $nombreArchivo); 
    }
    $sql= $conexion->prepare("INSERT INTO productos(nombres, precio, imagen, stock, estado, descripcion, categoria, empresas_idempresas) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"); 
    $sql->bindParam(1, $nombre, PDO::PARAM_STR, 50); 
    $sql->bindParam(2, $precio, PDO::PARAM_INT); 
    $sql->bindParam(3, $nombreArchivo, PDO::PARAM_STR, 100); 
    $sql->bindParam(4, $stock, PDO::PARAM_INT); 
    $sql->bindParam(5, $estado, PDO::PARAM_INT); 
    $sql->bindParam(6, $descripcion, PDO::PARAM_STR, 200); 
    $sql->bindParam(7, $categoria, PDO::PARAM_STR, 25); 
    $sql->bindParam(8, $idemp, PDO::PARAM_INT);
    if($sql->execute()){
        echo "<script>
        alert('El producto fue ingresado correctamente');
        window.location.href='../ad_product.php';  
        </script>"; 
    }else{
        echo "hubo un error". $sql->errorInfo(); 
    }
}
echo $idemp; 


?>