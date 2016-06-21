function validarLogin()
{
	
	var parametroMail;
	var parametroClave;
	var parametroRecordarme = $("#recordarme").is(':checked');
	parametroMail =$("#correo").val();
	parametroClave =$("#clave").val();
	
	var functionAjax=$.ajax({ 
		type:"post",
		url:"php/validarUsuario.php",
		data:{usuario:parametroMail, clave:parametroClave, recordarme:parametroRecordarme}
	});	
	functionAjax.done(function(respuesta){// retorna el nombre 

		if(respuesta != "Sin usuario"){
			//alert("estoy adentro de funcionesLogin: validarLogin");
			Mostrar("paginaPrincipal");
			$(".MiBotonUTNMenu").attr("id", "LogOut"); //cambio el atributo a LogOut
			$("#LogOut").html("Logout");		// lo cambio visualmente
			$("#usuario").val(respuesta);		//pongo el nombre del usuario. Prueba .val(respuesta+"yo");
		}
		else{
			alert("Usuario o password es incorrecto!");
			//alert(respuesta);//usuario incorrecto
		}
		//alert(respuesta); //muestra el nombre del usuario logueado
		$("#usuario").val(respuesta);
		
	});
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarLogin();
			$("#usuario").val("Sin usuario");
			$(".MiBotonUTNMenu").attr("id", "LogIn"); //le pongo el atributo LogIn al id
			$("#LogIn").html("Login");				  //lo cambio visualmente

			Mostrar("LoginForm");
			// $("#LogIn").removeClass("btn-danger");
			// $("#LogIn").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#logIn").html("validarLogin")
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
