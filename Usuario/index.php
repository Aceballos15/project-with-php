<?php
include('navbar.php'); 
include('../Administrador/config/conect.php'); 
?>
<section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="src/img/hero/hogar.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Categoría</h6>
                                <h2>HOGAR Y TECNOLOGÍA</h2>
                                <p style="color: black;"><b> Aquí encontrarás toda clase de aparatos tecnológicos y productos para el hogar. </b></p>
                                <a href="./shop.php" class="primary-btn"> Explorar <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="src/img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Categoría</h6>
                                <h2>MODA, ESTILO Y DISEÑO</h2>
                                <p>Encontrás toda clase de prendas masculinas y femeninas, para todas las edades.</p>
                                <a href="./shop.php" class="primary-btn">Explorar<span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>



    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li data-filter=".new-arrivals">Recientes</li>
                     
                    </ul>
                </div>
            </div>
<?php 
$query= $conexion->prepare("SELECT * FROM productos WHERE estado=? ORDER BY idProductos DESC LIMIT 8");
$query->execute([1]); 
$resultado= $query->fetchAll(PDO::FETCH_ASSOC);  

?>
            <div class="row product__filter">
                <?php foreach($resultado as $result): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                    <a href="xdetails/shop-details.php?id_product=<?php echo $result['idProductos']; ?>">
                        <div class="product__item__pic set-bg" data-setbg="../Administrador/img/productos/<?php echo $result['imagen']; ?>">
                        <span class="label">New</span>
                        </div>
                </a>
                        <div class="product__item__text">
                            <h6><?php echo $result['nombres']; ?></h6>
                            <h5>$<?php echo $result['precio']; ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            
        </div>
    </div>
    </section>

    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="src/img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Siguenos en nuestras red de instagram para 
                            que veas las ultimas novedades.</p>
                        <h3>#Atinea</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Lo mejor de nosotros</span>
                        <h2>Nuestras empresas</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                $sql= $conexion->prepare("SELECT * FROM empresas LIMIT 3");
                $sql->execute(); 
                $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); 
                foreach($resultado as $result){

                ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="src/img/empresas/<?php echo $result['imagen']; ?>"></div>
                        <div class="blog__item__text">
                            <span><img src="src/img/icon/calendar.png" alt=""> 6 de octubre de 2022</span>
                            <h5><?php echo $result['nombre_empresa']; ?></h5>
                          
                        </div>
                    </div>
                </div>
               <?php } ?> 
            </div>
        </div>
    </section>
<?php 
include('footer.php'); 
?>

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <script src="src/js/jquery-3.3.1.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery.nice-select.min.js"></script>
    <script src="src/js/jquery.nicescroll.min.js"></script>
    <script src="src/js/jquery.magnific-popup.min.js"></script>
    <script src="src/js/jquery.countdown.min.js"></script>
    <script src="src/js/jquery.slicknav.js"></script>
    <script src="src/js/mixitup.min.js"></script>
    <script src="src/js/owl.carousel.min.js"></script>
    <script src="src/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>