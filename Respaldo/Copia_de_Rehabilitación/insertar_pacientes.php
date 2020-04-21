<?php
session_start();
require_once("model_pacientes.php");

include("_header.html");

include("_navpacientes.html");  

include("_form_insertarpaciente.html");
include ("_despliegue_insertar_paciente.php");

  include("_footer.html"); 
 
?>