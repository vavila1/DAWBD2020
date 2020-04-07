<?php 
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

  function getFruits($id,$nombre,$apellidop,$apellidom){
    $conexion_bd = conectar_bd();
      $resultado = "<table><thead><tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Edad</th></tr></thead>";
    
    $consulta = 'Select P.id as P_id, P.nombre as P_nombre, P.apellidop as P_apellidop, P.apellidom as P_apellidom, P.edad as P_edad FROM paciente as P';
    $simplificacion = "";
    /* Para evitar los 16 ifs resultantes de las combinaciones entre cada variable, se simplificó de tal forma que se creó una variable y esta variable va a contener todas las condiciones de la consulta. Si no hay una anterior, se pondra como inicial de una consulta. Si hay una anterior, se agregara con un AND.
    */
    if($id!=""){
      $simplificacion = " Where P.id=".$id;
    }
    if($nombre!=""){
      if($simplificacion!=""){
        $simplificacion.= " AND P.nombre="."'".$nombre."'";
      }else{
        $simplificacion = " Where P.nombre="."'".$nombre."'";
      }
    }
    if($apellidop!=""){
      if($simplificacion!=""){
        $simplificacion.= " AND P.apellidop="."'".$apellidop."'";
      }else{
         $simplificacion = " Where P.apellidop="."'".$apellidop."'";
      }
    }
    if($apellidom!=""){
      if($simplificacion!=""){
        $simplificacion.= " AND P.apellidom="."'".$apellidom."'";
      }else{
        $simplificacion = " Where P.apellidom="."'".$apellidom."'";
      }
    }
    $consulta.= $simplificacion;

    

    $resultados = mysqli_query($conexion_bd, $consulta);


  if(mysqli_num_rows($resultados)>0){
    while($row = mysqli_fetch_assoc($resultados)){
      $resultado.="<tr>";
      $resultado.="<td>" . $row['P_id'] . "</td>";
      $resultado.="<td>" . $row['P_nombre'] . "</td>";
      $resultado.="<td>".$row['P_apellidop']."</td>";
      $resultado.="<td>".$row['P_apellidom']."</td>";
      $resultado.="<td>".$row['P_edad']."</td>";
      $resultado.="</tr>";
    }
  }



mysqli_free_result($resultados);
desconectar_bd($conexion_bd);
$resultado .= "</tbody></table>";
return $resultado;

  }

  function selectFruits($id, $columna, $tabla){
    $conexion_bd = conectar_bd();
    $resultado = '<div class="input-field"><select name="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';
    $consulta = "SELECT $id, $columna FROM $tabla";
    $resultados = mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
  while($row = mysqli_fetch_assoc($resultados)){
    $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna"].'</option>';
  }
}
    desconectar_bd($conexion_bd);
     $resultado .=  '</select><label>'.$columna." ".$tabla.'...</label></div>';
    return $resultado;
  }
  function busquedaEscrita($descripcion,$nomform){
    $resultado = '<div class="input-field"><input placeholder="Escribir '.$descripcion.'" type="text" class="validate" name="'.$nomform.'"><label for="">'.$descripcion.' del Paciente</label></div>';
    return $resultado;
  }

  //Funcion para insertar un registro de paciente.
  function insertarPaciente($nombre,$apellidop,$apellidom,$edad){
    $conexion_bd = conectar_bd();
    $consulta = 'Insert Into paciente (nombre, apellidop, apellidom, edad) Values (?,?,?,?) ';


    /*Con el siguiente codigo se puede encontrar el error en caso de existir.*/

    if ( !($statement = $conexion_bd->prepare($consulta)) ) {
    }
    if (!$statement->bind_param("ssss", $nombre, $apellidop, $apellidom, $edad)) {
    }
    if (!$statement->execute()) {
  }

    desconectar_bd($conexion_bd);
  }
?>