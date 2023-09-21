<?php

require_once('../config.php');

require_once('../includes/initialFunctions.php');
require_once('mailerSend.php');

(isset($idU))? header('Location: '.$serverName .''):'';

$correo = $_POST['email'];

$correo = replace_chars($correo);

$tipoSocial = validadorCorreoConRecordar($correo);

if($tipoSocial == 1){
    $datos = buscarUsuarioConRecordar($correo); 
    $nombre = $datos['nombre'];
    $clave = $datos['contrasenha']; 
    $asunto = 'Recuperacion de clave para tu cuenta '.$nombre;
    $msj =  utf8_decode('
    <html>
    <head>
    <meta charset="UTF-8">
        <style>
            * {
                font-family: Arial, Helvetica, sans-serif;
                color: #3f3f3f ; 
            }
            body{
                margin: 50px;
            }
            .cabeza {                    
                margin-bottom: 20px;
            }

            h1, h2{
                color: #0033A0 ;
            }

            a{
                color: #730DA3;
                font-weight: 600;
            }

            li{
                line-height: 1.5;
            }

            .mt-2{
                margin-top: 20px;
            }

            .mt-1{
                margin-top: 100px;
            }
        </style>
    </head>
    <body>

        <div class="cabeza">
            <h3>Estimad@ '.$nombre.',</h3>
        </div>
        <div>
        
            <p>Te escribimos para informar te que hemos recibido tu solicitud de recuperación de contraseña para tu cuenta de '.$nombre.'. Para proceder con la recuperación de tu contraseña, siga los siguientes pasos:</p>

            <p>Haga clic en el siguiente enlace: <a href="'.$serverName.'me/recordarValidacion.php?e='.$clave.'">'.$serverName.'me/recordarValidacion.php?e='.$clave.'</a></p>
            
            <p>Si tu no solicitaste esta recuperación de contraseña, por favor, ignore este correo electrónico y contacte a nuestro equipo de soporte inmediatamente.</p>
            
            <p>Si tienes alguna pregunta o necesitas asistencia adicional, por favor, no dude en ponerse en contacto con nosotros en cualquier momento.</p>

            <p>Atentamente,</p>

        </div>

        
        <div class="mt-1">
            <p>Atentamente,</p>
            <p>El equipo de Eduteka</p>                
        </div>

    </body>


    </html>');
    
}




$tituloPagina = "Recordar datos";
$descripcionPagina ="Recuerda datos de registro";





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/head.php');?>

    <link rel="stylesheet" href="<?php echo $serverName ?>css/login.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/registro.css">


</head>
<?php include("../includes/nav.php");?>

<body id="img-fondo">
    <div class="container">
        <div class="row cuadro-login">
            <div class="col-lg-12 cuador-registro">

                <?php 
                if($tipoSocial == 0){
                ?>
                <div class="jumbotron">
                    <h1>El correo que ingresaste no está registrado</h1>
                    <h6>Te invitamos a que realices el registro en nuestro portal haciendo clic en el botón
                        "Regístrate", o si lo prefieres, puedes volver a intentarlo haciendo clic en el botón
                        "Recuperar".</h6>
                    <a href="<?php $serverName?>recordar.php" class="btn btn-morado mt-5">Recuperar</a>
                </div>
                <?php } if($tipoSocial == 2){ ?>
                <div class="jumbotron">
                    <h1>El correo <?php echo $correo?> realizó el registro por red social</h1>
                    <h6>Dirígete a "Ingresar" haciendo clic en el botón correspondiente para que puedas acceder mediante
                        la red social correspondiente. </h6>
                    <a href="<?php $serverName?>ingresar.php" class="btn btn-morado mt-5">Ingresar</a>
                </div>

                <?php } if($tipoSocial == 1){ 
                    
                    enviarCorreo($nombre, $msj, $correo, $asunto);
                    
                    ?>
                <div class="jumbotron">
                    <h1>Se envio un mensaje al correo <?php echo $correo?></h1>
                    <h6>Encontrarás en tu correo un enlace que te permitirá realizar el cambio de contraseña. Si no lo
                        encuentras en la bandeja de entrada, revisa la carpeta de correos no deseados.</h6>
                </div>
                <?php }?>
            </div>
        </div>


    </div>
    <?php require_once('../includes/footerScript.php')?>
    <script src="js/registro.js"></script>
</body>

</html>