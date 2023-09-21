<?php
error_reporting(E_ALL ^ E_NOTICE);

require('../config.php');
require_once('includes/funciones.php');
$areas = area();

$idR = intval($_POST["idP"]);
$_SESSION["idR"] = $idR;
$tipo = 2;

$uatu = validarIDU($idR);

//($idU == $uatu) ? '' : header('Location: '.$serverPath.'/nuevo_proyectos/gp/');

$tituloPagina = "IDEA: Editar Proyectos";
$descripcionPagina = "Cree, edite y visualice sus Proyectos de Clase o WebQuest.";
$imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
$estadoPro = "activo";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Proyectos</title>
    <?php include($serverPath . '/includes/head.php'); ?>
    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo $serverName ?>proyectos/gp/css/estilosPyWq.css">    
    <!-- CKEditor 4 -->
    <script src="<?php echo $serverName ?>lib/ckeditor/ckeditor.js"></script>

    <style type="text/css">
        .codex{display:block;background:silver;font-size:9px;line-height:12px;font-family:monospace;padding:15px}
        body{background:#393842;background:linear-gradient(0deg,#393842 0,#5a5a87 35%,#67dff7 100%);background-attachment:fixed!important}
        #pasoApaso{background:#282840!important;font-size: 16px;}
        .col-lg-1{max-width:4%!important}
        li img { width: 18px!important;}

    </style>

</head>

<body id="img-fondo">

    <?php include($serverPath . '/includes/navRubrik.php'); ?>

    <div class="container pt-6 mb-5 cuerpo-edit" id="cuerpo-general">
        <?php

        if (isset($idU) || $idU != "" || $idU != null || isset($idR) || $idR != "" || $idR != null) {
            $datos = consultarRubrica($idR);
            foreach ($datos as $row) {
                $titulo = $row['titulo'];
                $descripcion = $row['descripcion'];
                $idArea = $row['area'];
                $idAsignatura = $row['asignatura'];
                $edad = $row['edad'];                
                $evaluacion = $row['evaluacion'];                
                $newEdad = "'" . $edad . "'";                
            }
            
            $botonesAccion = "
            <ul class=\"pt-3\">
            <li class=\"mae8\" style=\"color: #FFCC00 !important;cursor:pointer;\" > Refinar Rúbrica </li>      
            </ul>
            ";

        ?>
            <div class="text-center mt-5 mb-5">         
                <a class="btn btn-primary" href="<?php echo $serverRubrik ?>listado.php"  style="background: #008000!important;">Volver a Mis Rúbricas</a>
                <a class="btn btn-primary" href="<?php echo $serverRubrik ?>rbk/<?php echo $idR ?>"  style="background: #008000!important;" target="_blank">Ver Rúbrica</a>
            </div>

            <div class="ml-1 mr-1 my-4 row sm-cuerpo">
                <div class="col ">

                    <!-- Formulario -->
                    <section>
                        <div class="oculto" id="bow" revali="<?php echo $idR ?>"></div>
                        <!-- Paso 1 General-->
                            <div class="partes" id="paso1">

                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12  col-md-12 col-sm-12 padin-laterales">
                                    <!-- Titulo del paso -->
                                    <h4 class="text-center pt-4">General</h4>
                                    <p class="text-center ml-5 mr-5">Puedes Editar tu nueva rúbrica</p>
                                    <input type="hidden" value="<?php print $observa; ?>" id="tipoMet" name="tipoMet" />
                                    <!-- Fin Titulo del paso -->


                                    <!-- Titulo del proyecto -->
                                    <div class="form-group">
                                        <label for="titulo" class="color-cuerpo">Titulo de la Rúbrica</label>
                                        <input type="text" name='titulo' class="form-control" id="titulo" value="<?php echo $titulo; ?>">
                                        <div id="ms-titulo" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    </div>
                                    <!-- Fin titulo del prooyecto -->


                                    <!-- Combox de area academica -->
                                    <div class="form-group">
                                        <label for="area" class="color-cuerpo">Área académica</label>
                                        <select class="form-control" name="cbx_materia" id="cbx_materia">
                                            <option value="0">Selecciona area académica</option>
                                            <?php while ($row = $areas->fetch_assoc()) {
                                                if ($row['idArea'] == $idArea) {
                                                    $vali1 = "selected";
                                                } else {
                                                    $vali1 = "";
                                                }
                                            ?>
                                                <option value="<?php echo $row['idArea']; ?>" <?php echo $vali1; ?>><?php echo $row['nombreArea']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div id="ms-area" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    </div>
                                    <!-- Fin combox area -->


                                    <!-- Combox de asignatura -->
                                    <div class="form-group">
                                        <label for="asignatura" class="color-cuerpo">Asignatura</label>
                                        <select name="cbx_asignatura" id="cbx_asignatura" class="form-control">
                                            <option value="0">Selecciona asignatura</option>
                                            <?php
                                            $d2 = asignatura($idArea);
                                            foreach ($d2 as $row) {
                                                if ($row['idAsignatura'] == $idAsignatura) {
                                                    $vali2 = "selected";
                                                } else {
                                                    $vali2 = "";
                                                }
                                            ?>
                                                <option value="<?php echo $row['idAsignatura']; ?>" <?php echo $vali2; ?>><?php echo $row['nombreAsignatura']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div id="ms-asignatura" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    </div>
                                    <!-- Fin combox asignatura -->


                                    <div id="edadPW">

                                        <div class="text-center">
                                            <p class="color-cuerpo">Edad sugerida para los estudiantes</p>
                                            <?php $v1 = strpos($newEdad, "1");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad1" autocomplete="off" value="1" <?php echo ($v1) ? 'checked' : ''; ?>> 5-6
                                                </label>
                                            </div>

                                            <?php $v2 = strpos($newEdad, "2");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad2" autocomplete="off" value="2" <?php echo ($v2) ? 'checked' : ''; ?>> 7-8
                                                </label>
                                            </div>

                                            <?php $v3 = strpos($newEdad, "3");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad3" autocomplete="off" value="3" <?php echo ($v3) ? 'checked' : ''; ?>> 9-10
                                                </label>
                                            </div>

                                            <?php $v4 = strpos($newEdad, "4");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad4" autocomplete="off" value="4" <?php echo ($v4) ? 'checked' : ''; ?>> 11-12
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-center my-2">

                                            <?php $v5 = strpos($newEdad, "5");  ?>

                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad5" autocomplete="off" value="5" <?php echo ($v5) ? 'checked' : ''; ?>> 13-14
                                                </label>
                                            </div>

                                            <?php $v6 = strpos($newEdad, "6");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad6" autocomplete="off" value="6" <?php echo ($v6) ? 'checked' : ''; ?>> 15-16
                                                </label>
                                            </div>

                                            <?php $v7 = strpos($newEdad, "7");  ?>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad7" autocomplete="off" value="7" <?php echo ($v7) ? 'checked' : ''; ?>> 17+
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ms-edad" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    

                                    <div class="text-right my-4">
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-1">
                                                <div style="width: 50px;">
                                                    <div class="row">
                                                        <p class="py-3 contador-numeros">1 de 2</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-next tsugi1 noLoad pasos"  tabindex="2">Editar Rúbrica<i class="pl-2 fa fa-arrow-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                        <div class="centradoH">
                                            <a class="btn btn-finish daruk noLoad">Guardar <i class="pl-2 fa fa-floppy-o" aria-hidden="true"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                       
                        <!-- Fin Paso 1 General-->



                        <!-- Paso 2 Descripción-->
                        <div class="partes" id="paso">

                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12  col-md-12 col-sm-12 padin-laterales">
                                    <!-- Descripcion del pryecto -->
                                    <h4 class="text-center pt-4">Descripción</h4>
                               
                                    <!-- Fin Descripcion del pryecto -->

                                    <!-- Mensaje de alerta -->
                                    <div id="ms-descripcion" class="etiqueta-alerta oculto"><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>*Este campo es sugerido</div>
                                    <!-- Fin Mensaje de alerta -->

                                    <!-- Area des la descripción -->
                                    <div class="form-group">
                                        <textarea name="descripcion" class="form-control" id="descripcion" rows="3"><?php echo $descripcion ?></textarea>
                                    </div>
                                    <!-- Fin Area des la descripción -->


                                    <!-- Botones de adelante y atras -->
                                    <div class="text-right my-4">
                                        <div class="row">
                                            <!-- Boton Atras paso 1 -->
                                            <div class="col">
                                                <div class="clearfix">
                                                    <a class="float-left btn btn-anterior pasos noLoad" tabindex="1"> <i class="pr-2 fa fa-arrow-left" aria-hidden="true"></i> Anterior</a>
                                                </div>
                                            </div>
                                            <!-- Fin Boton Atras paso 1 -->

                                            <!-- Paginado -->
                                            <div class="col-1">
                                                <div class="row">
                                                    <p class="py-3 contador-numeros">2 de 3</p>
                                                </div>
                                            </div>
                                            <!-- Fin Paginado -->

                                            <!-- Boton adelante paso 3 -->
                                            <div class="col">
                                                <a class="btn btn-next pasos tsugi2 noLoad" tabindex="3">Siguiente<i class="pl-2 fa fa-arrow-right" aria-hidden="true"></i></a>
                                            </div>
                                            <!-- Fin Boton adelante paso 3 -->
                                        </div>
                                        <div class="centradoH">
                                            <a class="btn btn-finish daruk noLoad">Guardar <i class="pl-2 fa fa-floppy-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <!-- Botones de adelante y atras -->
                                </div>
                            </div>
                      
                        <!-- Fin Paso 2 Descripción-->



                        <!-- Paso 3 Evaluación-->
                        <div class="partes" id="paso2">

                                   
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12  col-md-12 col-sm-12 padin-laterales">
                                    <!-- Evaluacion del pryecto -->
                                    <h4 class=" text-center pt-4">Evaluación</h4>
                                    <p style="font-size: 12px!important;">Aquí deben ser explícitos los criterios de evaluación de los estudiantes antes, durante y al finalizar el proyecto . Adicionalmente, se deben ingresar las anotaciones que se consideren pertinentes para que el proyecto se pueda llevar a cabo de la mejor forma posible.

                                    </p>
                                  
                                    <!-- Fin evaluación del pryecto -->

                                    <!-- Area des la evaluación -->
                           
                                    <div class="form-group">
                                    
                                    <h5 for="sesiones" class="section-titles">Evaluación</h5> 
                                        <textarea name="evaluacion" class="form-control" id="evaluacion" rows="3"><?php echo $evaluacion ?></textarea>
                                    </div>
                                   
                                    <!-- Fin Area des la evaluación -->



                                    <!-- Botones de adelante y atras -->
                                    <div class="text-right my-4">
                                        <div class="row">
                                    
                                            <!-- Boton Atras paso 8 -->
                                            <div class="col">
                                                <div class="clearfix">
                                                    <a class="float-left btn btn-anterior noLoad pasos" tabindex="1"> <i class="pr-1 fa fa-arrow-left" aria-hidden="true"></i> Editar General</a>
                                                </div>
                                            </div>
                                            <!-- Fin Boton Atras paso 8 -->

                                            <!-- Paginado -->
                                            <div class="col-1">
                                                <div class="row">
                                                    <p class="py-3 contador-numeros">2 de 2</p>
                                                </div>
                                            </div>
                                            <!-- Fin Paginado -->

                                      
                                            <!-- Fin Boton adelante paso 8 -->
                                             <div class="col">
                                          
                                            </div>
                                      
                                            </div>
                                        <div class="centradoH">
                                            <a class="btn btn-finish daruk noLoad">Guardar <i class="pl-2 fa fa-floppy-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <!-- Botones de adelante y atras -->
                                </div>
                

                    </section>
                    <!-- Fin Formulario -->
                </div>
            </div>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body" style="text-align: center;">
                  <h4>Estamos haciendo más interesante tu proyecto</h4>
                   <p><img src="<?php print $serverName; ?>img/loading2.gif" width="70%" /></p>
                   <p id="frase">La IA trabaja intensamente en el proyecto, se toma aproximadamente un 1 minuto</p>
                  </div>
                  
                </div>
              </div>
            </div>

        <?php } else { ?>

            <div class="jumbotron mt-5">
                <h1>!!Oops¡¡</h1>
                <p>Para poder publicar un proyecto es necesario estar registrado en el portal y cumplir con las especificaciones solicitadas en el portal Eduteka, para saber más sobre la publicación en el portal puede visitar <a href="<?php echo $serverName?>PoliticaUso.php">http://eduteka.icesi.edu.co/PoliticaUso.php</a></p>
                <a href="<?php echo $serverName ?>proyectos/" class="btn btn-info">Regresar</a>
            </div>
        <?php } ?>
    </div>

    <?php include($serverPath . '/includes/footer.php'); ?>

    <!-- Script propios  -->
    <script src="js/script.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/ckeditor.js"></script>
    <script src="js/editar.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('#recargaIA,#creaRubrica').click(function() {
            $('#exampleModal').modal("show");
        });
    });
    </script>


</body>
</html>