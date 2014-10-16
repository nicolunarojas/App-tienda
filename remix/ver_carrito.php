<?php

//Inicializar una sesion de PHP
session_start();

	//Validar que el usuario este logueado y exista un UID
	if ( ! (isset($_SESSION['user_id'])) )
	{
	    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
	    //pantalla de login, enviando un codigo de error
	?>
	        <form name="formulario" method="post" action="index.php">
	            <input type="hidden" name="msg_error" value="1">
	        </form>
	        <script type="text/javascript"> 
	            document.formulario.submit();
	        </script>
	<?php
	}
 
    //Conectar BD
    include("includes/database.php");  
    conectarse();

    if ((isset($_SESSION['user_id']))) {
 
    //Sacar datos del usuario que ha iniciado sesion
    $query = "	SELECT  id,usuario
            	FROM usuarios
            	WHERE id = '".$_SESSION['user_id']."'";         
    $result = mysql_query($query); 
 
    $username = "";
 
    //Formar el nombre completo del usuario
    if($fila = mysql_fetch_array($result))
    	$username = $fila['usuario'];
	}

	if(isset($_SESSION['carro'])) 
	$carro=$_SESSION['carro'];else $carro=false;
 
//Cerrrar conexion a la BD
mysql_close($link);

?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Remix</title>
	 	
	 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	 	<link rel="stylesheet" type="text/css" href="style.css"/>
	 	<script type="text/javascript"></script>
	 	<meta name="viewport" content="width=device-width, user-scalable=no">

	 	<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

	</head>
	
	<body>

		<?php 
		if (! (isset($_SESSION['user_id']))) {
		?>

		<header class="header-superior">
	      <div class="container">
	        <nav class="user-nav">
	          <a class="user-nav-item" href="login.php">Iniciar sesión</a>
	          <a class="user-nav-item" href="signup.php">Registrarse</a>
	        </nav>
	      </div>
	    </header>
		
		<?php 
		}
		else {
		?>

		<header class="header-superior">
	      <div class="container">
	        <nav class="user-nav">
	          <a class="user-nav-item">Bienvenido <?php echo $username ?></a>
	          <a class="user-nav-item" href="logout.php">Cerrar sesión</a>
	        </nav>
	      </div>
	    </header>

		<?php 
		}
		?>		 

		<header class="header-logo-carro">
	    	<div class="container">
	    		<div class="row">
				<div class="col-md-2">
					<a href="index.php">
						<figure class="logo">
		          			<img src="images/logo.png" alt="Remix - Shop">
		          		</figure>
	          		</a>
				</div>
				<div class="col-md-2 col-md-offset-8">
					<a href="#">
		          	<figure class="cart">
		          		<img src="images/cart.png" alt="Carrito de compras">
		          	</figure>
		          	</a>
		          	<a class="texto-cart" href="ver_carrito.php">Carro de<br />compras</a>
				</div>
			</div>

	      </div>
	    </header>


		<section>
    		<div class="container">
    		<div id="row">
				<div class="col-md-3">
    				<h4 class="titulo-seccion">PRODUCTOS AGREGADOS AL CARRITO</h4>
    			</div>
				<div class="col-md-9">
    			<hr class="separadores-seccion">
    			</div>
    		</div>

		    <?php
			if($carro){ 
 
			$contador=0;

			$suma=0;

			$c = 0;
	        foreach( $carro as $k => $v ):

         	$subto=$v['cantidad']*$v['precios']; 
			$suma=$suma+$subto; 
			$contador++; 

	            //Needs Break Boolean, true if counter at second column
	            $b = (( ++$c % 6 == 0 ) ? true : false );

	            if ( $b ) 
	                echo '<div class="row">';
                
	                ?>

	               <div class="col-md-2">
	               	<form name="a<?php echo $v['identificador'] ?>" method="post" action="agregar_carrito.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>"> 
						<figure>
	    					<img class='imagen-articulo' src="<?php echo $v['url'] ?>" alt="Productos">
	    				</figure>
	    				<br />
	   
	   					<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td> 
						<a href="borrar_carrito.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>">
							<img class="agregar-carro" src="images/productoborrar.png" border="0">
						</a> 
						
						<br />
	    				<h5 class="precio">$<?php echo $v['precios'] ?></h5>
	    				<br />
	    				<a href="#"><?php echo $v['articulo'] ?></a>
	    				<br />

	    				</form> 
	               </div>

	           <?php

	            if ( $b ) 
	                echo '</div>';
	       		endforeach;

	        ?>

	        <div id="row">
				<div class="col-md-12">
				<br />
				<br />
    			<h5 class="prod">Total: $<?php echo number_format($suma,2); 
				?></h5>
				<br />
				<br />
    			</div>
    		</div>

			<?php }
			else{ 
			?> 
				<p align="center"> <span class="prod">No hay productos seleccionados</span> 
				<a href="index.php?<?php echo SID;?>"> 
				<img src="images/continuar.png"></a>  
				<?php 
			}
			?> 
			</p> 

        	</div>
	    </section>


	    <footer>
		    <div class="footer">
	      		<div class="container">
	        		<figure class="logo logo-footer">
	    				<img src="images/logo_white.png" alt="Remix - Shop">
	    			</figure>
	      		</div>
	    	</div>
	    </footer>


	</body>
</html>