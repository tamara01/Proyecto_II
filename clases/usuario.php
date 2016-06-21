<?php
class usuario
{
	public $Id;
	public $Nombre;
	public $Clave;
	public $Email;
	public $Rol;

	public function __construct()
	{
	}

	public static function VerificarUsuario($mail, $clave) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select Email,Nombre,Clave,Rol from usuario where Email=? AND Clave=?");
		$consulta->execute(array($mail, $clave));
		$usuarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
		return $usuarioBuscado;				
	}

	public function BorrarUsuario()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from usuario	WHERE Id=:id");	
		$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();

	}
	public static function BorrarUsuarioPorNombre($nombre)
	{

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from usuario WHERE Nombre=:name");	
		$consulta->bindValue(':name',$nombre, PDO::PARAM_STR);		
		$consulta->execute();
		return $consulta->rowCount();

	}


	public function ModificarUsuarioParametros()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("update usuario set Nombre=:name,Clave=:pass WHERE Id=:id");
		$consulta->bindValue(':id',$this->Id, PDO::PARAM_INT);
		$consulta->bindValue(':name',$this->Nombre, PDO::PARAM_STR);
		$consulta->bindValue(':pass', $this->Clave, PDO::PARAM_STR);
		return $consulta->execute(); //
	}

	public function mostrarDatos()
	{
		return "Metodo mostar: (".$this->Nombre.") ; (".$this->Clave .")";
	}

	public function InsertarUsuarioParametros()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("insert into usuario (Nombre,Clave,Email,Rol) values(:name,:pass,:mail,:rol)");
		$consulta->bindValue(':name', $this->Nombre, PDO::PARAM_STR);
		$consulta->bindValue(':pass', $this->Clave, PDO::PARAM_STR);
		$consulta->bindValue(':mail', $this->Email, PDO::PARAM_STR);
		$consulta->bindValue(':rol', $this->Rol, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function TraerUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select Id, Nombre, Clave, Email, Rol from usuario");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUsuario($id) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select Id, Nombre, Clave, Email, Rol from usuario where Id = $id");
		$consulta->execute();
		$cdBuscado= $consulta->fetchObject('usuario');
		return $cdBuscado;			
	}

	public static function TraerUsuarioIdNombreParam($id,$nombre) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select Id, Nombre, Clave, Email,Rol from usuario where Id=:id AND Nombre=:name");
		$consulta->bindValue(':id', $id, PDO::PARAM_INT);
		$consulta->bindValue(':name', $nombre, PDO::PARAM_STR);
		$consulta->execute();
		$cdBuscado= $consulta->fetchObject('usuario');
		return $cdBuscado;		
	}
	
	// public static function ArmarTabla(){
	// 	$arraysUsser =usuario::TraerUsuarios();
	// 	echo" <table class='table'>
	// 	<thead>
	// 		<tr>
	// 			<th>Modificar</th>
	// 			<th>Borrar</th>
	// 			<th>Nombre</th>
	// 			<th>Clave</th>
	// 			<th>Email</th>
	// 			<th>Rol</th>
	// 		</tr>
	// 	</thead>";
	// 	foreach ($arraysUsser as $user) {
	// echo "<tr>
	// 		<td><a class='btn btn-warning' onClick=ModiForm($user->Id)>Modificar</a></td>
	// 		<td><a class='btn btn-danger' onClick=Borrar($user->Id)>Borrar</a></td>
	// 		<td>$user->Nombre</td>
	// 		<td>$user->Clave</td>
	// 		<td>$user->Email</td>
	// 		<td>$user->Rol</td>
	// 	 </tr>";
	// }
	// echo"</table> "; 
	// }


}
?>