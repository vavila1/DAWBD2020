<?php
if (isset($_POST["lugar"])) {
      $lugar = htmlspecialchars($_POST["lugar"]);
  } else {
      $lugar = "";
    }

if(isset($_POST['incidente'])){
	$incidente = htmlspecialchars($_POST['incidente']);
}else{
	$incidente = "";
}

 echo getLugaressinboton($lugar,$incidente);


?>