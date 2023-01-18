<?php 
include('../../config/conect.php');
if(isset($_POST['agregar'])){
    $name= $_POST['name']; 
    $apellido= $_POST['apellidos'];
    $correo= $_POST['email'];
    $cedula= $_POST['cedula'];
    $rol= 4; 

    $sql= $conexion->prepare("INSERT INTO usuarios(nombres, apellidos, correo, contrasena, rol, cedula)
    VALUES(?, ?, ?, ?, ?, ?)"); 
    if($sql->execute(array($name, $apellido, $correo, $cedula, $rol, $cedula))){
        echo"
        <script>
            alert('Administrador creado correctamente, ya puede iniciar sesion'); 
        </script>";
        header('location: ../control_admins.php'); 
    }

}

?>