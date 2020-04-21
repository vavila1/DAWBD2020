<?php
session_start();
require_once("model_pacientes.php");
$id = htmlspecialchars($_GET["id"]);
borrarAlmacen($id);
header("location:pacientes.php");
?>