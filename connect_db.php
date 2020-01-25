<?php
//require('../../electiva/inc/config.php');
class conexionDB{
function conectarDB(){
		$conexion= mysqli_connect("localhost","root", "", "clinica");
		if(!$conexion)
			echo "ERROR, Verifique los datos de conexion";
		mysqli_query ($conexion, "SET NAMES 'utf8'");
		mysqli_set_charset ($conexion,"utf8");
		return $conexion;		
}
function desconectarDB ($conexion)
{
	$cerrar=mysqli_close($conexion);
	if(!$cerrar)
		echo "ERROR, no se pudo cerrar la conexion";
	return $cerrar;
}

function getArraySQL($sql){
        $conexion = $this->conectarDB();
        if(!$result = mysqli_query($conexion, $sql)) die(mysqli_error($conexion));
        $rawdata = array();
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            $rawdata[$i] = $row;
            $i++;
        }
        $this->desconectarDB($conexion);
        return $rawdata;
    }


}
?>