<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
if (!empty($id) and !empty($cantidad))
{
$update_products=mysqli_query($con, "UPDATE producxts SET cantidad=cantidad-100 WHERE id_producto='".$id."'");

}

?>