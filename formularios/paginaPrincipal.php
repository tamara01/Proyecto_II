<?php
session_start();
 if(isset($_SESSION['usuario']))
    {
?>

	
			<h2>Acciones</h2>
			<button class="btn btn-block btn-lg btn-info" >
	            <a onClick="Mostrar('AltaForm')" class="list-group-item  list-group-item list-group-item-info">
	              <h4 class="list-group-item-heading">Alta de usuarios</h4>
	            </a>
            </button> 
			<button class="btn btn-block btn-lg btn-info" >
	            <a onClick="Mostrar('MostrarGrilla')" class="list-group-item  list-group-item list-group-item-info">
	              <h4 class="list-group-item-heading">Listado de usuarios</h4>
	            </a>
            </button> 
	

	

<?php 
}
else


{    echo"<h3>usted no esta logeado. </h3>"; }?>


