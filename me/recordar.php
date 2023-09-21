<?php
require_once('../config.php');

require_once('../includes/initialFunctions.php');
require_once('mailerSend.php');

(isset($idU))? header('Location: '.$serverName .''):'';



// Hora actual
$hora_actual = date("H:i:s");

// Sumar 30 minutos a la hora actual
$nueva_hora = date("H:i:s", strtotime($hora_actual . " +40 minutes"));

// Mostrar la nueva hora
//echo "La nueva hora es: " . $nueva_hora;



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
                <h3>Cambio de contraseña</h3>
                <p>Para cambiar tu clave de acceso, introduce en la casilla que aparece a continuación el correo
                    electrónico que utilizaste para registrarte. A continuación, recibirás un enlace seguro y exclusivo
                    para cambiar tu clave. Asegúrate de escribir correctamente tu correo electrónico para que puedas
                    recibir el enlace sin problemas. Este enlace es único para ti y te permitirá cambiar tu clave de
                    forma rápida y segura. Si tienes algún problema con el proceso, no dudes en ponerte en contacto con
                    nosotros. ¡Gracias por confiar en Eduteka!</p>
                <form action="recordarEnvio.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <!-- <label for="email">correo:</label> -->
                        <input type="email" class="form-control" id="email" placeholder="Escribe tu correo aquí"
                            name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-morado">Enviar correo de recuperación <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>


    </div>
    <?php require_once('../includes/footerScript.php')?>

    <script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

</body>

</html>