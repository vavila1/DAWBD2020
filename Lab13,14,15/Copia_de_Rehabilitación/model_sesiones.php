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

  function getFruits($idpaciente,$idsesion,$idfisioterapeuta){
    $conexion_bd = conectar_bd();
    if($idpaciente!="" || $idfisioterapeuta!=""){
      $resultado = "<table><thead><tr><th>Conteo Sesion</th><th>ID_Sesión</th><th>ID_Paciente</th><th>Nombre del Paciente</th><th>ID_Fisioterapeuta</th><th>Nombre del Fisioterapeuta</th><th>Pie Lastimado</th><th>Grado</th><th>Fecha</th></tr></thead>";
    }else {
      $resultado = "<table><thead><tr><th>ID_Sesión</th><th>ID_Paciente</th><th>Nombre del Paciente</th><th>ID_Fisioterapeuta</th><th>Nombre del Fisioterapeuta</th><th>Pie Lastimado</th><th>Grado</th><th>Fecha</th></tr></thead>";
    }
    


    $consulta = 'Select S.id as S_id, P.id as P_id, P.nombre as P_nombre, F.id as F_id, F.nombre as F_nombre, S.pie as S_pie, S.grado as S_grado, S.created_at as S_created_at FROM paciente as P, sesion as S, fisioterapeuta as F WHERE P.id = S.id_paciente AND F.id = S.id_fisioterapeuta';
     if($idpaciente!=""){
      $consulta .= " AND P.id=".$idpaciente;
      $contador = 0;
    }
    if($idsesion!=""){
      $consulta.=" AND S.id=".$idsesion;
    }
    if($idfisioterapeuta!=""){
      $consulta.=" AND F.id=".$idfisioterapeuta;
      $contador = 0;
    }
    $resultados = mysqli_query($conexion_bd, $consulta);



    if($idpaciente!="" || $idfisioterapeuta!=""){
          if(mysqli_num_rows($resultados)>0){
  while($row = mysqli_fetch_assoc($resultados)){
    $resultado.="<tr>";
    $resultado.="<td>" .($contador=$contador+1). "</td>";
    $resultado.="<td>" . $row['S_id'] . "</td>";
    $resultado.="<td>" . $row['P_id'] . "</td>";
    $resultado.="<td>".$row['P_nombre']."</td>";
    $resultado.="<td>".$row['F_id']."</td>";
    $resultado.="<td>".$row['F_nombre']."</td>";
    $resultado.="<td>".$row['S_pie']."</td>";
    $resultado.="<td>".$row['S_grado']."</td>";
    $resultado.="<td>".$row['S_created_at']."</td>";
    $resultado.="</tr>";
  }
}

    }else{
          if(mysqli_num_rows($resultados)>0){
  while($row = mysqli_fetch_assoc($resultados)){
    $resultado.="<tr>";
    $resultado.="<td>" . $row['S_id'] . "</td>";
    $resultado.="<td>" . $row['P_id'] . "</td>";
    $resultado.="<td>".$row['P_nombre']."</td>";
    $resultado.="<td>".$row['F_id']."</td>";
    $resultado.="<td>".$row['F_nombre']."</td>";
    $resultado.="<td>".$row['S_pie']."</td>";
    $resultado.="<td>".$row['S_grado']."</td>";
    $resultado.="<td>".$row['S_created_at']."</td>";
    $resultado.="</tr>";
  }
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
?>