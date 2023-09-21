<?php
require_once 'vendor/autoload.php';
require_once 'datosGoogle.php';
require('../config.php');

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


$tituloPagina = "Acceso BETA";
$descripcionPagina = "Registro o ingreso";

(isset($idU))? header('Location: '.$serverName .''):'';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../includes/head.php');?>
    <link rel="stylesheet" href="<?php echo $serverName ?>css/login.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/registro.css">

</head>
<?php include("../includes/nav.php");?>

<body id="img-fondo">

    <div class="container">
        <div class="row cuadro-login">
            <div class="col-lg-8 cuador-acciones">
                <div class="text-center pb-1">
                    <img src="<?php echo $serverName?>img/LogoLogin.png" alt="logo eduteka" width="370px"
                        class="img-fluid">
                </div>
                <hr class="color-morado pb-5">

                <div class="text-center">
                    <h3 class="color-morado pb-4">Entrada a usuario Beta Tester de IDEA</h3>
                 
                    <a class="btn btn-google-rojo btn-block" href="<?php echo $client->createAuthUrl()?>"><i
                            class="fa fa-google" aria-hidden="true"></i> Entrar con
                        Google</a>
                </div>
            </div>
            <div class="col-lg-4 cuadro-registro">
                <h4 class="pb-1 pt-5">Ingresa a IDEA</h4>
                <p>Este acceso solo funciona para esta primera vez, las siguientes veces las puedes hacer con el acceso normal</p> 
                
                <p>Para ingresar, solo necesitas tener una cuenta en Google para validar tu sesión.</p>
              
            </div>
        </div>
    </div>

    <?php require_once('../includes/footerScript.php')?>
    <script src="js/funciones.js"></script>
</body>

</html>