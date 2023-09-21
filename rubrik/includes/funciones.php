<?php

$nombreTipoRubrica['RA'] = "Rúbrica analítica";
$nombreTipoRubrica['RH'] = "Rúbrica holística";
$nombreTipoRubrica['RV'] = "Rúbrica de lista de verificación";
$nombreTipoRubrica['RE'] = "Rúbrica escalar";
$nombreTipoRubrica['RO'] = "Rúbrica de observación";
$nombreTipoRubrica['AE'] = "Rúbrica de autoevaluación y coevaluación";
$nombreTipoRubrica['PU'] = "Rúbrica de punto único";


function horaYfecha()
{
    date_default_timezone_set("America/Bogota");
    $fecha = date('Y-m-d H:i:s');
    return $fecha;
}


function area($cat=1)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    
    if ($cat == 2) {
        $query = "SELECT idArea, nombreArea FROM area WHERE ext=$cat ORDER BY nombreArea ASC";
    } else {
        $query = "SELECT idArea, nombreArea FROM area WHERE ext=1 ORDER BY nombreArea ASC";
    }
   
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);

    return $result;
}


function nombreAreaId($idArea)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    $query = "SELECT `nombreArea`, `url` FROM area WHERE idArea = $idArea";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();  
    mysqli_close($conexion);   
    return array('nombre'=>$dato['nombreArea'], 'url'=>$dato['url']);
}


function asignatura($idArea)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    $query = "SELECT `idAsignatura`, `idArea`, `nombreAsignatura` FROM `asignatura` WHERE idArea = '$idArea' ORDER BY nombreAsignatura";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function datosAsignatura($idAsignatura)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
 require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    $query = "SELECT `nombreAsignatura`, `url` FROM `asignatura` WHERE idAsignatura = '$idAsignatura'";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();  
    mysqli_close($conexion);   
    return array('nombre'=>$dato['nombreAsignatura'], 'url'=>$dato['url']);
}


function verArea($idArea)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    $query = "SELECT nombreArea FROM area WHERE idArea = '$idArea'";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();
    $ver = $dato['nombreArea'];
    mysqli_close($conexion);
    return $ver;
}


function verAsignatura($idAsignatura)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_general");
    $conexion->set_charset("utf8");
    $query = "SELECT `nombreAsignatura` FROM `asignatura` WHERE idAsignatura = '$idAsignatura'";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();
    $ver = $dato['nombreAsignatura'];
    mysqli_close($conexion);
    return $ver;
}


function verEdad($edad)
{
    switch ($edad) {
        case 1:
            $rango = "Entre 5 a 6 años";
            break;
        case 2:
            $rango = "Entre 7 a 8 años";
            break;
        case 3:
            $rango = "Entre 9 a 10 años";
            break;
        case 4:
            $rango = "Entre 11 a 12 años";
            break;
        case 5:
            $rango = "Entre 13 a 14 años";
            break;
        case 6:
            $rango = "Entre 15 a 16 años";
            break;
        case 7:
            $rango = "Entre 17 y mas de 17 años";
            break;
        default:
            $rango = "No hay restriccion de edad";
    }
    return $rango;
}


function buscarRubricaPorUsuario($idU)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");    
    $query = "SELECT `idEst`, `idU`, `idR`, `tipo`, `token`, `fechaP` FROM `rubusuario` WHERE `idU` LIKE '$idU' ORDER BY `fechaP` DESC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function buscarRubrica($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");    
    $query = "SELECT `area`, `titulo`, `descripcion`,  `fechaCreacion` FROM `rubricas` WHERE `idR` = $idR";
    $result = mysqli_query($conexion, $query);
    /* $result->fetch_assoc(); */
    mysqli_close($conexion);

    return $result;
}


function buscarNumRubricasPorUsuario($idU)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
  require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");    
    $query = "SELECT `idEst` FROM `rubusuario` WHERE `idU` LIKE '$idU'";
    $result = mysqli_query($conexion, $query);
    $rowcount = mysqli_num_rows($result);
    mysqli_close($conexion);
    return $rowcount;
}


function verRubrica($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
   require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");    
    $query = "SELECT * FROM `rubricas` WHERE `idR` = $idR";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();
    mysqli_close($conexion);

    return $dato;
}


function validarIDU($idR){
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");
    $query = "SELECT `idU` FROM `rubusuario` WHERE `idR` = $idR";
    $result = mysqli_query($conexion, $query);
    $dato = $result->fetch_assoc();  
    mysqli_close($conexion);
    return $dato['idU'];
}


function autor($idR){
    $idU = validarIDU($idR);
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_registro");
    $conexion->set_charset("utf8");
    $query = "SELECT `nombre` FROM `usuarios` WHERE `idU` = $idU";
    $result = mysqli_query($conexion, $query);
    ($result)?'':redirect();
    $dato = $result->fetch_assoc();  
    mysqli_close($conexion);
    return $dato['nombre'];
}


function limpiarH($termino){
    $begin = array("<h1>","<h2>","<h3>");
    $end = array("</h1>","</h2>","</h3>");
    $termino = str_replace($begin, "<b>",$termino);
    $termino = str_replace($end, "</b>",$termino);
    return $termino;
}


function time_difference_month($date){ 
    date_default_timezone_set("America/Bogota");
    if (empty($date)) {
        return "- - -";
    }    
    $fecha = explode("-",$date);
    $diaHora =explode(" ", $fecha[2]);
    $AAAA = $fecha[0];
    if($AAAA == "" || empty($AAAA)){
        return "- - -";
    }    
    $MM = $fecha[1];
    if($MM == "" || empty($MM)){
        return "- - -";
    }
    $dia = $diaHora[0];
    if($dia == "" || empty($dia)){
        return "- - -";
    }
    $arreglo = array("1"=>"Enero","2"=>"Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
    $mes="";
    for($i=1; $i < count($arreglo);$i++){
        ($i == $MM)?$mes = $arreglo[$i]:'';        
    }
    if($mes == "" || empty($mes)){
        return "- - -";
    }
    $fechaDia = $dia." ".$mes." de ".$AAAA;
    return $fechaDia;
}


function redirect() {
    $serverName = "https://edtk.co/rubrik/";
    echo '<meta http-equiv="refresh" content="0;url='.$serverName.'">';
    exit;    
}


function eliminarRubusuario($idEst)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $query = "DELETE FROM `rubusuario` WHERE `idEst` = '$idEst'";
    $result = mysqli_query($conexion, $query);
    optimizarTablaBDPY("rubusuario");
    mysqli_close($conexion);
}


function eliminarRubrica($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $query = "DELETE FROM `rubricas` WHERE `idR` = '$idR'";
    $result = mysqli_query($conexion, $query);
    optimizarTablaBDPY("rubricas");
    mysqli_close($conexion);
}


function optimizarTablaBDPY($tabla)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $query = "OPTIMIZE TABLE `" . $tabla . "`";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function limitarPalabras($cadena, $longitud = 80, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        $cadena = implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        $cadena = $cadena;
    }
    return $cadena;
}


function consultarRubrica($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $conexion->set_charset("utf8");
    $query = "SELECT * FROM `rubricas` WHERE `idR` = $idR";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function updateAll($idR, $titulo, $area, $asignatura, $edad, $descripcion, $evaluacion){    
    
   $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    /* $conexion->set_charset("utf8");   */ 
    $query = "UPDATE `rubricas` SET `area`='$area',`asignatura`= '$asignatura',`edad`= '$edad',`titulo`= '$titulo',`descripcion`= '$descripcion',`evaluacion`= '$evaluacion' WHERE `idR` = $idR";
    $result = mysqli_query($conexion, $query);

    //updateAllBanco($idP, $titulo, $area, $asignatura, $edad, $descripcion, $herramienta);
    
    mysqli_close($conexion);
    return $result;
}

function ver_tipoRub($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
     
    $query = "SELECT `tipo` FROM `rubusuario` WHERE idR = $idR" ;
    $result = mysqli_query($conexion, $query);
    $datos = $result->fetch_assoc();
    mysqli_close($conexion);
    return $datos['tipo'];
}



?>