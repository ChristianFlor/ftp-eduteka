<?php
require('../config.php');
$tituloPagina = "Rubrik: Error";
$imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/head.php'); ?>
    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo $serverName ?>css/estilos.css">
    
</head>
<body  id="img-fondo">

    <div class="container pt-0" id="cuerpo-general">
        <div class="cuadro-gestor" style="background: #FFF;">
           <p align="center"> <img src="<?php echo $serverName ?>img/404.png" width="90%" />  </p>    
           <p align="center"><a href="https://edtk.co/rubrik/listado.php"><span class="btn btn-morado" >Intentemos de nuevo</span></a></p>         
        </div>
    </div>

</body>
</html>