<?php

require_once('../includes/initialFunctions.php');

$correo = $_POST['correo'];
$validador = validadorCorreo($correo);

if($validador > 0){
    echo 1;
}else{
    echo 0;
}



?>