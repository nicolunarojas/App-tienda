<?php

/**
 * Registro
 *
 * Referencia: http://gonzasilve.wordpress.com/2012/05/23/autenticacion-de-usuarios-en-php-y-mysql/
 *
 */

include_once("includes/database.php");

$link=Conectarse();
$username = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$query = sprintf("SELECT usuario FROM usuarios WHERE usuarios.usuario = '%s'", $username);

$result=mysql_query($query,$link);

if(mysql_num_rows($result)){
		//En caso de que ya exista un usuario registrado con el mismo nombre crea, un formulario para redireccionar al usuario a la pagina de registro mostrando el error
	?>
        <form name="formulario" method="post" action="registro.php">
            <input type="hidden" name="status_registro" value="1">
        </form>
	<?php
} else {

	mysql_free_result($result);

	if($pass1!=$pass2) {
		//En caso de que las contrasenas no coincidan, crea un formulario para redireccionar al usuario a la pagina de registro mostrando el error
	?>
        <form name="formulario" method="post" action="registro.php">
            <input type="hidden" name="status_registro" value="2">
        </form>
	<?php
	} else {

		$pass_encrypt = md5($pass1);
		$query = sprintf("INSERT INTO usuarios (usuario, correo, password)
		VALUES ('%s', '%s', '%s')", $username, $email, $pass_encrypt);

		$result=mysql_query($query,$link);

		if(mysql_affected_rows()){
			header("Location: index.php");
		} else {
			//En caso de que ocurra un error agregando los datos, crea un formulario para redireccionar al usuario a la pagina de registro mostrando el error
		?>
	        <form name="formulario" method="post" action="signup.php">
	            <input type="hidden" name="status_registro" value="3">
	        </form>
		<?php
		}
	}
}

?>

<script type="text/javascript"> 
	//Envia los datos de los mensajes de error a nuestra pagina de registro
    document.formulario.submit();
</script>