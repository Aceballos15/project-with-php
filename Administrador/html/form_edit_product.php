<?php 
include("nav.php");  
if(isset($_GET['id_product'])){
    $query= $conexion->prepare("SELECT * FROM productos WHERE idProductos= ?");
    $query->execute([$_GET['id_product']]); 
    $resultado= $query->fetchAll(PDO::FETCH_ASSOC); 
    foreach($resultado as $result){
        $id= $result['idProductos']; 
        $nombre= $result['nombres']; 
        $precio= $result['precio'];
        $stock= $result['stock'];  
        $descripcion= $result['descripcion']; 

    } 
}

?>
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="hidden"
                    class="form-control border-0 shadow-none" 
                    <h3>Información Personal</h3>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mi perfil</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="users/logOut.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">cerrar sesion</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
           
          </nav>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Editar/</span> Producto</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form action="App/edit_product.php" id="form-add" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="Nombre">Nombre</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $nombre; ?>" id="Nombre" name="nombre" placeholder="Nombre de producto" required/>
                            <input type="hidden" name="idproducto" value="<?php echo $id; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="precio">Precio</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                              value="<?php echo $precio; ?>"
                                type="number"
                                id="precio"
                                class="form-control"
                                placeholder="$........ (digite el valor sin puntos ni comas)"
                                name="precio"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="stock">Stock</label>
                          <div class="col-sm-10">
                            <input
                            value="<?php echo $stock; ?>"
                              type="number"
                              id="stock"
                              class="form-control"
                              name="stock"
                              placeholder="cantidad de producto"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="estado">Estado</label>
                          <div class="col-sm-10">
                          <select name="estado" class="form-control" id="estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactico</option>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="descripcion">Descripcion</label>
                          <div class="col-sm-10">
                            <textarea
                              id="descripcion"
                              class="form-control"
                              name="descripcion"
                              placeholder="Descripcion de su nuevo producto"
                            ><?php echo $descripcion; ?></textarea>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" id="add" name= "editar" class="btn btn-success">Editar producto</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include("footer.php"); 
?>