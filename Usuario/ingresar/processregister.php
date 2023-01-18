<?php 
include('../../Administrador/config/conect.php'); 


if (isset($_POST['enviar'])) {
    $nombre=$_POST['nombre'];  
    $apellido=$_POST['apellido'];  
    $cedula=$_POST['cedula'];  
    $fec_nac=$_POST['fec-nac']; 
    $email=$_POST['email'];  
    $telefono=$_POST['telefono'];  
    $direccion=$_POST['direccion'];  
    $contraseña=$_POST['Contraseña'];  
    $rol="1"; 
}
$sql= $conexion->prepare("INSERT INTO usuarios(nombres, apellidos, correo, contrasena, rol, cedula)
    VALUES (?, ?, ?, ?, ?, ?)");
    $sql->bindParam(1 , $nombre, PDO::PARAM_STR, 45); 
    $sql->bindParam(2, $apellido, PDO::PARAM_STR, 45);
    $sql->bindParam(3, $email, PDO::PARAM_STR, 70); 
    $sql->bindParam(4, $contraseña, PDO::PARAM_STR, 25); 
    $sql->bindParam(5, $rol, PDO::PARAM_INT); 
    $sql->bindParam(6, $cedula, PDO::PARAM_INT); 
    $sql-> execute(); 
//validacion de insercion   
if ($sql){
    
    $query= $conexion->prepare("INSERT INTO clientes(nombres, apellidos, fec_nac, telefono, direccion, cedula)
    VALUES(?, ?, ?, ?, ?, ?)"); 
    if($query->execute(array($nombre, $apellido, $fec_nac, $telefono, $direccion, $cedula))){
        // echo "Cliente creado"; 
        echo"<script>alert('Usuario Creado correctamente, ¡ya puedes iniciar sesion!'); 
    window.location.href='../login.php'; 
    </script>";  

    }
}else {
echo "Error: ".$sql."<br>" . $conexion->error;

}


?>