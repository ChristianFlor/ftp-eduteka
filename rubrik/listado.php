<?php
require('../config.php');
require_once('includes/funciones.php');

$estadoMis = "activo";
$all = buscarRubricaPorUsuario($idU);

$tituloPagina = "Rubrik: Mis Rúbricas";
$descripcionPagina = "Cree, edite y visualice sus Rúbricas";
$urlPagina = "https://".$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ahost.'includes/head.php'); ?>
</head>

<body id="img-fondo">
    <?php if (!empty($idU)) { ?>
    <?php include($ahost.'includes/navRubrik.php'); ?>


    <div class="container pt-5" id="cuerpo-general">

        <div class="cuadro-gestor">

            <div class="text-center pt-5 pb-1">
              
            <?php $numUserProy = buscarNumRubricasPorUsuario($idU);    ?>
                
                <div class="col-12 pt-0">
                    <?php if(($numUserProy<=20)|($idU==4)){ ?>
                    <form action="validador.php" method="post">
                        <input type="hidden" name="tipo" value="2">
                        <input type="submit" class="btn btn-morado" style="background: #008000;" value="Crea tu Rúbrica">
                    </form>
                    <?php }else { ?>
                        <div class="alert alert-warning" role="alert">
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b>Se ha alcanzado el m&aacute;ximo n&uacute;mero de r&uacute;bricas por persona</b>
                        </div>                                      
                    <?php } ?>
                </div>
            </div>
            

            <?php
                $contador = 0;
                foreach ($all as $fila) {

                    $idEst = $fila['idEst'];                   
                    $proyecto = buscarRubrica($fila['idR']);
                    $tipo = $fila['tipo'];  

                    while ($row = mysqli_fetch_assoc($proyecto)) {
                    
                        $area = $row['area'];
                        $titulo = $row["titulo"];   
                        $descripcion = limitarPalabras($row["descripcion"]);                     
                        $etiqueta = "Rúbrica";
                        $icono = "fa-file-code-o";
                        $etiqueta = nombreAreaId($area);
                    }
           
                    $fecha = $fila['fechaP'];                   
                    $tipo = $fila['tipo'];                   
           
                ?>
            <div class="ml-1 mr-1 my-5 row text-ceneter color-cuerpo">
                <div class="col-sm-12 col-md-12 central">
                    <div class="card" id="proyectosCuerpo">
                        <p class="etiqueta Proyecto"><i class="fa <?php echo $icono?>"
                                aria-hidden="true"></i> <?php echo $etiqueta[nombre]; ?></p>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 600;"> <?php echo $titulo; ?></h5>
                             <p class="card-text" style="font-size: 14px!important;">  <?php echo "<i>".$nombreTipoRubrica[$tipo].":</i> "; ?>
                             <?php echo strip_tags($descripcion); ?>
                            <p class="card-text" style="text-align: right;"><b>Creado:</b> <?php echo $fecha; ?></p>

                            <div class="">
                                <a href="<?php echo $serverName?>rbk/<?php echo $fila['idR'] ?>" target="_blank"
                                    class="btn btn-morado-lineas" id="ver<?php echo $contador ?>" campo="valor"
                                    revali="<?php echo $fila['idR'] ?>" urbosa="<?php echo $tipo ?>"><span><i
                                            class="fa fa-eye" aria-hidden="true"></i></span>
                                    <p class="parrafoCard">Ver</p>
                                </a>
                                <a href="" revali="<?php echo $fila['idR'] ?>" urbosa="<?php echo $tipo ?>"
                                    class="btn btn-morado-lineas zelda noLoad"><span>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </span><p class="parrafoCard">Editar</p>
                                </a>
                                <a href="" revali="<?php echo $fila['idR'] ?>" mipha="<?php echo $idEst ?>"
                                    urbosa="<?php echo $tipo ?>" class="btn btn-morado-lineas ganon noLoad"><span><i
                                            class="fa fa-trash" aria-hidden="true"></i></span>
                                    <p class="parrafoCard">Eliminar</p>
                                </a>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
                    $contador++;
                } ?>
            <p id="total" valor="<?php echo $contador ?>"></p>

           
        </div>
    </div>


    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <?php include($ahost.'includes/footer.php'); ?>

    <?php } else {
        header("location: https://edtk.co/me/ingresar.php");
        die();
    } ?>
    <!-- Script propios  -->
    <script src="js/script.js"></script>
    <script src="js/funciones.js"></script>

</body>
</html>