<?php 
session_start();
	if(isset($_SESSION['usuario'])){  
		require_once("clases/AccesoDatos.php"); 
		require_once("clases/usuario.php");
		$arraysUsser =usuario::TraerUsuarios();

?>
	<label>
  		<br><a class="btn btn-primary" onclick="Mostrar('paginaPrincipal')">Volver al menú</a>
	</label>

		<table class='table'>
		<thead>
			<tr>
				<th>Modificar</th>
				<th>Borrar</th>
				<th>Nombre</th>
				<th>Clave</th>
				<th>Email</th>
				<th>Rol</th>
			</tr>
		</thead>
	<?php
	//echo $_SESSION['rol']."-". $_SESSION['usuario'];
	foreach ($arraysUsser as $user) {
		if ($_SESSION['rol']=='admin') {
			echo "<tr>
			<td><a class='btn btn-warning' onClick=ModiForm($user->Id)>Modificar</a></td>
			<td><a class='btn btn-danger' onClick=Borrar($user->Id)>Borrar</a></td>
			<td>$user->Nombre</td>
			<td>$user->Clave</td>
			<td>$user->Email</td>
			<td>$user->Rol</td>
		 	</tr>";
		}
		else{
			echo "<tr>";
			if ($_SESSION['usuario']==$user->Nombre) { //para que modifique su perfil
				echo"
				<td disabled><a class='btn btn-warning' onClick=ModiForm($user->Id)>Modificar</a></td>";
			}
			else{
				echo"
				<td disabled><a class='btn btn-warning' > No habilitado</a></td>
			";}
			echo "
			<td disabled><a class='btn btn-danger' > No habilitado</a></td>
			<td>$user->Nombre</td>
			<td>$user->Clave</td>
			<td>$user->Email</td>
			<td>$user->Rol</td>
		    </tr>";	
		}

	}?>

	</table>


<?php

    } 
    else{
    	echo "No estás registrado!!! ";    	
    }
?>