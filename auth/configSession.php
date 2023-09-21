<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
/*** Retorna: ARRAY con los datos del usuario | Suministra: ID usuario ***/
function get_infoBasicaUsuario($idU)
{
	$base1 = mysql_select_db("edtksite_registro");
	$sql1 = mysql_query("SELECT * FROM registro_usuarios WHERE idU='$idU'");
	$datoBasico = mysql_fetch_array($sql1, MYSQL_ASSOC);
		
	$sql=mysql_query("SELECT pais, municipioX FROM registro_local WHERE idU = '$idU'");
	$datoLocal = mysql_fetch_array($sql, MYSQL_ASSOC);

	$sql=mysql_query("SELECT colegio,tipoCol,cargos,grados,materia FROM registro_profesion WHERE idU = '$idU'");
	$datoprofesion = mysql_fetch_array($sql, MYSQL_ASSOC);



   if (!mysql_num_rows($sql1)) { 
		$datosUsuario = "Usuario Eduteka";
	}else {
        $datosUsuario = array_merge($datoBasico, $datoLocal,$datoprofesion);
	}
return $datosUsuario;	
}


/***  Retorna: STRING con el numero de ranking del user | Suministra: ID usuario ***/
function get_RankingUser($idU) {
$base1 = mysql_select_db("edtksite_registro");
$queryArchivo = "SELECT * FROM registro_status WHERE idU ='$idU' ";
$namex = mysql_query("$queryArchivo");
$numFilas = mysql_num_rows($namex);
       
    if ($numFilas == 0) {
        $idBc[rankDatos] = "1";
    } else {
		$datosP = mysql_fetch_array($namex, MYSQL_ASSOC);
		$idBc = $datosP;
   }
return $idBc;
}



function administrador($idU){	// Valida si es una ADMINISTRADOR VALIDO 

	$idAdministradores = array("28239","165930","35565","30013","32202","168832","183359");
	
   	if (in_array($idU, $idAdministradores)){
		$checkItem = "maracuyeah";
	} else {
		$checkItem = null;
	}

	return $checkItem;
}

/*** Retorna: ARRAY ordenado por un criterio | Suministra: argumentos de ordenacion ***/
function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

function get_UserComparte($idU)
{
	$base1 = mysql_select_db("edtksite_actividades");
    $categoriasQuery = mysql_query("SELECT idUoriginal FROM mcii_compartido WHERE idU = '$idU'");

        $datos = mysql_fetch_array($categoriasQuery, MYSQL_ASSOC);
        return $datos[idUoriginal];

}

function limpiaUsername($txt)
{
    $txt = trim($txt);
    $txt = rtrim($txt);
	$find = array('ñ', 'á', 'ó', 'é', 'ú', 'Í');
	$repl = array('n', 'a', 'o', 'e', 'u', 'i');
	$txt = str_replace ($find, $repl, $txt);
    return $txt;
}

function creaUsernameForo ($idU,$nombre,$correo){
    $fechaSQL = date("Y-m-d h:i:s");
    $DesdeLetra = "a";
    $HastaLetra = "z";
    $lRnd = strtoupper(chr(rand(ord($DesdeLetra), ord($HastaLetra))));
    $lRnd2 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
    $n = rand(1,9999);
    
    $nombre =   ltrim($nombre);
        
    $username   =   explode(' ', $nombre);
    $namenuevo  =   ucfirst(strtolower($username[0]));
    $apellido   =   ucfirst(strtolower($username[1]));
    $apellido2  =   ucfirst(strtolower($username[2]));
    $apellido2  =   $apellido2[0];
    
    $usernamefinal =  $namenuevo." ".$apellido." ".$apellido2."-".$n.$lRnd;
    $nemx = htmlentities($usernamefinal, ENT_XML1,'ISO-8859-1', true); 
    
    $nemx = trim($nemx);
    $nemx = rtrim($nemx);
	$find = array('ñ', 'á', 'ó', 'é', 'ú', 'Í');
	$repl = array('n', 'a', 'o', 'e', 'u', 'i');
	$nemx = str_replace ($find, $repl, $nemx);
    
    $base1 = mysql_select_db("edtksite_registro");
    $sqlinsert = "INSERT INTO registro_foro (idU,nombre,usuario,correo,visitas,fechaIng) VALUES ('$idU','$nombre','$nemx','$correo','1','$fechaSQL')";
    $resultInsert = mysql_query($sqlinsert);
    
    return $nemx;
}

function incrementaVisita($idU,$visitas) {
    $newVis = $visitas+1;
    $sql = mysql_query("UPDATE registro_foro SET visitas = '$newVis', fechaIng = NOW() WHERE idU = '$idU' ");
    return $newVis; 
}

function Redirect($filename)
{
    if (!headers_sent())
        header('Location: ' . $filename);
    else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $filename . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $filename . '" />';
        echo '</noscript>';
    }
}
?>