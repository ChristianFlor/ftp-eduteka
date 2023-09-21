<?php
require('../config.php');
$tituloPagina = "eduteka Labs: Ingresar";
$descripcionPagina = "Registro o ingreso";

(isset($idU))? header('Location: '.$serverDir .''):'';

$origen = $_GET['o'];
$origen = intval($origen);

if ($origen==1){ $tituloSeccion="IDEA: Crea tu proyecto de Clase colaborativamente con la IA"; $_SESSION['ORIGEN']=$origen; }
elseif ($origen==2){ $tituloSeccion="RubriK: Crea rúbricas efectivas y personalizadas en minutos con ayuda la IA."; $_SESSION['ORIGEN']=$origen; }
elseif ($origen==3){ $tituloSeccion="Mítica: Diagnostico para la incorporación efectiva de las TIC en instituciones educativas."; $_SESSION['ORIGEN']=$origen; }
elseif ($origen==4){ $tituloSeccion=">Planeo: Planeo es una herramienta innovadora que simplifica la creación de cursos."; $_SESSION['ORIGEN']=$origen; }
else { $tituloSeccion="Eduteka Lab: Soluciones educativas usando IA."; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../includes/head.php');?>
    <link rel="stylesheet" href="<?php echo $serverName ?>css/login.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/registro.css">

</head>
<?php include("../includes/nav.php");?>

<body  id="img-fondo">

    <div class="container">
        <div class="row cuadro-login">
            <div class="col-lg-8 cuador-acciones">
                <div class="text-center pb-1">
                    <img src="<?php echo $serverName?>img/LogoLogin.png" alt="logo eduteka" width="370px"
                        class="img-fluid">
                </div>
                <hr class="color-morado pb-5">
                <div class="text-center">
                    <h3 class="color-morado pb-4"><?php print $tituloSeccion; ?></h3>
                    <a class="btn btn-google-rojo btn-block " href="https://edtk.co/auth/google"><i
                            class="fa fa-google" aria-hidden="true"></i> Entrar con Google</a>
                            <p class="pt-5" style="font-size: 11px!important;">
                                Al ingresar y validar el acceso con tu cuenta de Google, <br>aceptas las <a href="https://eduteka.icesi.edu.co/articulos/PoliticaUso">políticas de uso</a> y <a href="https://eduteka.icesi.edu.co/articulos/datosPersonales">manejo de datos personales</a> de la Universidad Icesi
                            </p>
                </div>
            </div>
            <div class="col-lg-4 cuadro-registro">
                <h4 class="pb-1 pt-5">Ingresa a eduteka Labs</h4>
                <p>Registrarse es gratuito. Nos encontramos en versión Beta y puedes encontrar algunas incosistencias.</p> 
                <p>Para ingresar, solo necesitas tener una cuenta en Google para validar tu sesión.</p>
            </div>
        </div>
    </div>

    <?php require_once('../includes/footerScript.php')?>
    <script src="js/funciones.js"></script>
</body>
</html>