<!DOCTYPE html>
<html lang="es" id="signup">
	<head>
		<title>Registrarse</title>
	 	
	 	<link rel="stylesheet" type="text/css" href="style.css"/>
	 	<script type="text/javascript"></script>
	 	<meta name="viewport" content="width=device-width, user-scalable=no">

	 	<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

	</head>

	<body id="login-signup">

		<div class="container">
			<figure class="logo logo-login-signup">
				<img src="images/logo_white.png" alt="Remix" title="Remix">
			</figure>
			
			<section class="campos-login-signup">

			<form name="user_form" action="guardar_registro.php" method="POST">
				<h3 class="etiqueta-campos">Nombre de Usuario:</h3>
				<input type="text" class="campos" name="username" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Correo electrónico:</h3>
				<input type="text" class="campos" name="email" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Contraseña:</h3>
				<input type="password" class="campos" name="pass1" />
				<h3 class="etiqueta-campos">Repite la contraseña:</h3>
				<input type="password" class="campos" name="pass2" />
				<br />
				<input class="boton" id="boton-login-signup" type="submit" name="crear" value="Regístrate" />

				<?php

				//Mostrar errores de validacion de usuario, en caso de que lleguen


				if( isset( $_POST['status_registro'] ) )
				{
					switch( $_POST['status_registro'] )
					{
						case 1:
							?>
							<script type="text/javascript"> 
								alert("El usuario ya existe en la Base de Datos");
							</script>
							<?php
						break;          
						case 2:
							?>
							<script type="text/javascript"> 
								alert("Los passwords deben coincidir");
							</script>
							<?php       
						break;
						case 3:
							?>
							<script type="text/javascript"> 
								alert("Ocurrio un Error al Introducir los Datos");
							</script>
							<?php       
						break;
	        		}//Fin switch
	   			}
	    		?>


			</form>

			<br />

			<p class="ask-login-signup">¿Ya tienenes una cuenta? <a class="call-to-action" href="login.php">Inicia Sesión</a></p>

		</section>
	</body>
</html>