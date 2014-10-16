<?php

/* Funcion que redirige al usuario a la pagina de la tienda en caso de ya haber inicido sesion */

function redirect() {
    header('location:index.php');
}

?>

<?php
	/* Incia sesion o continua la ya iniciada */ 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="es" id="log-in">
	<head>
		<title>Iniciar sesión</title>

	 	<link rel="stylesheet" type="text/css" href="style.css"/>
	 	<script type="text/javascript"></script>
	 	<meta name="viewport" content="width=device-width, user-scalable=no">

	 	<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

	</head>
	
	<body id="login-signup">

		<?php
		/* Con esto validamos si existe una id en nuestros cookies para continuar con la sesion iniciada y ejecuta la funcion redirect */
		  if(isset($_SESSION['user_id'])){
		   redirect();
		  }
		?>

		<div class="container">
			<figure class="logo logo-login-signup">
				<img src="images/logo_white.png" alt="Remix" title="Remix">
			</figure>
			
			<section class="campos-login-signup">

			<form id="frmlogin" name="frmlogin" method="POST" action="validar_usuario.php">

				<h3 class="etiqueta-campos">Nombre de usuario</h3>			
				<input class="campos" type="text" name="usuario" id="usuario" maxlength="50">
				<h3 class="etiqueta-campos">Contraseña</h3>
				<input class="campos" type="password" name="password" id="password" maxlength="50">
				<input class="boton" id="boton-login-signup" type="submit" name="enviar" value="Iniciar sesión" >
				<br/>
				<p class="ask-login-signup">¿No tienes cuenta? <a class="call-to-action" href="signup.php">Registrate</a></p>

				<?php

    			//Mostrar errores de validacion de usuario en esta misma pantalla usando mensajes de Javascript
				if( isset( $_POST['msg_error'] ) )
				{
					switch( $_POST['msg_error'] )
					{
						case 1:
							?>
							<script type="text/javascript"> 
								alert("El usuario o password son incorrectos.");
							</script>
							<?php
						break;          
            		}//Fin switch
       			}
        		?>
			</form>
			</section>
		</div>
	</body>
</html>