<?php
include('navbar.php'); 
include('../Administrador/config/conect.php');
$query= $conexion->prepare("SELECT * FROM empresas");   
$query->execute();
$resultado= $query->fetchAll(PDO::FETCH_ASSOC);
$estado= 1; 
if(isset($_GET['ctr'])){
    $sql= $conexion->prepare("SELECT * FROM productos WHERE categoria=? and estado=? ORDER BY idProductos DESC"); 
    $sql->execute(array($_GET['ctr'], $estado)); 
    $result= $sql->fetchAll(PDO::FETCH_ASSOC);  
}elseif(isset($_GET['emp'])){
    $sql= $conexion->prepare("SELECT * FROM productos WHERE empresas_idempresas=? and estado=? ORDER BY idProductos DESC"); 
    $sql->execute(array($_GET['emp'], $estado)); 
    $result= $sql->fetchAll(PDO::FETCH_ASSOC); 
}elseif(isset($_GET['price'])){
    $precio1= $_GET['price']-100000; 
    $precio2= $_GET['price']; 
    $sql= $conexion->prepare("SELECT * FROM productos WHERE precio>=? AND precio <= ? AND estado=? ORDER BY idProductos DESC"); 
    $sql->execute(array($precio1, $precio2, $estado)); 
    $result= $sql->fetchAll(PDO::FETCH_ASSOC);
}else{
    $query= $conexion->prepare("SELECT * FROM productos WHERE estado=? ORDER BY idProductos DESC"); 
    $query->execute([$estado]); 
    $result= $query->fetchAll(PDO::FETCH_ASSOC);
}
$count= $query->rowCount();
$paginas= ceil($count/12); 

if(isset($_GET['pag'])){
  $inicio= ($_GET['pag']-1)*12;  
}else{
  $inicio= (1-1)*12; 
}


?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Tienda</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Inicio</a>
                            <span>Tienda</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="shop.php" method="POST">
                                <input type="text" name="inp" placeholder="Search...">
                                <button type="submit" name="search"><span class="icon_search"></span></button>
                              </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categorias</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="shop/filtrar.php?ctr=electronica">Electronica y Tecnologia</a></li>
                                                    <li><a href="shop/filtrar.php?ctr=moda">Moda</a></li>
                                                    <li><a href="shop/filtrar.php?ctr=hogar">Hogar y decoracion</a></li>
                                                    <li><a href="shop/filtrar.php?ctr=deporte">Deporte</a></li>
                                                    <li><a href="shop/filtrar.php?ctr=otras">Otras</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Empresas</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <?php foreach($resultado as $emp): ?>
                                                    <li><a href="shop/filtrar.php?emp=<?php echo $emp['idempresas']; ?>"><?php echo $emp['nombre_empresa']; ?></a></li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Precios</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="shop/filtrar.php?price=100000">$0.00 - $100.000</a></li>
                                                    <li><a href="shop/filtrar.php?price=200000">$100.000 - $300.000</a></li>
                                                    <li><a href="shop/filtrar.php?price=300000">$300.000 - $500.000</a></li>
                                                    <li><a href="shop/filtrar.php?price=400000">500.000+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
  
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                  
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                
                                    </div>
                                </div>
                                <div class="card">
                                
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($result as $product): ?>
                            <?php 
                            $query= $conexion->prepare("SELECT nombre_empresa FROM empresas WHERE idempresas= ?");
                            $query->execute(array($product['empresas_idempresas']));
                            $emp= $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($emp as $em){
                                    $empresa= $em['nombre_empresa']; 
                                }

                            ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="xdetails/shop-details.php?id_product=<?php echo $product['idProductos']; ?>">
                                    <img class="product__item__pic set-bg" src="../Administrador/img/productos/<?php echo $product['imagen']; ?>">
                                </a>
                                <div class="product__item__text">
                                    <h5><?php echo $product['nombres']; ?></h5>
                                    <h6 style="color: gray; "><?php echo $empresa; ?></h6>
                                    <h6><?php echo "$".$product['precio']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
                            </div>
                            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a href="shop.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="shop.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="shop.php?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
 <?php 
include('footer.php'); 
 ?>

    <!-- Footer Section End -->

    <!-- Search Begin -->
 
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