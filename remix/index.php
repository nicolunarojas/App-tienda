<?php

ob_start("ob_gzhandler"); 
 
//Inicializar una sesion de PHP
session_start();
 
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
	
	//Sacar datos de la tabla de los productos
	$query_productos = "SELECT *
            			FROM productos
            			order by articulo asc";
	$qry=mysql_query($query_productos);
 
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
					<a href="ver_carrito.php">
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
	    	<div class="banner">
	    		<div class="container">
	    			<div id="row"></div>
	    		</div>
	    	</div>
	    </section>

		<section>
    		<div class="container">
    			<div id="row">
    				<div class="col-md-3">
	    				<h4 class="titulo-seccion">EXPLORAR CATEGORÍAS</h4>
	    			</div>
					<div class="col-md-9">
	    			<hr class="separadores-seccion">
	    			</div>
    			</div>
    			<div class="row">
	    			<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-01.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-02.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-03.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>    				
    			</div>
    			<div class="row">
	    			<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-04.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-05.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-4">
	    				<a href="#">
	    				<figure class="categorias">
	    					<img src="images/categorias-06.png" alt="Categorías">
	    				</figure>
	    				</a>
					</div>    				
    			</div>
    		</div>
	    </section>

	    <section>
	        		<div class="container">
	        			<div id="row">
	        				<div class="col-md-3">
	    				<h4 class="titulo-seccion">ARTÍCULOS DESTACADOS</h4>
	    			</div>
	    					<div class="col-md-9">
	    			<hr class="separadores-seccion">
	    			</div>
	        			</div>
	        			<div class="row">
	    			<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-01.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Sony MDRZX100 ZX Series Stereo</a>
	    				<br />
	    				<h5 class="precio">$17.01</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div>
	    					<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-02.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Panasonic RPHJE120K In-Ear Headphones</a>
	    				<br />
	    				<h5 class="precio">$8.00</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div>
	    					<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-03.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Panasonic OPHJ3 Over-Ear Headphones</a>
	    				<br />
	    				<h5 class="precio">$9.49</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div> 
	    					<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-04.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Beats Studio Over-Ear Headphones (Blue) </a>
	    				<br />
	    				<h5 class="precio">$299.95</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div> 
	    					<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-05.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Skullcandy S2IKDY-003 Ink'd 2.0</a>
	    				<br />
	    				<h5 class="precio">$12.99</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div> 
	    					<div class="col-md-2">
	    				<figure>
	    					<img src="images/articulos/headphones-06.png" alt="Productos">
	    				</figure>
	    				<br />
	    				<a href="#">Skullcandy S6HSDZ-161 Hesh 2.0</a>
	    				<br />
	    				<h5 class="precio">$39.99</h6>
	    				<br />
	    				<a href="#" class="boton agregar-carro"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	    					</div>   				
	        			</div>
	        		</div>
	    </section>

		<section>
    		<div class="container">
    		<div id="row">
				<div class="col-md-3">
    				<h4 class="titulo-seccion">TODOS LOS ARTÍCULOS</h4>
    			</div>
				<div class="col-md-9">
    			<hr class="separadores-seccion">
    			</div>
    		</div>

		    <?php   
		    while($row=mysql_fetch_assoc($qry))
    		$rows[] = $row;

	         $c = 0;
	         foreach( $rows as $row ):

	         	$article = stripslashes($row['articulo']);
			    $price = stripcslashes($row['precios']);
			    $url = stripslashes($row['url']);
    			$eid = $row['id'];

	            //Needs Break Boolean, true if counter at second column
	            $b = (( ++$c % 6 == 0 ) ? true : false );

	            if ( $b ) 
	                echo '<div class="row">';
                
	                ?>

	               <div class="col-md-2">
						<figure>
	    					<img class='imagen-articulo' src="<?php echo $url ?>" alt="Productos">
	    				</figure>
	    				<br />
	    				<?php 

						if(!$carro || !isset($carro[md5($row['id'])]['identificador']) || $carro[md5($row['id'])]['identificador']!=md5($row['id'])){ 

						?> 
						<a href="agregar_carrito.php?<?php echo SID ?>&id=<?php echo $row['id']; ?>"> 
						<img class="agregar-carro" src="images/productonoagregado.png" border="0" title="Agregar al Carrito"></a><?php 
						} 
						else {
							?>

						<a href="borrar_carrito.php?<?php echo SID ?>&id=<?php echo $row['id']; ?>"> 
						<img class="agregar-carro" src="images/productoagregado.png" border="0" title="Quitar del Carrito"></a><?php } 

						?>
						<br />
	    				<h5 class="precio">$<?php echo $price ?></h5>
	    				<br />
	    				<a href="#"><?php echo $article ?></a>
	    				<br />
	               </div>

	           <?php

	            if ( $b ) 
	                echo '</div>';
	       		endforeach;

	        ?>
        	</div>
	    </section>


	    <section>
    		<div class="container">
    			<div id="row">
    				<div class="col-md-3">
	    				<h4 class="titulo-seccion">EXPLORAR MARCAS</h4>
	    			</div>
					<div class="col-md-9">
	    			<hr class="separadores-seccion">
	    			</div>
    			</div>
    			<div class="row">
	    			<div class="col-md-2">
	    				<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-01.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-02.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-03.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-04.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div> 
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-05.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-06.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>  			
    			</div>
				<div class="row">
	    			<div class="col-md-2">
	    				<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-07.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-08.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-09.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-10.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div> 
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-11.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>
					<div class="col-md-2">
						<a href="#">
	    				<figure class="marcas">
	    					<img src="images/marcas/marca-12.png" alt="Marcas">
	    				</figure>
	    				</a>
					</div>  			
    			</div>    			
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

	    <form id="errorCarro" name="errorCarro"  method="POST" action="login.php">

				<?php

    			//Mostrar error cuando el usuario intente comprar sin estar registrado
				if( isset( $_POST['msg_error'] ) )
				{
					switch( $_POST['msg_error'] )
					{        
						case 1:
							?>
							<script type="text/javascript"> 
								alert("Debes iniciar sesión para poder comprar.");
							</script>
							<?php       
						break;
            		}//Fin switch
       			}
        		?>
			</form>


	</body>
</html>