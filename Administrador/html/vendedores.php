<?php 
include("nav.php");  
$activo= 1; 
if($role==3){ 
  $sql=$conexion->prepare("SELECT * FROM vendedores WHERE empresas_idempresas=? and estado= ?"); 
  $sql->execute(array($_SESSION['idt'], $activo)); 
  $resultad= $sql->fetchAll(PDO::FETCH_ASSOC );
}else{
  $sql=$conexion->prepare("SELECT * FROM vendedores WHERE estado= ?"); 
  $sql->execute(array($activo)); 
  $resultad= $sql->fetchAll(PDO::FETCH_ASSOC );
}
$count= $sql->rowCount();
$paginas= ceil($count/15); 

if(isset($_GET['pag'])){
  $inicio= ($_GET['pag']-1)*15;  
}else{
  $inicio= (1-1)*15; 
}
if($role==3){ 
  $query=$conexion->prepare("SELECT * FROM vendedores WHERE empresas_idempresas=:empresa and estado=:estado LIMIT :inicio, 15"); 
  $query->bindParam(':empresa', $_SESSION['idt'], PDO::PARAM_INT); 
  $query->bindParam(':estado', $activo, PDO::PARAM_INT); 
  $query->bindParam(':inicio', $inicio, PDO::PARAM_INT); 
  $query->execute(); 
  $resultado= $query->fetchAll(PDO::FETCH_ASSOC );
}else{
  $query=$conexion->prepare("SELECT * FROM vendedores WHERE estado=:estado LIMIT :inicio, 15"); 
  $query->bindParam(':estado', $activo, PDO::PARAM_INT); 
  $query->bindParam(':inicio', $inicio, PDO::PARAM_INT);
  $query->execute(); 
  $resultado= $query->fetchAll(PDO::FETCH_ASSOC );
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administrador/</span> Vendedores</h4>
                <h5 class="">Informacion de los vendedores</h5>
                <h5><a href="vend_inactivos.php">* Ver vendedores inactivos</a></h5>
                <?php if($role != 4): ?>
                <h5>
                  <button class="btn btn-success" data-bs-toggle="modal"
                          data-bs-target="#basicModal">
                    Agregar nuevo vendedor
                  </button>
                </h5>
                <?php endif ?>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($resultado as $result): ?>
                      <tr>
                        <td><?php echo $result['nombres']; ?></td>
                        <td>
                        <?php echo $result['apellido']; ?>
                        </td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $result['cedula']; ?></span></td>
                        <td>
                        <?php echo $result['correo']; ?>
                        </td>
                        <td>
                        
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                          data-bs-target="#edit<?php echo $result['idvendedores']; ?>" >
                                Editar
                            </button>
                            <a class="btn btn-danger" href="users/cambiar_estado.php?est_vend=<?php echo $result['estado'];?>
                            &idvend=<?php echo $result['idvendedores']; ?>">
                                Inhabilitar
                            </a>
                          
                        </td>
                      </tr>
                      <!-- Modales para editar -->
                      <div class="modal fade" id="edit<?php echo $result['idvendedores']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Editar informacion</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <form action="users/edit-info.php" method="post">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" id="nameBasic" name="new_name" value="<?php echo $result['nombres']; ?>"  class="form-control" placeholder="Nombre del vendedor" />
                                  <input type="hidden" value="<?php echo $result['idvendedores']; ?>" name="idvendedores">
                                  </div>
                                  <div class="col mb-0">
                                    <label for="nameBasic" class="form-label">Apellidos</label>
                                    <input type="text" id="nameBasic" name="new_apellido" value="<?php echo $result['apellido']; ?>" class="form-control" placeholder="Apellidos del vendedor" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">correo</label>
                                    <input type="email" id="emailBasic" value="<?php echo $result['correo']; ?>" name="new_correo" class="form-control" placeholder="Correo electronico" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Cedula</label>
                                    <input type="number" id="emailBasic" name="new_cedula" value="<?php echo $result['cedula']; ?>" class="form-control" placeholder="No. de documento" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" name="edit-info-vend" class="btn btn-primary">Editar</button>
                              </div>
                      </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
</div>

<!-- modal agregar vendedor -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Agregar vendedor</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <form action="users/ad_vend.php" method="post">
                                    <label for="nameBasic" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del vendedor" />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="nameBasic" class="form-label">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos del vendedor" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Correo</label>
                                    <input type="email" name="correo" class="form-control" placeholder="Correo electronico" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Cedula</label>
                                    <input type="password" name="cedula" class="form-control" placeholder="No. de documento" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" class="btn btn-primary" name= "agregar">Agregar</button>
                              </div>
                      </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                     
<!-- MODAL PARA EDITAR INFO DE USUARIO -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a href="vendedores.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="vendedores.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="vendedores.php?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav>           
<?php 
include("footer.php"); 
?>