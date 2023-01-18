<?php 
 
include("nav.php"); 
if($_SESSION['rol']==2){
  $id= $_SESSION['idt'];
  $query= $conexion->prepare("SELECT empresas_idempresas FROM vendedores WHERE idvendedores=?");
  $query->execute(array($id)); 
  $result= $query->fetchAll(PDO::FETCH_ASSOC );
  foreach($result as $r){
      $idemp= $r['empresas_idempresas']; 
  } 
}else{
  $idemp= $_SESSION['idt']; 
}
if($role!=4){
  $envios= $conexion->prepare("SELECT * FROM envios WHERE empresas_idempresas=? and estado=?"); 
  $envios->execute(array($idemp, 2));  
  $resultado= $envios->fetchAll(PDO::FETCH_ASSOC); 
}else{
  $envios= $conexion->prepare("SELECT * FROM envios WHERE estado=?"); 
  $envios->execute([3]); 
  $resultado= $envios->fetchAll(PDO::FETCH_ASSOC); 
}

$count= $envios->rowCount();
$paginas= ceil($count/15); 

if(isset($_GET['pag'])){
  $inicio= ($_GET['pag']-1)*15;  
}else{
  $inicio= (1-1)*15; 
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administrador/</span> Envios</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Envios realizados</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Cliente</th>
                        <th>Cedula</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      foreach($resultado as $result){
                          $carrito= $conexion->prepare("SELECT clientes_idClientes FROM carritos WHERE idcarritos=?"); 
                          $carrito->execute([$result['carritos_idcarritos']]); 
                          $rest= $carrito->fetchAll(PDO::FETCH_ASSOC);
                          foreach($rest as $res){
                            $cliente= $conexion->prepare("SELECT * FROM clientes WHERE idClientes=?"); 
                            $cliente->execute([$res['clientes_idClientes']]); 
                            $clientee= $cliente->fetchAll(PDO::FETCH_ASSOC);
                            foreach($clientee as $cli){
                              $cedula= $cli['cedula']; 
                              $nombre= $cli['nombres']; 
                              $telefono= $cli['telefono'];
                              $id= $cli['idClientes'];
                            }
                          } 
                        ?>
                      <tr>
                        <td> 
                        <?php echo $nombre; ?>
                        </td>
                      <td>
                      <?php echo $cedula; ?>
                      </td>
                      
                        <td>
                        <?php if($result['estado']==2){?>
                          <span class="badge bg-label-primary me-1">Enviado a Atinea</span>
                        <?php }else{?>
                          <span class="badge bg-label-primary me-1">Enviado a su destino</span>
                          <?php }?>
                        </td>   

                        <td>
                        $8000
                        </td>
                        <td>
                        <?php echo $result['fecha']; ?>
                        </td> 
                        <td>
                        <?php echo $result['direccion'];  ?>
                        </td> 
                        <td>
                        <?php echo $telefono; ?>
                        </td>
                      </tr>
                    <?php  } ?>
                    </tbody>
                  </table>
                </div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a href="env_list.php?pag=<?php echo $_GET['pag']-1; ?>"class="page-link">Anterior</a>
    </li>
    <?php for($i=1; $i <= $paginas ; $i++): ?>
    <li class="page-item"><a class="page-link" href="env_list.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="env_list.php?pag=<?php echo $_GET['pag']+1;  ?>">Siguiente</a>
    </li>
  </ul>
</nav> 


<?php 
include("footer.php"); 
?>