<?php
session_start();
setlocale(LC_ALL, 'es-ES');
date_default_timezone_set("America/Bogota");
$fecha = date('Y-m-d h:i:s');

header('Content-Type: text/html; charset=utf-8');

$serverDir = "https://edtk.co/proyectos/gp/";
$serverName = "https://edtk.co/";
$serverPath = __DIR__;
$ahost = "/newDisk/edtk/public_html/";
$ahostR = "/newDisk/edtk/public_html/rubrik/";

$DirProyecto = "https://edtk.co/proyecto/";
$serverMitica = "https://edtk.co/mitica/";
$serverRubrik = "https://edtk.co/rubrik/";
$serverRubrikDescubrir = "https://edtk.co/rubrikas/";
$serverPlaneo = "https://edtk.co/planeo/";
$serverPlaneoDescubrir = "https://edtk.co/planeaciones/";
$DirCurso = "https://edtk.co/cursos/";

$imagePaginaDefault = "https://edtk.co/img/LabMeta.png";


function administrador($idU){	// Valida si es una ADMINISTRADOR VALIDO 

	$idAdministradores = array("28239","165930","35565","30013","32202","168832","154245","168832","205258","38903","196442","159671","192419","224112");
   	if (in_array($idU, $idAdministradores)){
		$checkItem = "maracuyeah";
	} else {
		$checkItem = null;
	}

	return $checkItem;
}


if(isset($_SESSION["idU"]) && isset($_SESSION["NOMBREU"])){
	$nombreUsuario = $_SESSION['NOMBREU'];
	$idU = $_SESSION["idU"];

	$porciones = explode(" ", $nombreUsuario);

	if(count($porciones) > 1){
		$primera = $porciones[0];
		$segunda = $porciones[1];

		$letras = $primera[0].$segunda[0];
		$letras = strtoupper($letras);

	}else{
		$unica = $porciones[0];
		$letras = $unica[0].$unica[1];
		$letras = strtoupper($letras);
	}
}

//include ($ahost."edtk2_startSession.php");
//include ("/home/edutek/public_html/edtk2_startSession.php");
//$idU = $_SESSION["IDU"];

$estadoIni ="";
$estadoDes ="";
$estadoMis ="";
$estadoCre ="";
$estadoTut ="";


function letrasNm($nombreUsuario){
    $porciones = explode(" ", $nombreUsuario);

	if(count($porciones) > 1){
		$primera = $porciones[0];
		$segunda = $porciones[1];

		$letras = $primera[0].$segunda[0];
		$letras = strtoupper($letras);

	}else{
		$unica = $porciones[0];
		$letras = $unica[0].$unica[1];
		$letras = strtoupper($letras);
	}
    
    return $letras;
	
}


function logCrear($idU, $idP, $tipoLog, $token)
{
    require('includes/initialConection.php');
    $conexion->set_charset("utf8");
    mysqli_select_db($conexion, "edtk_general");

    // Utilizamos una consulta preparada para evitar la inyección de SQL
    $query = "INSERT INTO `logs` (`idLog`, `idU`, `idP`, `tipoLog`, `token`, `fechaLog`) VALUES (null, ?, ?, ?, ?, NOW())";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        // Usamos bind_param para pasar los valores de manera segura
        mysqli_stmt_bind_param($stmt, 'iiss', $idU, $idP, $tipoLog, $token);

        // Ejecutamos la consulta preparada
        mysqli_stmt_execute($stmt);

        // Cerramos la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        // Manejo de error en caso de que la preparación de la consulta falle
        error_log("Error en consulta preparada: " . mysqli_error($conexion));
    }

    // Cerramos la conexión
    mysqli_close($conexion);
}


$accionLog[0] = "Error IDEA";
$accionLog[1] = "Nuevo Registro";
$accionLog[2] = "Ingresó a IDEA";
$accionLog[3] = "Salió de IDEA";

$accionLog[4] = "Crear Proyecto";
$accionLog[5] = "Editó Proyecto";
$accionLog[6] = "Eliminó Proyecto";
$accionLog[7] = "Actualizó Actividades";
$accionLog[8] = "Actualizó Evaluación";

$accionLog[9] = "Creo Rúbrica";
$accionLog[10] = "Editó Rúbrica";
$accionLog[11] = "Eliminó Rúbrica";
$accionLog[12] = "Actualizó Rúbrica";
$accionLog[13] = "Error RubriK";

$accionLog[15] = "Creo Temas";
$accionLog[16] = "Creo Objetivos";
$accionLog[17] = "Creo Curso";
$accionLog[18] = "Creo Generales Curso";
$accionLog[19] = "Eliminó Curso";
$accionLog[20] = "Error Planeo";
$accionLog[21] = "Editó Curso";


$nombreMet['APP'] = "Aprendizaje Basado en Proyectos";
$nombreMet['ABC'] = "Aprendizaje Basado en Casos";
$nombreMet['ABR'] = "Aprendizaje Basado en Retos";
$nombreMet['ABP'] = "Aprendizaje Basado en Problemas";
$nombreMet['ABI'] = "Aprendizaje Basado en Indagación";
$nombreMet['AII'] = "Aprendizaje Basado en Investigación";
$nombreMet['AI'] = "Aprendizaje Invertido";

$nombreTipoRubrica['RA'] = "Rúbrica analítica";
$nombreTipoRubrica['RH'] = "Rúbrica holística";
$nombreTipoRubrica['RV'] = "Rúbrica de lista de verificación";
$nombreTipoRubrica['RE'] = "Rúbrica escalar";
$nombreTipoRubrica['RO'] = "Rúbrica de observación";
$nombreTipoRubrica['AE'] = "Rúbrica de autoevaluación y coevaluación";
$nombreTipoRubrica['PU'] = "Rúbrica de punto único";


?>