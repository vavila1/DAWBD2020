<?php
$titulo="Registrar";
if(isset($_POST['lugar'])){
	$lugar = htmlspecialchars($_POST['lugar']);
	insertarLugar($lugar);
	header("location:index.php");
}else{
	$lugar="";
}
?>