<?php
$lugar=htmlspecialchars($_GET["nombre"]);
$titulo="Registrar incidente en ".$lugar;
$id=htmlspecialchars($_GET["id"]);
if(isset($_POST["incidente"])){
	$incidente = htmlspecialchars($_POST["incidente"]);
	insertarIncidente($id,$incidente);
	header("location:index.php");
}
?>