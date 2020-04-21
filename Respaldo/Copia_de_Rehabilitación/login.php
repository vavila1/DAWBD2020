<?php
    session_start();
    require_once("model_login.php");
 
    
 
    if (isset($_POST["usuario"])) {
        $_POST["usuario"] = htmlspecialchars($_POST["usuario"]);
    }
    if (isset($_POST["password"])) {
        $_POST["password"]= htmlspecialchars($_POST["password"]);
    }
 
    if (isset($_SESSION["usuario"])) {
        include("_header.html");
        include("_navgeneral.html");
    } else if ($_POST["usuario"] && $_POST["password"]) {
        $resultado = verificarCuenta($_POST["usuario"], $_POST["password"]);
        if($resultado=="true"){
        $_SESSION["usuario"] = $_POST["usuario"];
        include("_header.html");
        include("_navgeneral.html");
        header("location:pacientes.php");
        }else if($resultado=="false"){
        $error = "Usuario y/o password incorrectos";
        include("index.php");
        }
    } else if ($_POST["usuario"] == "" && $_POST["password"] == "" 
                && isset($_POST["usuario"])  && isset($_POST["password"]) ) {
        $error = "Ingresa tu usuario y contraseña";
        include("index.php");
    } else if(isset($_POST["usuario"]) || isset($_POST["password"])) {
        sleep(1);
        $error = "Usuario y/o password incorrectos";
        include("index.php");
    } else {
        header("location:index.php");
    }
    
    include("_footer.html");

 ?>