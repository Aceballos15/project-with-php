<?php 
include('navbar.php'); 
include('../Administrador/config/conect.php'); 
?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="src/img/empresa.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tu propio negocio a un clik</h2>
                    <b><h4>Registrate ahora y comienza a vender tus productos</h4></b><br>
                    <a href="ingresar/registeremp.php" class="primary-btn">Registrarse<span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
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
    <!-- Blog Section End -->

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
</body>

</html>