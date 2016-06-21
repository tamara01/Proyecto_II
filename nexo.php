<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$queHago=$_POST['queHacer'];

	switch ($queHago) {
		case "LoginForm":
			require_once("formularios/formLogin.php");
		break;
		case "Login":
		    require_once("php/validarUsuario.php");
		break;
		case "AltaForm":
			require_once("formularios/formAlta.php");
		break;
		case 'Alta':
			$user = new usuario();
			$user->Nombre = $_POST['nombre'];
			$user->Clave = $_POST['password'];
			$user->Email = $_POST['correo'];
			$user->Rol = $_POST['tipoRol'];
			$cantidad=$user->InsertarUsuarioParametros();
			echo $cantidad;

			$user = usuario::TraerTodoLosUsuarios(); //me traigo todos los usuarios para poder mostrarlos
			echo json_encode($user) ;
		break;

		case "ModiForm":
			$user = new usuario();
			$user = usuario::TraerUsuario($_POST['id']);
			require_once("formularios/formModi.php");
		break;

		case 'Modificar':
			$user = new usuario();
			$user->Nombre = $_POST['nombre'];
			$user->Clave = $_POST['password'];
			$user->Id = $_POST['id'];
			$user->ModificarUsuarioParametros();//necesito que me retorne algo sino no puedo mostrar
			
			$user = usuario::TraerTodoLosUsuarios(); //me traigo todos los usuarios para poder mostrarlos
			echo json_encode($user) ;

		break;

		case 'Borrar':
			$user = new usuario();
			$user->id = $_POST['id'];
			$cantidad=$user->BorrarUsuario();
		break;

		case 'MostrarGrilla':
           require_once("formularios/formGrilla.php");
           //usuario::ArmarTabla();
		break;
		case "paginaPrincipal":
		    require_once("formularios/paginaPrincipal.php");
		    break;
		
	}
?>