<?php

function limitarPalabrasCrad($cadena, $longitud = 40, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}


function limitarPalabrasDescripcion($cadena, $longitud = 100, $elipsis = ' ...')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}



function ver_banco_recientes($start_from, $registro_por_pagina)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_proyectos");
    if (!$conexion) {
        // Manejo de error en caso de que la conexión falle.
        return false;
    }

    $query = "SELECT `idP`, `idU`, `tipo`, `area`, `asignatura`, `grado`, `titulo`, `descripcion`, `url`, `fechaPub` FROM `bancoProyectos` ORDER BY `fechaPub` DESC LIMIT ?, ?";    
    $stmt = mysqli_prepare($conexion, $query);
    if (!$stmt) {
        // Manejo de error en caso de que la preparación de la consulta falle.
        mysqli_close($conexion);
        return false;
    }
    // Usamos bind_param para pasar los valores de start_from y registro_por_pagina de manera segura.
    mysqli_stmt_bind_param($stmt, 'ii', $start_from, $registro_por_pagina);    
    // Ejecutamos la consulta preparada.
    mysqli_stmt_execute($stmt);    
    // Obtenemos el resultado.
    $result = mysqli_stmt_get_result($stmt);    
    // Cerramos la consulta y la conexión.
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);    
    return $result;
}



function ver_rubricas_recientes($start_from, $registro_por_pagina)
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
    require($ahostR.'/conexion.php');
    
    // Verificamos que $start_from y $registro_por_pagina sean números enteros válidos.
    if (!is_int($start_from) || !is_int($registro_por_pagina) || $start_from < 0 || $registro_por_pagina <= 0) {
        return false;
    }

    $query = "SELECT `idR`, `area`, `asignatura`, `titulo`, `descripcion`, `fechaCreacion` FROM `rubricas` ORDER BY `fechaCreacion` DESC LIMIT ?, ?";    
    $stmt = mysqli_prepare($conexion, $query);

    if (!$stmt) {
        // Manejo de error en caso de que la preparación de la consulta falle.
        mysqli_close($conexion);
        return false;
    }

    // Usamos bind_param para pasar los valores de start_from y registro_por_pagina de manera segura.
    mysqli_stmt_bind_param($stmt, 'ii', $start_from, $registro_por_pagina);    
    // Ejecutamos la consulta preparada.
    mysqli_stmt_execute($stmt);    
    // Obtenemos el resultado.
    $result = mysqli_stmt_get_result($stmt);    
    // Cerramos la consulta y la conexión.
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    
    return $result;
}


    /* Recientes */

function ver_cursos_recientes($start_from, $registro_por_pagina)
{
    $ahostR = "/newDisk/edtk/public_html/planeo";
    require($ahostR.'/conexion.php');
    
    // Verificamos que $start_from y $registro_por_pagina sean números enteros válidos.
    if (!is_int($start_from) || !is_int($registro_por_pagina) || $start_from < 0 || $registro_por_pagina <= 0) {
        return false;
    }

    $query = "SELECT `idEst`, `area`, `tema`, `descripcion`, `fechaE` FROM `edukusuario` WHERE descripcion NOT LIKE '' ORDER BY `fechaE` DESC LIMIT ?, ?";
    
    $stmt = mysqli_prepare($conexion, $query);

    if (!$stmt) {
        // Manejo de error en caso de que la preparación de la consulta falle.
        mysqli_close($conexion);
        return false;
    }

    // Usamos bind_param para pasar los valores de start_from y registro_por_pagina de manera segura.
    mysqli_stmt_bind_param($stmt, 'ii', $start_from, $registro_por_pagina);
    
    // Ejecutamos la consulta preparada.
    mysqli_stmt_execute($stmt);
    
    // Obtenemos el resultado.
    $result = mysqli_stmt_get_result($stmt);
    
    // Cerramos la consulta y la conexión.
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    
    return $result;
}




function busAreaNombre($idArea)
{
    require(__DIR__.'/initialConection.php');
    
    // Verificamos que $idArea sea un número entero válido.
    if (!is_int($idArea) || $idArea <= 0) {
        return false;
    }

    mysqli_select_db($conexion, "edtk_general");

    $sql = "SELECT `nombreArea` FROM `area` WHERE idArea = ? ";
    $stmt = mysqli_prepare($conexion, $sql);

    if (!$stmt) {
        // Manejo de error en caso de que la preparación de la consulta falle.
        mysqli_close($conexion);
        return false;
    }

    // Usamos bind_param para pasar el valor de idArea de manera segura.
    mysqli_stmt_bind_param($stmt, 'i', $idArea);

    // Ejecutamos la consulta preparada.
    mysqli_stmt_execute($stmt);

    // Obtenemos el resultado.
    $resultado = mysqli_stmt_get_result($stmt);

    // Obtenemos los datos.
    $datos = mysqli_fetch_assoc($resultado);

    // Cerramos la consulta y la conexión.
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    return $datos ? $datos['nombreArea'] : null;
}



function datos_usuario($idU)
{
    require(__DIR__.'/initialConection.php');
    
    // Verificamos que $idU sea un número entero válido.
    if (!is_int($idU) || $idU <= 0) {
        return false;
    }

    mysqli_select_db($conexion, "edtk_registro");
    $conexion->set_charset("utf8");

    $consulta = "SELECT `idU`, `nombre`, `tipoSocial`, `picture` FROM `usuarios` WHERE `idU` = ?";
    $stmt = mysqli_prepare($conexion, $consulta);

    if (!$stmt) {
        // Manejo de error en caso de que la preparación de la consulta falle.
        mysqli_close($conexion);
        return false;
    }

    // Usamos bind_param para pasar el valor de idU de manera segura.
    mysqli_stmt_bind_param($stmt, 'i', $idU);

    // Ejecutamos la consulta preparada.
    mysqli_stmt_execute($stmt);

    // Obtenemos el resultado.
    $result = mysqli_stmt_get_result($stmt);

    // Obtenemos los datos.
    $dato = mysqli_fetch_assoc($result);

    // Cerramos la consulta y la conexión.
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    if (!$dato) {
        return false;
    }

    $d1 = $dato['nombre'];
    $d2 = $dato['picture'];
    $tipo = $dato['tipoSocial'];
    $random = rand(1, 8);

    ($tipo == "Twitter" || $tipo == "Google") ? $imagen = $d2 : $imagen = "https://eduteka.net/img/avatar".$random.".jpg";

    $arreglo = array('nombre' => $d1, 'imagen' => $imagen);
    
    return $arreglo;
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


function buscarEdades($edad){ 
    
    $edades = explode(",", $edad);
    $totalE = "";
    if(count($edades) == 1){
        return edades($edades[0]);
    }else{
        for($i=0;$i<count($edades);$i++){        
            $e = edad($edades[$i]);
            $totalE = $totalE." a ".$e;
        }
        $totalE = substr($totalE, 2);

        return $totalE;
    }
    
    
}

function edad($edad){
    switch ($edad) {
        case 1:
            return "6";
            break;
        case 2:
            return "11";
            break;
        default:
            return "15+";
    }
}

function edades($edad){
    switch ($edad) {
        case 1:
            return "6 a 10";
            break;
        case 2:
            return "11 a 14";
            break;
        default:
            return "15+";
    }
}


function nombreHerramienta($idCat){
    require(__DIR__.'/initialConection.php');    
    mysqli_select_db($conexion, "edtk_general");
    $conexion->set_charset("utf8");
    $consulta = "SELECT `nombreCat` FROM `categorias` WHERE `idCat` =  $idCat";        
    $result = mysqli_query($conexion, $consulta);
    $fila = $result->fetch_assoc();
    return $fila['nombreCat'];
    mysql_close($conexion);   
}


function nombreArea($idArea){
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_general");
    $conexion->set_charset("utf8");    
    $consulta = "SELECT `nombreArea` FROM `area` WHERE `idArea` = $idArea ";;
    $result = mysqli_query($conexion, $consulta);
    $fila = $result->fetch_assoc();
    return $fila['nombreArea'];
    mysql_close($conexion);   
}



function validador($correo,$c)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `idU`, `nombre`, `correo`, `tipoSocial`, `uid`, `gender`, `linkSocial`, `picSocial`, `picture`, `validate`, `fecha` FROM `usuarios` WHERE `correo` = '$correo' AND `contrasenha` ='$c'";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();               
    $row_cnt = $result->num_rows;
    return ($row_cnt > 0) ? array("indicador"=>1,"datos"=>$datos) : 0 ;     
    mysqli_close($conexion);    
}

function validadorGoogle($correo,$id)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `idU`, `nombre`, `correo`, `tipoSocial`, `uid`, `gender`, `linkSocial`, `picSocial`, `picture`, `validate`, `fecha` FROM `usuarios` WHERE `correo` = '$correo' AND `uid` ='$id'";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();               
    $row_cnt = $result->num_rows;
    return ($row_cnt > 0) ? $datos : 0 ;     
    mysqli_close($conexion);    
}


/*reemplza caracteres*/
function replace_chars($content)
{

    
    $content = strip_tags($content);
    $punctuations = array(
        ',', ')', '(', "'", '"',
        '<', '>', '!', '¿', '?', '/', '[', ']', ':', '=', '&quot;', '&copy;', ';',
        chr(61),chr(10), chr(13), chr(9)
    );

    $content = str_replace($punctuations, "", $content);
    $content = preg_replace('/ {2,}/si', "", $content);

    return $content;
}



function pais(){

    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $conexion->set_charset("utf8"); 
    $query = "SELECT `idPais`, `codigoPais`, `pais` FROM `paises`";
    $result = mysqli_query($conexion, $query);    
    mysqli_close($conexion);
    return $result;

}


function cargo(){

    $cargo = array(
        'Cargo',
        'Directivo Docente',
        'Docente',
        'Docente en Formación',
        'Coordinador Informático',
        'Coordinador Académico',
        'Formador de Docentes',
        'Bibliotecólogo',
        'Otro'
    );

    return $cargo;

}


function grado(){
    $grado = array(array("Preescolar",1),array("Básica Primaria (1°-5°)",2),array("Básica Secundaria (6°-9°)",3),array("Media (10°-11°)",4),array("Superior",5),array("Otro",6));

    return $grado;
}

function materias(){
    $materias = array(array("Informática",1),array("Lenguaje",2),array("Matemáticas",3),array("Ciencias Naturales",4),array("Ciencias Sociales",5),array("Arte",6),array("Humanidades",7),array("Idiomas Extranjeros",8),array("Comercio",9),array("Otra(s)",10));

    return $materias;
}



function validadorCorreo($correo)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `idU` FROM `usuarios` WHERE `correo` = '$correo'";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();               
    $row_cnt = $result->num_rows;
    return  $row_cnt;     
    mysqli_close($conexion);    
}


function registroUsuario($nombre, $correo, $pwd, $tipoSocial, $uid, $grado, $linkSocial, $picSocial, $picture, $validate, $fecha)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "INSERT INTO `usuarios`(`idU`, `nombre`, `correo`, `contrasenha`, `tipoSocial`, `uid`, `gender`, `linkSocial`, `picSocial`, `picture`, `validate`, `fecha`) VALUES (null,'$nombre','$correo','$pwd','$tipoSocial','$uid','$grado','$linkSocial','$picSocial','$picture','$validate','$fecha')";
    $result = mysqli_query($conexion, $query); 
    $idU = $conexion->insert_id;
    return  $idU;     
    mysqli_close($conexion);    
}


function registroUsuarioProfesion($idU, $colegio, $tipoCol, $cargos, $grados, $materias)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "INSERT INTO `profesion`(`id_prof`, `idU`, `colegio`, `tipoCol`, `cargos`, `grados`, `materia`) VALUES (NULL,'$idU','$colegio','$tipoCol','$cargos','$grados','$materias')";
    $result = mysqli_query($conexion, $query); 
    $id_prof = $conexion->insert_id;
    return  $id_prof;     
    mysqli_close($conexion);    
}


function registroUsuarioLocal($idU, $pais, $ciudad)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "INSERT INTO `local`(`idLocal`, `idU`, `pais`, `depto`, `municipio`, `municipioX`) VALUES (NULL,'$idU','$pais','','','$ciudad')";
    $result = mysqli_query($conexion, $query); 
    $id_prof = $conexion->insert_id;
    return  $id_prof;     
    mysqli_close($conexion);    
}


function validadorCorreoConId($correo)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `idU` FROM `usuarios` WHERE `correo` = '$correo'";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();
    return  $datos['idU'];     
    mysqli_close($conexion);    
}



function mres($value){
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}


function eliminarCaracteres($valor){
    $valor = mres($valor);
    $valor = strip_tags($valor);

    $punctuations = array(',', ')', '(', "'", '"',
    '<', '>', '!', 'Â¿', '?', '/','%20', '[', ']', ':', '+', '=', '#',
    '$', '&quot;', '&copy;', '&gt;', '&lt;',
    '&nbsp;', '&trade;', '&reg;', ';','<Img',
    chr(10), chr(13), chr(9));   

    $valor = str_replace($punctuations, " ", $valor);
    $valor = preg_replace('/[\&#\.\;\" "]+/', '', $valor);
    $valor = preg_replace('/[\>\.\;\" "]+/', '', $valor);
    $valor = preg_replace('/[\=\.\;\" "]+/', '', $valor);
    $valor = preg_replace('/[\=\.\;\" "]+/', '', $valor);
    $valor = strip_tags($valor);      
    return $valor;
}



function validadorCorreoConRecordar($correo)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `tipoSocial` FROM `usuarios` WHERE `correo` = '$correo' ";
    $result = mysqli_query($conexion, $query); 
    $row_cnt = $result->num_rows;
    if($row_cnt > 0){
        $datos = $result->fetch_assoc();
        if($datos['tipoSocial'] != ""){
            return 2;
        }else{
            return 1;
        }
    }else{
        return 0;
    }
    
    
    
    mysqli_close($conexion);    
}



function buscarUsuarioConRecordar($correo)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `nombre`, `contrasenha` FROM `usuarios` WHERE `correo` = '$correo' ";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos;    
    mysqli_close($conexion);    
}

function buscarUsuarioConPwd($pwd)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `idU`, `nombre`, `contrasenha` FROM `usuarios` WHERE `contrasenha` = '$pwd' AND `tipoSocial` =''";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos;    
    mysqli_close($conexion);    
}

function cambioClave($idU, $c){
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "UPDATE `usuarios` SET `contrasenha` = '$c' WHERE `usuarios`.`idU` = $idU";
    $result = mysqli_query($conexion, $query);     
    return $result;    
    mysqli_close($conexion);   
}


function consultaUsuarioBeta($idU)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `validate` FROM `usuarios` WHERE `idU` = '$idU' ";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos['validate'];
    mysqli_close($conexion);    
}



function consultaUsuario($idU)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `nombre`, `correo` FROM `usuarios` WHERE `idU` = '$idU' ";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos;    
    mysqli_close($conexion);    
}

function consultaUsuarioPerfil($idU)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `colegio`, `tipoCol`, `cargos`, `grados`, `materia` FROM `profesion` WHERE `idU` = '$idU' ";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos;    
    mysqli_close($conexion);    
}

function consultaUsuarioLocal($idU)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "SELECT `pais`, `municipioX` FROM `local` WHERE `idU` = '$idU' ";
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();   
    return $datos;    
    mysqli_close($conexion);    
}



function compararGrados($arreglo, $idGrado)
{
    $vali = false;

    for ($i = 0; $i < count($arreglo); $i++) {
        if ($idGrado == $arreglo[$i]) {
            $vali = true;
        }
    }
    if ($vali) {
        return true;
    } else {
        return false;
    }
}




function registroUsuarioActulizar($idU,$nombre)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "UPDATE `usuarios` SET `nombre`='$nombre' WHERE `idU` = $idU";
    $result = mysqli_query($conexion, $query);     
    return  $result;     
    mysqli_close($conexion);    
}


function registroUsuarioProfesionActulizar($idU, $colegio, $tipoCol, $cargos, $grados, $materias)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "UPDATE `profesion` SET `colegio`='$colegio',`tipoCol`='$tipoCol',`cargos`='$cargos',`grados`='$grados',`materia`='$materias' WHERE `idU` = $idU";
    $result = mysqli_query($conexion, $query);     
    return  $result;        
    mysqli_close($conexion);    
}


function registroUsuarioLocalActualizar($idU, $pais, $ciudad)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $query = "UPDATE `local` SET `pais`='$pais',`municipioX`='$ciudad' WHERE `idU` = $idU";
    $result = mysqli_query($conexion, $query); 
    $id_prof = $conexion->insert_id;
    return  $id_prof;     
    mysqli_close($conexion);    
}

function paisId($idPais){

    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_registro");
    $conexion->set_charset("utf8"); 
    $query = "SELECT `idPais`, `codigoPais`, `pais` FROM `paises` WHERE `idPais` = $idPais";           
    $result = mysqli_query($conexion, $query); 
    $datos = $result->fetch_assoc();  
    mysqli_close($conexion);
    return $datos;

}

function registroAdd($ip)
{
    require(__DIR__.'/initialConection.php');
    mysqli_select_db($conexion, "edtk_general");
    $query = "UPDATE `visitas` SET `adRegister`='1' WHERE `ip` = '$ip'";
    $result = mysqli_query($conexion, $query); 
    mysqli_close($conexion);    
}


?>