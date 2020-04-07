<?php
if (isset($_POST["ID"])) {
      $id = htmlspecialchars($_POST["ID"]);
  } else {
      $id = "";
    }

if(isset($_POST['Nombre'])){
	$nombre = htmlspecialchars($_POST['Nombre']);
}else{
	$nombre = "";
}

if(isset($_POST["Apellidop"])){
	$apellidop = htmlspecialchars($_POST["Apellidop"]);
}else{
	$apellidop = "";
}

if(isset($_POST["Apellidom"])){
	$apellidom = htmlspecialchars($_POST["Apellidom"]);
}else{
	$apellidom = "";
}

  echo getFruits($id,$nombre,$apellidop,$apellidom);


?>