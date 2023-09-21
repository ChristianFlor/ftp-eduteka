<?php

/*Datos de conexion*/
$server = 'localhost';
$usuario = 'edtk_edtk';
$clave = "r3002045";
$bd = "edtk_proyectos";

$conexion = new mysqli($server, $usuario, $clave, $bd); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

if (mysqli_connect_errno()) {
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}
?>