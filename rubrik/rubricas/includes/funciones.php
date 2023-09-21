<?php
$nombreTipoRubrica['RA'] = "Rúbrica analítica";
$nombreTipoRubrica['RH'] = "Rúbrica holística";
$nombreTipoRubrica['RV'] = "Rúbrica de lista de verificación";
$nombreTipoRubrica['RE'] = "Rúbrica escalar";
$nombreTipoRubrica['RO'] = "Rúbrica de observación";
$nombreTipoRubrica['AE'] = "Rúbrica de autoevaluación y coevaluación";
$nombreTipoRubrica['PU'] = "Rúbrica de punto único";


/* Recientes */
function ver_banco_recientes($start_from, $registro_por_pagina)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    /* //$conexion->set_charset("utf8"); */
    $query = "SELECT `idR`, `area`, `asignatura`, `titulo`, `descripcion`, `fechaCreacion` FROM `rubricas` ORDER BY `fechaCreacion` DESC LIMIT $start_from, $registro_por_pagina";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function totalPaginasRecientes($registro_por_pagina)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    $page_query = "SELECT `idR` FROM `rubricas`";
    $page_result = mysqli_query($conexion, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records / $registro_por_pagina);
    return $total_pages;
}

/* Final Recientes */



/*detacta la codificacion y la establece en UTF-8*/
function detectaCodificacion($str)
{ //Detecta la codificacion de un texto y la convierte
    $isutf = mb_detect_encoding($str, 'UTF-8', true); // false
    if ($isutf == true) {
        $str = utf8_decode($str);
        return $str;
    } else {
        return $str;
    }
}



/* Establece el tiempo*/
function time_difference($date)
{ // Retorna: STRING con la fecha formateada | Suministra: fecha  AAAA-MM-DD
    date_default_timezone_set("America/Bogota");
    if (empty($date)) {
        return "- - -";
    }
    $periods         = array("segundos", "minutos", "horas", "días", "semanas", "meses", "años", "decadas");
    $lengths         = array("60", "60", "24", "7", "4.35", "12", "10");
    $now             = strtotime("now");
    $unix_date         = strtotime($date);
    // check validity of date
    if (empty($unix_date)) {
        return "Bad date";
    }
    // is it future date or past date
    if ($now > $unix_date) {
        $difference     = $now - $unix_date;
        $tense         = "atras";
    } else {
        $difference     = $unix_date - $now;
        $tense         = "desde hoy";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {
        $periods[$j] .= " ";
    }
    return "$difference $periods[$j] {$tense}";
}


/* Establece el tiempo*/
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

    $arreglo = array("1"=>"Ene","2"=>"Feb","3"=>"Mar","4"=>"Abr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Ago","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dic");
    $mes="";
    for($i=1; $i < count($arreglo);$i++){
        ($i == $MM)?$mes = $arreglo[$i]:'';        
    }
    if($mes == "" || empty($mes)){
        return "- - -";
    }

    $fechaDia = $mes." ".$dia.", ".$AAAA;
    
    
    return $fechaDia;
}


function limitarPalabrasCrad($cadena, $longitud = 80, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}



/*reemplza caracteres*/
function replace_chars($content)
{

    $content = mb_strtolower($content);
    $content = strip_tags($content);
    $punctuations = array(
        ',', ')', '(', '.', "'", '"',
        '<', '>', '!', '¿', '?', '/', '-', '%20',

        '_', '[', ']', ':', '+', '=', '#',
        '$', '&quot;', '&copy;', '&gt;', '&lt;',
        '&nbsp;', '&trade;', '&reg;', ';',
        chr(10), chr(13), chr(9)
    );

    $content = str_replace($punctuations, "", $content);
    $content = preg_replace('/ {2,}/si', "", $content);

    return $content;
}



function limitarPalabrasCradtitle($cadena, $longitud = 10, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}




function datos_usuario($idU){
   $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php'); 
    mysqli_select_db($conexion, "edtk_registro");
    $conexion->set_charset("utf8");
    $consulta = "SELECT `idU`, `nombre`, `tipoSocial`, `picSocial` FROM `usuarios` WHERE `idU` =  $idU";    
    $result = mysqli_query($conexion, $consulta);
    $dato = $result->fetch_assoc();    
    $d1 = $dato['nombre'];
    $d2 = $dato['picSocial'];
    $tipo = $dato['tipoSocial'];
    $random = rand(1, 8);

    ($tipo == "Google") ? $imagen = $d2 : $imagen = "https://edtk.co/img/avatar".$random.".jpg";


    $arreglo = array('nombre'=>$d1,'imagen'=>$imagen);
    mysqli_close($conexion);
    return $arreglo;    
}


function convertToUTF8($text) {
    $encoding = mb_detect_encoding($text, mb_detect_order(), true);
    if ($encoding != "UTF-8") {
        $text = iconv($encoding, "UTF-8//IGNORE", $text);
    }
    return $text;
}

function busAreaNombre($idArea)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php'); 
    mysqli_select_db($conexion, "edtk_general");
    //$conexion->set_charset("utf8");   
    $sql = "SELECT `nombreArea` FROM `area` WHERE idArea = $idArea";
    $resultado = $conexion->query($sql) or die(mysqli_error($conexion));
    $datos = $resultado->fetch_assoc();
    mysqli_close($conexion);
    return $datos['nombreArea'];
}

function busAsignaturaNombre($idAsignatura)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    mysqli_select_db($conexion, "edtk_general");
    //$conexion->set_charset("utf8");   
    $sql = "SELECT `nombreAsignatura` FROM `asignatura` WHERE idAsignatura = $idAsignatura";
    $resultado = $conexion->query($sql) or die(mysqli_error($conexion));
    $datos = $resultado->fetch_assoc();
    mysqli_close($conexion);
    return $datos['nombreAsignatura'];
}


function ver_IdUsuario($idR)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
     
    $query = "SELECT `idU` FROM `rubusuario` WHERE idR = $idR" ;
    $result = mysqli_query($conexion, $query);
    $datos = $result->fetch_assoc();
    mysqli_close($conexion);
    return $datos['idU'];
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
