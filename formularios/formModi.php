<?php 
//session_start();

	if(isset($user->Clave))
	{
		$clave = $user->Clave;
	}
	if(isset($user->Nombre))
	{
		$nombr = $user->Nombre;
	} 
	if(isset($user->Id))
	{
		$identi = $user->Id;
	}
?>
<form >
  <div class="form-group">
    <label for="nom">Nombre</label>
    <input type="text" class="form-control" id="nom" placeholder="Nombre" value="<?php echo $nombr;?>">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" placeholder="Password" value="<?php echo $clave;?>" >
  </div>
  <button type="submit" onClick="Modificar(<?php echo $identi; ?>)" class="btn btn-default">Modificar</button>
</form>