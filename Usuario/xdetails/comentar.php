<?php 
include('navbar.php'); 
include('../../Administrador/config/conect.php'); 
if(isset($_GET['producto'])){
    $producto= $_GET['producto']; 
}
?>
<br>
<center>
    
<div class="alert alert-danger w-50">Añadir un comentario</div>
<form action="comentar2.php" method="post">
<input type="hidden" name="id" value="<?php echo $producto?>" >
<input type="text" class="w-50" name="comentario">
<button type="submit" class="btn btn-success w-50" name="comentar">Guardar comentario</button>

</form>
</center>


