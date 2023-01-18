  <!-- Offcanvas Menu Begin -->
<?php 
include("../../Administrador/config/conect.php"); 
include('navbar.php'); 
if(isset($_GET['id_product'])){
    $id_product= $_GET['id_product']; 
    $sql= $conexion->prepare("SELECT * FROM productos where idProductos= ?");
    $sql->execute([$id_product]); 
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); 
}
?>
    <!-- Header Section End -->

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="../index.php">Home</a>
                            <a href="../shop.php">Shop</a>
                            <span>Detalle de producto</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($resultado as $result):?>
                    <div class="col-lg-12 col-md-12">
                        <div class="tab-content">
                            <div class="mx-auto">
                                <div class="product__details__pic__item">
                                    <img src="../../Administrador/img/productos/<?php echo $result['imagen']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h3><?php echo $result['nombres']; ?></h3>
                            <h4>$<?php echo $result['precio']; ?></h4>
                            <p><?php echo $result['descripcion']; ?></p>
                            <div class="product__details__cart__option">
                            <form action="../shop/agregar.php" method="POST">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" name="cantidad">
                                        <input type= "hidden" value="<?php echo $result['idProductos']; ?>" name= "id_product">
                                        <input type= "hidden" value="<?php echo $result['precio']; ?>" name= "precio">
                                        <input type= "hidden" value="<?php echo $result['nombres']; ?>" name= "nombres">
                                        <input type= "hidden" value="<?php echo $result['stock']; ?>" name= "stock">
                                        <input type= "hidden" value="<?php echo $result['empresas_idempresas']; ?>" name= "empresa">
                                        <input type= "hidden" value="<?php echo $result['imagen']; ?>" name= "imagen">
                                    </div>
                                </div>
                                <button type="submit" name="agregar" class="primary-btn">Añadir al carrito</button>
                            </form>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Informacion Adicional</span></h5>
                                <ul>
                                    <li><span>Disponible:</span> <?php echo $result['stock']; ?></li>
                                    <li><span>Categoria:</span> <?php echo $result['categoria']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" >
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href=""
                                    role="tab">Comentarios</a>
                                </li>
                                <li class="nav-item">
                                 <a href="comentar.php?producto=<?php echo $id_product; ?>"  class="nav-link active">Comentar</a>
                                </li>
                            </ul>
                           
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Comentarios</h5>
                                            <?php 
                                            $comentario= $conexion->prepare("SELECT * FROM comentarios WHERE Productos_idProductos=?"); 
                                            $comentario->execute(array($id_product)); 
                                            $comentarios= $comentario->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach($comentarios as $coment){
                                        
                                            ?>
                                            <h6><?php echo $coment['fec_public']; ?></h6>
                                            <p><?php echo $coment['comentarios']; ?></p>
                                            <hr>
                                                    
                                       <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Shop Details Section End -->
    <!-- Footer Section Begin -->
<?php 
include('footer.php'); 
?>
    <!-- Footer Section End -->
    
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
</div>
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