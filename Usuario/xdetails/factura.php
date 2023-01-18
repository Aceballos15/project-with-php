<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="zxx">

 <head>
        <meta charset="UTF-8">
        <meta name="description" content="Male_Fashion Template">
        <meta name="keywords" content="Male_Fashion, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AtineaOficial</title>
        <link rel="stylesheet" href="../src/css/style2.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/style.css" type="text/css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/css/wsp.css" type="text/css">
</head>
<body>
    <!-- Page Preloder -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <?php
                            session_start(); 
                            if(isset($_SESSION['id']) and (isset($_SESSION['name']))){
                            ?>
                                <div class="header__top__links">
                            
                                    <a href="#" >
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        <?php echo $_SESSION['name']; ?>  
                                    </a>
                                </div>
                            <?php
                            }else {
                                echo ""; 
                            }
                        ?>
                    </div>
                         
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                         
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="../index.php"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/TiendaOnline/Usuario/src/img/Atinea.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                
                    </nav>
                </div>

                <section class="shopping-cart spad">
        <div class="container">
        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Tu Orden</h4>
                                <div class="checkout__order__products">Productos<span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <?php  $total= 0; 
                                    if(isset($_SESSION['carrito'])){
                                        foreach($_SESSION['carrito'] as $indice=>$arreglo){
                                            $total += $arreglo['cantidad']* $arreglo['precio']; 
                                            
                                    ?>
                                    <li><?php echo $arreglo['nombres'];?><span>$ <?php echo $arreglo['precio']*$arreglo['cantidad']; ?></span></li>

                                    <?php }} 
                                    
                                    ?>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>$<?php echo $total; ?></span></li>
                                    <li>Servicio <span>$<?php echo 8000 ?></span></li>
                                    <li>Total <span>$<?php echo $total+8000; ?></span></li>
                                </ul>

                            </div>
                        </div>
    <?php 
$html=ob_get_clean(); 
require_once('libreria/autoload.inc.php'); 
USE Dompdf\Dompdf; 
$dompdf= new Dompdf(); 

$options= $dompdf->getOptions(); 
$options->set(array('isRemoteEnabled'=> true)); 
$dompdf->setOptions($options); 

$dompdf->loadHtml($html); 
$dompdf->setPaper('A4'); 
$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false)); 

?>
</body>
</html>