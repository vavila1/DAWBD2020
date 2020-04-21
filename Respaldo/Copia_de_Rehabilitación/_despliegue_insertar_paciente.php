<?php
session_start();


if(isset($_POST['Nombre']) && isset($_POST["Apellidop"]) && isset($_POST["Apellidom"]) && isset($_POST["Edad"])){
	$nombre = htmlspecialchars($_POST['Nombre']);
	$apellidop = htmlspecialchars($_POST['Apellidop']);
	$apellidom = htmlspecialchars($_POST['Apellidom']);
	$edad = htmlspecialchars($_POST['Edad']);
	insertarPaciente($nombre,$apellidop,$apellidom,$edad);
	header("location:pacientes.php");
}else{
	$nombre="";
	$apellidop = "";
	$apellidom = "";
	$edad = "";
}

 

?>