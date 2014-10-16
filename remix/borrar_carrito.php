<?php

/**
 * Inicio de sesion
 *
 * Referencia: http://www.programacionweb.net/articulos/articulo/carro-de-compras-en-php/
 *
 */

session_start(); 

extract($_GET);

$carro=$_SESSION['carro'];

unset($carro[md5($id)]); 

$_SESSION['carro']=$carro; 

header("Location:ver_carrito.php?".SID); 
?> 