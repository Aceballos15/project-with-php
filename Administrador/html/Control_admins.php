<?php 
include("nav.php"); 
include('../config/conect.php'); 
$rol= 4; 
  $sql=$conexion->prepare("SELECT * FROM usuarios WHERE rol= ?");
  $sql->execute(array($rol)); 
  
$count= $sql->rowCount();
$paginas= ceil($count/15); 

if(isset($_GET['pag'])){
  $inicio= ($_GET['pag']-1)*15;  
}else{
  $inicio= (1-1)*15; 
}
  
$query=$conexion->prepare("SELECT * FROM usuarios WHERE rol=:rol LIMIT :inicio,15");
$query->bindParam(':inicio', $inicio, PDO::PARAM_INT);
$query->bindParam(':rol', $rol, PDO::PARAM_INT);  
$query->execute(); 
$resultado=$query->fetchAll(PDO::FETCH_ASSOC); 
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
                        <span class="align-middle">Cerrar session</span>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administrador/</span> Administradores</h4>

                <h5 class="">Informacion de los Administradores</h5>
                <h5>
                  <button class="btn btn-success" data-bs-toggle="modal"
                          data-bs-target="#basicModal">
                    Agregar nuevo Administrador
                  </button>
                </h5>
                
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
                  <?php 
                      foreach($resultado as $item):
                    ?>  
                    <tr>
                        <td><?php echo $item['nombres']; ?></td>
                        <td>
                        <?php echo $item['apellidos']; ?>
                        </td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $item['cedula']; ?></span></td>
                        <td>
                        <?php echo $item['correo']; ?>
                        </td>
                        <td>
                            <input type="hidden" name="idusarios" value="<?php echo $item['idusuarios']?>">
                            <button class="btn btn-secondary" data-bs-toggle="modal"
                          data-bs-target="#edit<?php echo $item['idusuarios']?>">
                    Editar
                  </button>
                        </td>
                      </tr>
                      <div class="modal fade" id="edit<?php echo $item['idusuarios']?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Editar informacion de administrador</h5>
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
                                    <form action="users/edit-info.php" method="post"">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" id="nameBasic" value= "<?php echo $item['nombres']?>" name="new_name" class="form-control" placeholder="Nombre del administrador" />
                                    <input type="hidden" name="iduser" value="<?php echo $item['idusuarios']?>">
                                  </div>
                                  <div class="col mb-0">
                                    <label for="nameBasic" class="form-label">Apellidos</label>
                                    <input type="text" id="nameBasic" value="<?php echo $item['apellidos']?>" name="new_apellidos" class="form-control" placeholder="Apellidos del administrador" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">correo</label>
                                    <input type="email" id="emailBasic" value="<?php echo $item['correo']?>" name="new_email" class="form-control" placeholder="Correo electronico" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Cedula</label>
                                    <input type="number" id="emailBasic" value="<?php echo $item['cedula']?>" name="new_cedula" class="form-control" placeholder="No. de documento" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" name="editar_info-admin" class="btn btn-primary">Editar</button>
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
<?php 
?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a href="Control_admins.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="Control_admins.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="Control_admins?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav>

<!-- modal agregar vendedor -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Agregar administrador</h5>
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
                                    <form action="users/ad_admin.php" method="post"">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" id="nameBasic" name="name" class="form-control" placeholder="Nombre del administrador" />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="nameBasic" class="form-label">Apellidos</label>
                                    <input type="text" id="nameBasic" name="apellidos" class="form-control" placeholder="Apellidos del administrador" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">correo</label>
                                    <input type="email" id="emailBasic" name="email" class="form-control" placeholder="Correo electronico" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Cedula</label>
                                    <input type="number" id="emailBasic" name="cedula" class="form-control" placeholder="No. de documento" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                     
<!-- MODAL PARA EDITAR INFO DE USUARIO -->
<?php 


?>

                    
<?php 
  include("footer.php"); 
?>