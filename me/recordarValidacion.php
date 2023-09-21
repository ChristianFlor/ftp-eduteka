<?php 

require_once('../config.php');
require_once('../includes/initialFunctions.php');


$clave = $_GET['e'];
(empty($_GET) || isset($idU)) ? header('Location: '.$serverName.'index.php'): '';


$clave = replace_chars($clave);


$datos = buscarUsuarioConPwd($clave);




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

            <?php if($datos){?>


                <h3>Cambio de contraseña</h3>                
                <form action="recordarCambio.php" method="POST" class="needs-validation" novalidate id="fomularioCambio">

                    <div class="form-group">
                        <label for="pwd1">Escribe tu nueva contraseña y confírmala, la clave debe de tener como mínimo 8 caracteres, con un
                            carácter numérico y uno de los siguientes caracteres espaciales @#$%^&*+-</label>
                        <input type="password" class="form-control" id="pwd1" placeholder="Contraseña" name="pwd1">
                        <div id="ms-pwd1" class="msj-alerta oculto">Campo requerido</div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd2" placeholder="Confirmar contraseña"
                            name="pwd2">
                        <div id="ms-conPwd2" class="msj-alerta oculto">Campo requerido</div>
                        <div id="ms-conPwd2-vigia" class="msj-alerta oculto">Las contraseña no coinciden
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $datos['idU']?>" name="dato">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="cambio" class="btn btn-primary btn-block previene">Cambiar clave <i class="fa fa-rocket" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </form>

            <?php }else{?>    


                <div>
                    <h4>Oops</h4>
                    <p>Parecer que algo salió mal, te invitamos a que intentes realizar el proceso nuevamente</p>
                    <a href="<?php echo $serverName ?>me/recordar.php" class="btn btn-morado">Realizar nuevamente el proceso</a>

                </div>


                <?php }?>
            </div>
        </div>


    </div>
    <?php require_once('../includes/footerScript.php')?>
    <script src="js/cambioPwd.js"></script>

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