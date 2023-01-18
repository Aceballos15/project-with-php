<?php 
include("nav.php"); 
$query= $conexion->prepare("SELECT * FROM clientes");  
$query->execute();
$count= $query->rowCount();
$paginas= ceil($count/15); 

if(isset($_GET['pag'])){
  $inicio= ($_GET['pag']-1)*15;  
}else{
  $inicio= (1-1)*15; 
}
  
$sql= $conexion->prepare("SELECT * FROM clientes LIMIT :inicio,15"); 
$sql->bindParam(':inicio', $inicio, PDO::PARAM_INT); 
$sql->execute(); 
$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);





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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administrador/</span> Informacion clientes</h4>

                <h5 class="card-header">Clientes registrados</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>telefono</th>
                        <th>Direccion</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($resultado as $result): ?>
                      <tr>
                        <td><?php echo $result['nombres']; ?></td>
                        <td>
                        <?php echo $result['apellidos']; ?>
                        </td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $result['cedula']; ?></span></td>
                        <td>
                        <?php echo $result['telefono']; ?>
                        </td>
                        <td>
                        <?php echo $result['direccion']; ?>
                        </td>
                      </tr>
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
      <a href="usuarios.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="usuarios.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="usuarios.php?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav>
                     


<?php 
include("footer.php"); 