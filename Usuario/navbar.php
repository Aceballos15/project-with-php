<!DOCTYPE html>
<html lang="zxx">

 <head>
        <meta charset="UTF-8">
        <meta name="description" content="Male_Fashion Template">
        <meta name="keywords" content="Male_Fashion, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AtineaOficial</title>
        <link rel="stylesheet" href="src/css/style2.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
        <link rel="stylesheet" href="src/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="src/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="src/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="src/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="src/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="src/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="src/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="src/css/style.css" type="text/css">
        <link rel="stylesheet" href="src/css/wsp.css" type="text/css">
        <link rel="stylesheet" href="src/css/bootstrap.css" type="text/css">
</head>
<body>

    <!-- Page Preloder -->
        <div class="loader"></div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=3007308535&text=Hola, desearia obtener información sobre ustedes" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

 

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
                            <div class="header__top__links">
                            <?php if (!isset($_SESSION['name'])): ?> 
                                <a href="login.php" >Iniciar Sesión</a>
                                <a href="register.php">Registrarse</a>
                             <?php endif ?>
                                <a href="ingresar/logout.php">
                                    <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>  
                                </a>
                            </div>
                         
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="src/img/Atinea.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="../Usuario/index.php">Inicio</a></li>
                            <li  class=""><a href="../Usuario/shop.php">Tienda</a></li>
                            <li><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="./blog.php">Empresas</a></li>
                                    <li><a href="./about.php">Acerca de nosotros</a></li>
                                </ul>
                            </li>
                            <li><a href="../Usuario/contact.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="xdetails/shopping-cart.php"><img src="src/img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$<?php if(isset($_SESSION['total'])){
                            echo $_SESSION['total']; 
                        }else{
                            echo "0.00"; 
                        } ?>
                            </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>