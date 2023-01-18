<?php 
include('nav.php'); 

if(isset($_GET['carrito'])){
  $id_env= $_GET['env']; 
  $estado= $_GET['est']; 
  $query= $conexion->prepare("SELECT * FROM carritos WHERE idcarritos=?"); 
  $query->execute([$_GET['carrito']]); 
  $resultado_carr=$query->fetchAll(PDO::FETCH_ASSOC); 
  foreach($resultado_carr as $prod){
    $sql= $conexion->prepare("SELECT * FROM productos WHERE idProductos=?"); 
    $sql->execute([$prod['Productos_idProductos']]); 
    $resultado_prod=$sql->fetchAll(PDO::FETCH_ASSOC);
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
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ver/</span> Detalle de envios</h4>
<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Opcion 1</th>
                        <th>Opcion 2</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($resultado_prod as $producto): ?>
                      <tr>
                        <td>
                          <img src="../img/productos/<?php echo $producto['imagen']; ?>" width="100px" height="100px">
                        </td>
                        <td>
                        <h4 ><?php echo $producto['nombres']; ?></h4>
                        </td>
                        <td></td>
                        <td><h3 ><?php echo $prod['cantidad']; ?></h3></td>
                        <td>
                        <h4><?php echo $prod['ptotal']; ?></h4>
                        </td>
                        <td>
                        <a href='envios.php' class="btn btn-primary"> Regresar</a >
                        </td>
                        <td>
                          
                        <a  href='App/confirm_env.php?env=<?php echo $id_env; ?>&est=<?php echo $estado; ?>' class="btn btn-success"> 
                        <?php if($_SESSION['rol']!=4){?>
                            Enviar a Atinea 
                          <?php }else{?>
                            Enviar al destino 
                          <?php }?>
                      </a >
                        <?php ?>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
            </div>
    </div>
</div>


<?php 
include('footer.php'); 

?>