<?php
header('Content-Type: text/html; charset=utf-8');
require('../../config.php');
include('funciones.php');

$idR = $_POST['idProyWQ'];
$titulo = utf8_decode($_POST['titulo']);
$area = $_POST['area'];
$asignatura = $_POST['asignatura'];
$descripcion = $_POST['descripcion'];
$evaluacion = $_POST['evaluacion'];
$edad = $_POST['edad'];
$herramienta = $_POST['herramienta'];


$r = updateAll($idR, $titulo, $area, $asignatura, $edad, $descripcion, $evaluacion);

$idU = $_SESSION["idU"];  

logCrear($idU,$idR,10,'');

?>