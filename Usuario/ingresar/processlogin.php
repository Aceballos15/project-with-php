<?php
include('../../Administrador/config/conect.php'); 
if (isset($_POST['iniciar'])) {
    $user=$_POST['user'];  
    $password=$_POST['password'];  
}
$sql=$conexion->prepare("SELECT idusuarios, nombres, contrasena, correo, rol, cedula FROM usuarios 
WHERE nombres=? and contrasena=? or correo=? and contrasena=? "); 
$sql->execute([$user, $password, $user, $password]);

if ($sql->rowCount()>0) {
    $arr= $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arr as $row) {
        $nombres=$row['nombres'];
        $correo=$row['correo'];
        $contraseña=$row['contrasena'];
        $id=$row['idusuarios']; 
        $rol=$row['rol']; 
        $cedula=$row['cedula']; 
    }
    if ($user==$nombres and $contraseña==$password){
        echo "datos correctos"; 
        session_start(); 
        $_SESSION['id']=$id; 
        $_SESSION['name']=$nombres;
        $_SESSION['rol']= $rol; 
        $_SESSION['cedula']= $cedula; 
        if ($rol==1) {
            header('location: ../index.php'); 
        }elseif($rol>1){
            if($rol<4){
                if($rol==3){
                    $idemp= $conexion->prepare("SELECT idempresas FROM empresas WHERE nit=?");
                    $idemp->execute([$password]);
                   $result= $idemp->fetchAll(PDO::FETCH_ASSOC); 
                   foreach($result as $id){
                    $id= $id['idempresas']; 
                   }
                     header('location: ../../Administrador/html/inicio.php?id='.$id);
                }elseif($rol==2){
                    $idvend= $conexion->prepare("SELECT idvendedores FROM vendedores WHERE cedula= ?"); 
                    $idvend->execute([$password]); 
                     $result= $idvend->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $id){
                        $id= $id['idvendedores']; 
                    }
                    header('location: ../../Administrador/html/inicio.php?id='.$id); 
                }
            }else{
                header('location: ../../Administrador/html/index.php');
            }

        }

    }elseif($correo=$user and $contraseña=$password){
        echo "datos correctos"; 
        session_start(); 
        $_SESSION['id']=$id; 
        $_SESSION['name']=$nombres;
        $_SESSION['rol']= $rol; 
        $_SESSION['cedula']= $cedula; 
        if ($rol==1) {
            header('location: ../index.php'); 
        }elseif($rol>1){
            if($rol<4){
                if($rol==3){
                    $idemp= $conexion->prepare("SELECT idempresas FROM empresas WHERE nit=?");
                    $idemp->execute([$password]);
                    $result= $idemp->fetchAll(PDO::FETCH_ASSOC); 
                    $id= $result['idempresas'];
                    foreach($result as $id){
                        $id= $id['idempresas']; 
                    }
                     header('location: ../../Administrador/html/inicio.php?id='.$id);
                }elseif($rol==2){
                    $idvend= $conexion->prepare("SELECT idvendedores FROM vendedores WHERE cedula= ?"); 
                    $idvend->execute([$password]); 
                     $result= $idvend->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $id){
                        $id= $id['idvendedores']; 
                    }
                    header('location: ../../Administrador/html/inicio.php?id='.$id); 
                }
            }else{
                header('location: ../../Administrador/html/index.php');
            }

        }
    }

}else{
    $msg="usuario y/o contraseña incorrectos"; 
    header("location: ../login.php?error=$msg"); 
     
}

?>