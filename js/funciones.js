function LoginForm(){
	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		data:{
			queHacer:"LoginForm",
		}
	});
	funcionAjax.done(function(retorno){
		//Mostrar("paginaPrincipal");
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		alert('Error Login ');
	});
}

function Login(){
	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		data:{
			queHacer:"Alta",
			mail: $("#correo").val(),
			password: $("#clave").val()
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
	});
	funcionAjax.fail(function(retorno){
		alert('Error Login');
	});		
}
function AltaForm(){
	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		data:{
			queHacer:"AltaForm"
		}
	});
	funcionAjax.done(function(retorno){
		//$("#principal").html(retorno);
		Mostrar("MostrarGrilla");
	});
	funcionAjax.fail(function(retorno){
		alert('Error en AltaForm');
	});
}

function Alta(){
	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		data:{
			queHacer:"Alta",
			nombre: $("#nom").val(),
			password: $("#pass").val(),
			correo: $("#mail").val(),
			tipoRol: $("#rols").val()
		}
	});
	funcionAjax.done(function(retorno){
		//////alert(retorno);
		AltaForm();
		//Mostrar('paginaPrincipal');//1
	});
	funcionAjax.fail(function(XMLHttpRequest, textStatus, errorThrown){
	});		
}

function ModiForm(id){				//1111
	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		data:{
			queHacer:"ModiForm",
			id:id
		}
	});
	funcionAjax.done(function(retorno){//si todo sale bien me devuelve todo el formModi.html
		//alert(retorno+"yoooo");	
		//Mostrar('paginaPrincipal');						//2
		$("#principal").html(retorno); //el retorno en html se lo asigno a id="principal" para poder verlo y modificarlo
										//con ese html vuelvo a presionar un boton
	});
	funcionAjax.fail(function(retorno){
		alert('Error en AltaForm');
	});
}



function Modificar(id){		///2222222 modifica con los datos que recibe de fromModi
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Modificar",
			id:id,
			nombre:$("#nom").val(),
			password:$("#pass").val()
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);						//1
		Mostrar("MostrarGrilla");
		//Mostrar('paginaPrincipal');
	});
	funcionAjax.fail(function(XMLHttpRequest, textStatus, errorThrown){
	});
}

function Borrar(id){
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borrar",
			id:id	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
	});
	funcionAjax.fail(function(retorno){	
		alert('b');
	});	
}

function Mostrar(queMostrar){
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:queMostrar
		}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		console.log(retorno);
		//$("#informe").html(retorno.responseText);	
	});
}

function MostrarInicio(queMostrar){
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:queMostrar
		}
	});
	funcionAjax.done(function(retorno){ //ver como hacerlo
		$("#principal").html(retorno); /*mostrar<label>
													  <br><a class="btn btn-primary" onclick="Mostrar('paginaPrincipal')">Volver atrás</a>
												</label>*/
	});
	funcionAjax.fail(function(retorno){
		alert('error'+retorno);
		console.log(retorno);
		//$("#informe").html(retorno.responseText);	
	});
}