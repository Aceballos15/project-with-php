<?php 
include('../../config/conect.php'); 

if(isset($_POST['editar_info-admin'])){
    $id=$_POST['iduser']; 
    $nombres=$_POST['new_name']; 
    $apellidos=$_POST['new_apellidos']; 
    $email=$_POST['new_email']; 
    $cedula=$_POST['new_cedula']; 
    $sql= $conexion->prepare("UPDATE usuarios SET nombres=?, apellidos=?, correo=?, cedula=? WHERE idusuarios=?"); 
    $sql->execute(array($nombres, $apellidos, $email, $cedula, $id)); 
    if($sql){
        echo "
        <script> 
        alert('Datos del administrador modificados satisfactoriamente');
        window.location.href='../Control_admins.php';  
        </script>"; 
    }else{
        var_dump($conexion->errorInfo()); 
    }
}
if(isset($_POST['edit-info-vend'])){
    $id=$_POST['idvendedores']; 
    $nombres=$_POST['new_name']; 
    $apellidos=$_POST['new_apellido']; 
    $correo=$_POST['new_correo']; 
    $cedula=$_POST['new_cedula']; 
    $query= $conexion->prepare("UPDATE vendedores SET nombres=?, apellido=?, correo=?, cedula=?, contrasena=? WHERE idvendedores=?"); 
    $query->execute(array($nombres, $apellidos, $correo, $cedula, $cedula, $id)); 
    if($query){
        echo "
        <script> 
        alert('Datos del vendedor modificados satisfactoriamente');
        window.location.href='../vendedores.php';  
        </script>"; 
    }else{
        var_dump($conexion->errorInfo()); 
    }
}



?> 