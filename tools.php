<?php
class Tools{
	//funcion conectar con la base de datos
    function conectarDB()
	{
        $conexion = mysqli_connect("127.0.0.1", "root", "","clinica");//conexion con la base de datos p3_ulamovil
        if($conexion){//condicion para la conexion
        }else{
               echo '<br>ERROR EN LA CONEXION<br>';//si no coinciden muestra este mensaje
        }
        mysqli_query ($conexion,"SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");
        return $conexion;
    }
	//funcion desconectar con la base de datos
	function desconectarDB($conexion)
	{
       $close = mysqli_close($conexion);
       if($close){
       }else{
          echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';//mensaje de aviso a la desconexion de la base de datos
	   }
        return $close;//retorna a la desconexion
    }
	//funcion para conectarse y desconectarse de la base de datos al terminar de utilizarla
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
