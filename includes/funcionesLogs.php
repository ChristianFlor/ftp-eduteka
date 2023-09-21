<?php
//AND idU NOT IN (1, 3, 4)
function datosRegistros()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT fechaLog FROM `logs` WHERE `tipoLog` = 1 ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosCreados()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `tipoLog` = 4 ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosIdeaError()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = '0'   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosEdicion()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, fechaLog FROM `logs` WHERE `tipoLog` = 5 ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosActividades()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 7 ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosEvaluacion()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 8   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosTokens()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND tipoLog < 9 ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosMetodologias()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_proyectos");
    $query = "SELECT observa FROM `proyectos` ORDER BY `fechaCreacion` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosRubricasCreadas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 9   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosRubricasError()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 13   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosRubricasEditadas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 10   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosTipoRubrica()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_rubrik");
    $query = "SELECT tipo FROM `rubusuario` ORDER BY `fechaP` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosTokensRubrik()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND (tipoLog > 8 AND tipoLog < 14) ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function datosRegistrosRubrica()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT  fechaLog FROM `logs` WHERE (tipoLog > 8 AND tipoLog < 14) ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosMiticaCreadas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = $sql = "SELECT DISTINCT idU, fecha FROM mitica ORDER BY `fecha` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosVisitas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT enlace, ip, dateV FROM `visitas` ORDER BY `dateV` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function datosPlaneoTemas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 15   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosPlaneoObjetivos()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 16   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosPlaneoCreadas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 17   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosPlaneoGeneral()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 18   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosPlaneoError()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 20   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosPlaneoEditadas()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT idP, token, fechaLog FROM `logs` WHERE `tipoLog` = 21   ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

function datosTokensPlaneo()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND (tipoLog > 14 AND tipoLog < 22) ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function tokensIDEAmes()
{
    require('proyectos/includes/conexion.php'); 
    $hoy = date('Y-m-d H:i:s');
    $anio = date('Y');
    $mes = date('m');
    $inicioMes = $anio . '-' . $mes . '-01 00:00:00';
    
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND tipoLog < 9 AND fechaLog BETWEEN '$inicioMes' AND '$hoy' ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    
    mysqli_close($conexion);
    return $result;
}

function tokensRUBRIKmes()
{
    require('proyectos/includes/conexion.php'); 
    $hoy = date('Y-m-d H:i:s');
    $anio = date('Y');
    $mes = date('m');
    $inicioMes = $anio . '-' . $mes . '-01 00:00:00';
    
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND (tipoLog > 8 AND tipoLog < 14) AND fechaLog  BETWEEN '$inicioMes' AND '$hoy' ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    
    mysqli_close($conexion);
    return $result;
}

function tokensPLANEOmes()
{
    require('proyectos/includes/conexion.php'); 
    $hoy = date('Y-m-d H:i:s');
    $anio = date('Y');
    $mes = date('m');
    $inicioMes = $anio . '-' . $mes . '-01 00:00:00';
    
    $conexion->select_db("edtk_general");
    $query = "SELECT token, fechaLog FROM `logs` WHERE `token` > 0 AND (tipoLog > 14 AND tipoLog < 22) AND fechaLog  BETWEEN '$inicioMes' AND '$hoy' ORDER BY `fechaLog` ASC";
    $result = mysqli_query($conexion, $query);
    
    mysqli_close($conexion);
    return $result;
}

function datosUsuarios()
{
    require('proyectos/includes/conexion.php'); 
    $conexion->select_db("edtk_registro");
    $query = "SELECT idU, fecha FROM `usuarios` ORDER BY `fecha` ASC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}

?>