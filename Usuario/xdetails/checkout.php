<?php 
include("../../Administrador/config/conect.php"); 
include('navbar.php'); 
?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="../index.php">Home</a>
                            <a href="../shop.php">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="../shop/checkout.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Detalles del pedido</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Primer Nombre<span>*</span></p>
                                        <input type="text" name="nombre">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Apellido<span>*</span></p>
                                        <input type="text" name="apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Pais<span>*</span></p>
                                <input type="text" name="pais">
                            </div>
                            <div class="checkout__input">
                                <p>Direccion<span>*</span></p>
                                <input type="text" placeholder="Direccion del predio" class="checkout__input__add" name="direccion" required>
                            </div>
                            <div class="checkout__input">
                                <p>Estado/municipio<span>*</span></p>
                                <input type="text" name="estado">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Celular<span>*</span></p>
                                        <input type="tel" name="celular">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Correo<span>*</span></p>
                                        <input type="email" name="correo">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <li>Total <span>$<?php echo $total+8000; ?></span></li>
                                </ul>
                               
                                <button type="submit" class="site-btn" name="checkconfirm">CONFIRMAR ORDEN</button>
                                <a href="factura.php" class="site-btn" name="checkconfirm">Ver factura</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
<?php  
include('footer.php'); 
?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>