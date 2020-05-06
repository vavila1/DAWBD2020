<?php 
  //función para conectarnos a la BD
  function conectar_bd() {
      $conexion_bd = mysqli_connect("localhost","root","","examen");
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

  /*Funcion para obtener los lugares del parque*/

  function getLugares(){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th></tr></thead>';
    $consulta='Select L.id as L_id, L.nombre as L_nombre From lugar as L';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["L_nombre"]."</td>";
        $resultado.="<td>";
        $resultado.=getIncidente($row["L_id"]);
        $resultado.= '<a href="agregar_estado.php?id='.$row["L_id"].'&nombre='.$row["L_nombre"].'"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar estado</a>';
        $resultado.="</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }
  function inputEscribir($descripcion,$nomform){
    $resultado = '<div class="input-field"><input placeholder="Escribir '.$descripcion.'" type="text" class="validate" name="'.$nomform.'"><label for="">'.$descripcion.' del Parque</label></div>';
    return $resultado;
  }

  function insertarLugar($lugar){
    $conexion_bd=conectar_bd();
    $consulta='Insert Into lugar (nombre) Values (?) ';
    if(!($statement=$conexion_bd->prepare($consulta))){
    }
    if(!$statement->bind_param("s",$lugar)){
    }
    if(!$statement->execute()){
    }
    desconectar_bd($conectar_bd);
  }

  function selectIncidente($id,$columna,$tabla){
    $conexion_bd=conectar_bd();
    $resultado='<div class="input-field"><select name="'.$tabla.'" id="'.$tabla.'"><option value"" disabled selected>Selecciona una opción</option>';
    $consulta='Select '.$id.', '.$columna.' From '.$tabla;
    
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.='<option value="'.$row[$id].'">'.$row[$columna].'</option>';
      }
    }
    desconectar_bd($conexion_bd);
    $resultado.='</select><label>'.$columna.' '.$tabla.'...</label></div>';
    return $resultado;
  }
  function insertarIncidente($id,$incidente){
    $conexion_bd=conectar_bd();
    $consulta='Insert Into ocurre (id_lugar, id_incidente) Values (?,?)';

    if ( !($statement = $conexion_bd->prepare($consulta)) ) {
    }
    if (!$statement->bind_param("ii", $id, $incidente)) {

    }
    if (!$statement->execute()) {
  }
    desconectar_bd($conexion_bd);
  }
  function getIncidente($id){
    $conexion_bd=conectar_bd();
    $consulta='Select I.nombre as I_nombre, O.fecha as O_fecha From incidente as I, lugar as L, ocurre as O Where I.id = O.id_incidente AND L.id=O.id_lugar AND O.id_lugar='.$id.' Order By O.fecha ASC';
    $resultado="";
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.=$row["I_nombre"];
        $resultado.=" (".$row["O_fecha"].")";
        $resultado.="<br>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    return $resultado;
  }
  function boton(){
    $i = 1;
    $resultado;
    while($i<=4){
      if($i==1){
    $resultado='<a href="consultas.php?idb='.$i.'"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Consulta '.$i.'</a>';
    $resultado.=" ";
    $i=$i+1;
  }else{
  $resultado.='<a href="consultas.php?idb='.$i.'"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Consulta '.$i.'</a>';
  $resultado.=" ";
    $i=$i+1;    
  }
}
    return $resultado;
  }
function getLugaressinboton($lugar,$incidente){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th><th>Fecha</th></tr></thead>';
    $consulta='Select L.nombre as L_nombre, I.nombre as I_nombre, O.fecha as O_fecha From lugar as L, incidente as I, ocurre as O WHERE L.id = O.id_lugar AND I.id = O.id_incidente';
    if($lugar!=""){
      $consulta.= " AND O.id_lugar=".$lugar;
    }
    if($incidente!=""){
      $consulta.=" AND O.id_incidente=".$incidente;
    }
    $consulta.=" Order By O.fecha DESC";
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["L_nombre"]."</td>";
        $resultado.="<td>".$row["I_nombre"]."</td>";
        $resultado.="<td>".$row["O_fecha"]."</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }

?>