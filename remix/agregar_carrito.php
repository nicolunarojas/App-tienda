<?php

/**
 * Inicio de sesion
 *
 * Referencia: http://www.programacionweb.net/articulos/articulo/carro-de-compras-en-php/
 *
 */

session_start(); 

extract($_REQUEST); 

//conectar BD
include("includes/database.php"); 
conectarse(); 

if(!isset($cantidad)){$cantidad=1;} 

$qry=mysql_query("select * from productos where id='".$id."'"); 

$row=mysql_fetch_array($qry); 

if(isset($_SESSION['carro'])) 
$carro=$_SESSION['carro']; 

$carro[md5($id)]=array('identificador'=>md5($id), 
'cantidad'=>$cantidad,'articulo'=>$row['articulo'], 
'precios'=>$row['precios'], 'url'=>$row['url'],'id'=>$id);

$_SESSION['carro']=$carro; 

header("Location:index.php?".SID); 
?> 