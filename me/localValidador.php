<?php
session_start();
require_once('../includes/initialFunctions.php');

$correo = trim(replace_chars($_POST['email']));
$clave = trim(replace_chars($_POST['pwd']));

$clave = trim(md5($clave));



$datos = validador($correo,$clave);

if($datos != 0){
    $contenido = $datos['datos'];
    $_SESSION['NOMBREU'] = $contenido['nombre'];   
    $_SESSION["idU"] = $contenido['idU'];
    print_r($datos['indicador']);
    

}else{
    echo $datos;
}





?>