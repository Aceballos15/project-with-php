<?php 
include('navbar.php'); 
?>
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Quienes somos</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Acerca de nosotros</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__pic">
                        <img src="src/img/empresa.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>¿Quienes somos?</h4>
                        <p>Somos una empresa que se preocupa por tu comodidad y queremos ofrecerte un servicio de calidad, 
                            hasta la puerta de tu casa.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>¿Qué hacemos?</h4>
                        <p>Buscar las mejores soluciones para llevar productos de calidad hasta la puerta de tu hogar.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>¿Por Qué elegirnos?</h4>
                        <p>No te preocupes por tu pedido, puedes pagarnos cuando lo tengas en tus manos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="testimonial__text">
                        <span class="icon_quotations"></span>
                            <p>
                                “¿Salir después del trabajo? Llévate tu rizador de butano a la oficina, caliéntalo, 
                                péinate antes de salir de la oficina y no tendrás que hacer un viaje de vuelta a casa.”
                        </p>
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="src/img/about/team-1.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Augusta Schultz</h5>
                                <p>Fashion Design</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="testimonial__pic set-bg" data-setbg="src/img/instagram/instagram-5.jpg"></div>
                </div>
            </div>
        </div>
    </section>


    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Nuestro equipo</span>
                        <h2>Conoce nuestro equipo</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="src/img/about/team-1.jpg" alt="">
                        <h4>Alexander Ceballos</h4>
                        <span>Lider y desarollador backend</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="src/img/about/team-2.jpg" alt="">
                        <h4>Miguel Delgado</h4>
                        <span>desarollador Frontend</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="src/img/about/team-3.jpg" alt="">
                        <h4>Juliana Ramírez</h4>
                        <span>desarrollador Frontend</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="src/img/about/team-4.jpg" alt="">
                        <h4>Lisseth Chica</h4>
                        <span>Desarrollador Frontend</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="src/img/about/team-4.jpg" alt="">
                        <h4>Sebastian Quintero</h4>
                        <span>Desarrollador Frontend</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
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