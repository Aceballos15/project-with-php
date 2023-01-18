<?php 
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>
    alert('Lo sentimos, para agregar productos al carrito debe iniciar sesion en su cuenta o crear una nueva'); 
    window.location.href='../login.php'; 
    </script>"; 
}else{
    if(isset($_POST['agregar'])){
    $id_product= $_POST['id_product']; 
    $nombres= $_POST['nombres']; 
    $precio= $_POST['precio']; 
    $stock= $_POST['stock']; 
    $cantidad= $_POST['cantidad']; 
    $empresa= $_POST['empresa']; 
    $imagen= $_POST['imagen']; 
  
   if($cantidad>$stock){
    echo"<script>
    alert('Lo sentimos, no hay suficientes unidades para completar su pedido en este momento'); 
    window.location.href='../'; 
    </script>"; 
   }else{
        $_SESSION['carrito'][$nombres]['nombres']=$nombres;
        $_SESSION['carrito'][$nombres]['imagen']=$imagen;
        $_SESSION['carrito'][$nombres]['cantidad']=$cantidad;
        $_SESSION['carrito'][$nombres]['precio']=$precio;
        $_SESSION['carrito'][$nombres]['empresa']=$empresa;
        $_SESSION['carrito'][$nombres]['id_product']=$id_product; 
        $_SESSION['carrito'][$nombres]['stock']=$stock; 
        header('location: ../xdetails/shopping-cart.php'); 
     }
    }
}

?>