<?php

function busquedaEscrita($descripcion,$nomform){
    $resultado = '<div class="input-field"><input placeholder="Escribir '.$descripcion.'" type="text" class="validate" name="'.$nomform.'"><label for="">'.$descripcion.'</label></div>';
    return $resultado;
  }
//función para conectarnos a la BD
  function conectar_bd() {
      $conexion_bd = mysqli_connect("localhost","root","","rehabilitacion");
      if ($conexion_bd == NULL) {
          die("No se pudo conectar con la base de datos");
      }
      return $conexion_bd;
  }

  //función para desconectarse de una bd
  //@param $conexion: Conexión de la bd que se va a cerrar
  function desconectar_bd($conexion_bd) {
      mysqli_close($conexion_bd);
  }

function verificarCuenta($usuario,$password){
    $conexion_bd = conectar_bd();
    
    $consulta = 'Select C.id as C_id, C.usuario as C_usuario, C.contrasena as C_contrasena From cuenta as C';
    $consulta.= ' Where C.usuario="'.$usuario.'"';
    $consulta.=' AND C.contrasena="'.$password.'"';

    $resultados = mysqli_query($conexion_bd, $consulta);
    $resultado="";
    $resultado2="";

  if(mysqli_num_rows($resultados)>0){
    while($row = mysqli_fetch_assoc($resultados)){
    	$resultado =  $row['C_usuario'];
    	$resultado2 = $row['C_contrasena'];
    }
  }

  if($resultado=="" && $resultado2==""){
  	$resultado3 = "false";
  }else if(($usuario==$resultado) && ($password=$resultado2)){
  	$resultado3 = "true";
  }

mysqli_free_result($resultados);
desconectar_bd($conexion_bd);
return $resultado3;

  }
?>