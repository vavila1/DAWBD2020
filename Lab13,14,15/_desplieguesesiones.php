<?php
if (isset($_POST["paciente"])) {
      $paciente = htmlspecialchars($_POST["paciente"]);
  } else {
      $paciente = "";
  }
  if (isset($_POST["sesion"])) {
      $sesion = htmlspecialchars($_POST["sesion"]);
  } else {
      $sesion = "";
  }

  if (isset($_POST["fisioterapeuta"])) {
      $fisioterapeuta = htmlspecialchars($_POST["fisioterapeuta"]);
  } else {
      $fisioterapeuta = "";
  }

  echo getFruits($paciente,$sesion,$fisioterapeuta);

?>