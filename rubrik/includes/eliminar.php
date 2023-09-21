<?php
require('../../config.php');
require_once('funciones.php');

session_start();
$idU = $_SESSION["idU"];
$idEst = intval($_POST['est']);
$idR = intval($_POST['pro']);


if (isset($idU) || $idU != "" || $idU != null) {

    /* Se elimina el registro de proyusuario */
    echo eliminarRubusuario($idEst);

    /* Eliminar registro proyectos */
    eliminarRubrica($idR);

    /* Eliminar registro bancoproyectos */
    //eliminarBancoProyectos($idP, $tipo);
logCrear($idU,$idR,11,'');
}
?>