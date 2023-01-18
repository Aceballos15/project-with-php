<?php 
include("../../Administrador/config/conect.php"); 
include('navbar.php'); 
?>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $total= 0; 
                                    if(isset($_SESSION['carrito'])){
                                        foreach($_SESSION['carrito'] as $indice=>$arreglo){
                                            $total += $arreglo['cantidad']* $arreglo['precio']; 
                                    ?>
                                <tr>

                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="../../Administrador/img/productos/<?php echo $arreglo['imagen']; ?>" width= "80px" height="auto">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $arreglo['nombres']; ?></h6>
                                            <h5><?php echo $arreglo['precio']; ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="<?php echo $arreglo['cantidad']; ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $arreglo['precio']*$arreglo['cantidad']; ?></td>
                                        <td class="cart__close"><a href="../shop/delete_carr.php?item=<?php echo $arreglo['nombres']; ?>"><i class="fa fa-close"></i></a></td>
                                </tr>
                                <?php   
                                    }
                                  }else{
                                     ?> 
                                     <div class="alert alert-danger">Carrito de compras vacio</div>
                                     <?php 
                                  }
                                  $_SESSION['total']= $total; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="../shop.php">Continuar comprando</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="../shop/delete_carr.php?vaciar=true"><i class="fa fa-spinner"></i> Vaciar Carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                    </div>
                    <div class="cart__total">
                        <h6>Detlle</h6>
                        <ul>
                            <li>Subtotal <span>$<?php echo $total; ?></span></li>
                            <li>Costo del servicio <span>$8000</span></li>
                            <hr>
                            <li>Total<span><strong>$<?php echo $total + 8000; ?></strong></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Seguir con la compra</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
<?php include ('footer.php'); ?>
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