<?php 

include("../../config/conect.php"); 

if(isset($_GET['env'])){
    $estado= $_GET['est'];
    $env= $_GET['env'];
    if($estado==1){
        $new_est= 2; 
    }elseif($estado==2){
        $new_est=3; 
    }
    $sql= $conexion->prepare("UPDATE envios SET estado= ? WHERE idEnvios=?"); 
    if($sql->execute(array($new_est, $env))){
        echo "
        <script>
            alert('El Producto se estara enviando a las bodegaas oficiales de Atinea y posteriormente al usuario');
            window.location.href='../envios.php';  
        
        </script>"; 
    } 
}






?>