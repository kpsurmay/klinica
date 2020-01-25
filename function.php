<?php
include("connect_db.php");//inicia la conexion
include("tools.php");
//funcion seleccionar
function select($sql)
	{
		$connect = new conexionDB();
        $conexion = $connect->conectarDB();
        $ejecutar = mysqli_query($conexion,$sql);
		$asociar=mysqli_fetch_assoc($ejecutar);
		$cantidad=mysqli_num_rows($ejecutar);
        $connect->desconectarDB($conexion);
		return array($cantidad, $asociar, $ejecutar);
	}
//funcion ejecutar
function ejecutar($sql)
{
	$connect = new conexionDB();
    $conexion = $connect->conectarDB();
    $ejecutar = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
	$connect->desconectarDB($conexion);
}
?>