<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Lab9A01702029</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_copia.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
</head>
<body data-spy="scroll" data-target="#main-navbar" data-offset="70">
	<header id="header-section" class="container-fluid">
	</header>
	<nav id="main-navbar" class="navbar fixed-top navbar-dark bg-dark">
	 	<a class="navbar-brand" href="#"><img height="50px"></a>
	 	<ul class="nav nav-pills">
	  		<li class="nav-item">
	   			<a class="nav-link" href="#section1">Promedio</a>
	  		</li>
	  		<li class="nav-item">
	   			<a class="nav-link" href="#section2">Tabla</a>
	  		</li>
	  		<li class="nav-item">
	   			<a class="nav-link" href="#section3">Listas</a>
	  		</li>
	  		<li class="nav-item">
	   			<a class="nav-link" href="#section4">Mediana</a>
	  		</li>
	 	</ul>
	</nav>
	<div id="section1" class="container-fluid">
		<h1>Promedio</h1>
	 	<p><?php
        	$numeros=array(2,6,10,3,5);
$sumas=suma($numeros);
echo "El promedio del: ",print_r($numeros)," es: ",$sumas;
function suma($num){
	$sum = 0;
	foreach ($num as $key => $val) {
		$sum = $sum+$val;
	}return $sum/5;
}
        	?></p>
	</div>
	<div id="section2" class="container-fluid">
		<h1>Tabla</h1>
	 	<p><?php
        function tabla(){
	$intNum = 1;
	echo"<table align=center width=80% border=1 cellspacing=0 cellpading=2>";
	echo "<tr>";
	echo "<th>Numero</th>";
	echo "<th>Cuadrado del número</th>";
	echo "<th>Cubo del número</th>";
	echo "</tr>";
	while($intNum<=10){
		$intNum2 = $intNum*$intNum;
		$intNum3=$intNum2*$intNum;
		echo"<tr>";
		echo "<td>" .$intNum, "</td>";
		echo "<td>" .$intNum2, "</td>";
		echo "<td>" .$intNum3,"</td>";
		echo"<tr>";
		$intNum++;

	}echo"</table>";
} tabla();
        ?></p>
	</div>
	<div id="section3" class="container-fluid">
	 	<h1>Listas</h1>
	 	<p><?php
        	$numeros=array(2,6,10,3,5);
        	$sumas1=suma2($numeros);
        	function suma2($num){
        		$sum = 0;
        		foreach ($num as $key => $val) {
        			$sum = $sum+$val;
        		}return $sum/5;
        	}
        	echo"<ul>";
        	echo"<li>".$sumas1,"</li>";
        	sort($numeros);
        	echo"<li>".print_r($numeros),"</li>";
        	rsort($numeros);
        	echo"<li>".print_r($numeros),"</li>";
        	echo"</ul>";
        	?></p>
	</div>
	<div id="section4" class="container-fluid">
		<h1>Mediana</h1>
	 	<p><?php
        	$arreglo=array(2,6,10,3,5,4);
        	sort($arreglo);
        	$cantidad=count($arreglo);
        	echo"El arreglo es: ",print_r($arreglo),"<br>";
        	//Si la cantidad del arreglo es par, se tienen que escoger los 2 numeros que conforman la media y sacar el promedio de esos dos.
        	if($cantidad%2==0){
        		$cantidad2=$cantidad/2;
        		$prom=($arreglo[$cantidad2-1]+$arreglo[$cantidad2])/2;
        		echo"La mediana del arreglo es: ",$prom;
        	}else{
        		$cantidad2=$cantidad/2;
        		echo"La mediana del arreglo es: ",$arreglo[$cantidad2];
        	}
    ?></p>
	</div>
	</body>
</html>