<?php
    include('nav.php'); 
    $empresas= $conexion->prepare("SELECT * FROM empresas");
    $empresas->execute();
   
    $count= $empresas->rowCount();
    $paginas= ceil($count/12); 
    
    if(isset($_GET['pag'])){
      $inicio= ($_GET['pag']-1)*12;  
    }else{
      $inicio= (1-1)*12; 
    } 
    $empresas= $conexion->prepare("SELECT * FROM empresas LIMIT :inicio, 12");
    $empresas->bindParam(':inicio', $inicio, PDO::PARAM_INT);  
    $empresas->execute();
    $resultado= $empresas->fetchAll(PDO::FETCH_ASSOC); 


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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administrador/</span> empresas</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Informacion</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Empresa</th>
                        <th>Nit</th>
                        <th>Estado</th>
                        <th>Vendedores</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($resultado as $result): ?>
                      <tr>
                        <td><?php echo $result['nombre_empresa']; ?></td>
                        <td>
                        <?php echo $result['nit']; ?>
                        </td>
                        <?php
                        if ($result['estado']==1) { ?>
                           <td><span class="badge bg-label-primary me-1">Activo</span></td>
                         <?php 
                        }else{ ?>
                            <td><span class="badge bg-label-primary me-1">Inactivo</span></td>
                          <?php
                        }
                        ?>
                        <td>
                        <?php 
                        $id= $result['idempresas']; 
                        $vendedores= $conexion->prepare("SELECT * FROM vendedores WHERE empresas_idempresas=?"); 
                        $vendedores->execute(array($id));
                        $total= $vendedores->rowCount();
                        echo $total; 
                         ?>
                        </td>
                        <td>
                        <?php
                        if ($result['estado']==1) { ?>
                          <h5><a class="btn btn-danger" href="users/cambiar_estado.php?et=<?php echo $result['estado'];?>&id=<?php echo $result['idempresas'];?>">Bloquear</a></h5>
                         <?php 
                        }else{ ?>
                             <h5><a class="btn btn-success" href="users/cambiar_estado.php?et=<?php echo $result['estado'];?>&id=<?php echo $result['idempresas'];?>">Desbloquear</a></h5>
                          <?php
                        }
                        ?> 
                        </td>
                        <?php endforeach ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a href="empresas.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="empresas.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="empresas.php?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav>

<?php 
include('footer.php'); 
?>