<?php 
session_start();
  if(isset($_SESSION['usuario'])){  
    require_once("clases/AccesoDatos.php"); 
    require_once("clases/usuario.php");
    $arraysUsser =usuario::TraerUsuarios();

?>
  <form >
    <div class="form-group">
      <label for="nom">Nombre</label>
      <input type="text" class="form-control" id="nom" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input type="password" class="form-control" id="pass" placeholder="Password">
    </div>
     <div class="form-group">
      <label for="mail">Email</label>
      <input type="email" class="form-control" id="mail" placeholder="Correo">
    </div>
    <div class="form-group">
      <label for="rols">Rol</label>
      <input type="text" class="form-control" id="rols" value="usuario" disabled="disabled">
    </div>
    <button type="submit" onClick="Alta()" class="btn btn-primary">Agregar</button>
  </form>
  <label>
    <br><a class="btn btn-danger" onclick="Mostrar('paginaPrincipal')">Cancelar</a>
  </label>

<?php 
}else
{    
  echo"<h3>usted no esta logeado. </h3>"; 
}
?>