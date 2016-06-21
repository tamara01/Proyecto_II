<?php 
session_start();
require_once("../clases/AccesoDatos.php");
require_once("../clases/usuario.php");

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$arr_usuario = usuario::VerificarUsuario($usuario, $clave);
//var_dump($arr_usuario);
$retorno;

if ($arr_usuario)
{			
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');		
	}

	$datos = Array();
	$datos[0]=$arr_usuario[0]->Id;
	$datos[1]=$arr_usuario[0]->Nombre;
	$datos[2]=$arr_usuario[0]->Clave;
	$datos[3]=$arr_usuario[0]->Email;
	$datos[4]=$arr_usuario[0]->Rol;

	$_SESSION["id"] = $datos[0];
	$_SESSION['usuario']=$datos[1];//seria el nombre
	$_SESSION['rol']=$datos[4];


	$retorno=$_SESSION['usuario'];
	
}else
{
	$retorno= "Sin usuario";
}

echo $retorno;
?>