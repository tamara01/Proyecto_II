<?php
session_start();
 if(!isset($_SESSION['usuario']))
    {
?>

	<form class="form-ingreso" onsubmit="validarLogin();return false;">	
		<div class="form-group">
			<div class="input-group">
				<label class="sr-only" for="correo">Correo:</label>
				<div class="input-group-addon">@</div>
					<input class="form-control" name="correo" id="correo" type="email" placeholder="Correo" autofocus=""
					 value="<?php if(isset($_COOKIE['registro'])) echo $_COOKIE['registro']; ?>">
				</div>
		    </div>
		</div>

		<div class="form-group">
		    <div class="input-group">
				<label class="sr-only" for="clave">Clave:</label>
				<div class="input-group-addon"> *** </div>
					<input class="form-control" name="clave" id="clave" type="password" placeholder="Clave ">
				</div>	
			</div>
		</div>
		<div class="checkbox">
	              <label>
	                <input type="checkbox" id="recordarme" checked>Recordame
	              </label>
	              
	    </div>		
		<button id="logIn" type="submit" class="btn btn-primary">Ingresar</button>
</form>

<?php

}
else
{
  
  
 echo  "<button id='logout' class='btn btn-lg btn-danger btn-block' onclick='deslogear()'>Salir</button>";

 
}
 ?>