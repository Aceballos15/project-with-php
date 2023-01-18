<?php 
if(isset($_POST['send'])){
    include ('../../Administrador/config/conect.php'); 
    $nombreEmp=$_POST['nombreEmp']; 
    $nit=$_POST['nit'];   
    $nombre=$_POST['nombre']; 
    $ImgSrc=$_FILES['ImgSrc'];  
     $estado= "1"; 
     $rol= "3"; 
    $fecha= new DateTime(); 
    $nombreArchivo=($ImgSrc!="")?$fecha->getTimestamp()."_".$_FILES['ImgSrc']['name']:"imagen.jpg"; 
    $tmpImage= $_FILES['ImgSrc']['tmp_name']; 

    if ($tmpImage!="") {
        move_uploaded_file($tmpImage, "../src/img/empresas/". $nombreArchivo); 
    }

    $sql= $conexion->prepare("INSERT INTO empresas(nombre_empresa, nit, estado, responsable_admin, imagen) 
    VALUES(?, ?, ?, ?, ?)"); 
    // $sql->bindParam(1, $nombreEmp); 
    // $sql->bindParam(2, $nit); 
    // $sql->bindParam(3, $nombre); 
    // $sql->bindParam(4, $nombreArchivo);  
    // $sql->execute(); 
    //validacion de insercion   
    if ($sql->execute(array($nombreEmp,$nit, $estado, $nombre,$nombreArchivo))){
        // echo "<script>alert('Usuario ingresado correctamente')</script>";
        $query= $conexion->prepare("INSERT INTO usuarios(nombres, correo, contrasena, rol)
        VALUES(?, ?, ?, ?)"); 
        if($query->execute(array($nombreEmp, $nombreEmp, $nit, $rol))){
            header('location: ../login.php'); 
        }
    }else {
        echo "Error: ".$sql."<br>" .$conexion->error;
    }

}
?>