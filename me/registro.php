<?php
require('../config.php');
require_once('../includes/initialFunctions.php');


$tituloPagina = "Registro";
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
            <div class="col-lg-12 cuador-registro">
                <div class="text-center pb-1">
                    <img src="<?php echo $serverName?>img/LogoLogin.png" alt="logo eduteka" width="370px"
                        class="img-fluid">
                </div>
                <hr class="color-morado pb-2">
                <section>

                    <div class="text-center">
                        <h3 class="color-morado pb-3">Registro</h3>
                    </div>

                    <!-- Paso a paso -->

                    <div class="paso_a_paso">

                        <div class="bloque b1">
                            <div class="pasos">
                                <div id="cuadro1" class="square activo-paso">
                                    <span>1</span>
                                </div>
                                <div id="linea1" class="line activo-linea"></div>
                            </div>
                            <div class="text-center mr-20">
                                <p id="txt1" class="subtexto">Información</p>
                                <p id="txt11" class="subtexto">de registro</p>
                            </div>

                        </div>

                        <div class="bloque b2">
                            <div class="pasos">
                                <div id="linea2" class="line"></div>
                                <div id="cuadro2" class="square">
                                    <span>2</span>
                                </div>
                                <div id="linea21" class="line"></div>
                            </div>
                            <div class="text-center">
                                <p id="txt2" class="subtexto">Información</p>
                                <p id="txt21" class="subtexto">personal</p>
                            </div>

                        </div>

                        <div class="bloque b3">
                            <div class="pasos">
                                <div id="linea3" class="line"></div>
                                <div id="cuadro3" class="square">
                                    <span>3</span>
                                </div>
                                <div id="linea31" class="line"></div>
                            </div>
                            <div class="text-center">
                                <p id="txt3" class="subtexto">Información</p>
                                <p id="txt31" class="subtexto">educativa</p>
                            </div>

                        </div>

                        <div class="bloque b4">
                            <div class="pasos">
                                <div id="linea4" class="line"></div>
                                <div id="cuadro4" class="square">
                                    <span>4</span>
                                </div>
                            </div>
                            <div class="text-center mr-13">
                                <p id="txt4" class="subtexto">Confirmar</p>
                                <p id="txt41" class="subtexto">información</p>
                            </div>

                        </div>



                    </div>
                    <!-- Fin Paso a paso -->

                    <!-- Formulario -->
                    <div class="ml-5 mr-5 mb-5 margenes-small">
                        <form action="guardarRegistro.php" id="datosRegistro" method="POST">

                            <div id="step1" class="scale-in-hor-left">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="correo"
                                        placeholder="Dirección de correo electrónico" name="correo">
                                    <div id="ms-correo" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="conCorreo"
                                        placeholder="Confirmar correo electrónico" name="conCorreo">
                                    <div id="ms-conCorreo" class="msj-alerta oculto">Campo requerido</div>
                                    <div id="ms-conCorreo-vigia" class="msj-alerta oculto">Los correos no coinciden
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pwd" class="peque">Contraseña debe de tener como mínimo 8 caracteres, con un carácter numérico y uno de los siguientes caracteres espaciales @#$%^&*+-</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Contraseña"
                                        name="pwd">
                                    <div id="ms-pwd" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="conPwd"
                                        placeholder="Confirmar contraseña" name="conPwd">
                                    <div id="ms-conPwd" class="msj-alerta oculto">Campo requerido</div>
                                    <div id="ms-conPwd-vigia" class="msj-alerta oculto">Las contraseña no coinciden
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <a id="p1" class="btn btn-primary btn-block previene">Siguiente</a>
                                    </div>
                                </div>

                            </div>




                            <div id="step2" class="oculto">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre y Apellidos"
                                        name="nombre">
                                    <div id="ms-nombre" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="genero" name="genero" class="custom-select">
                                        <option value="0">Género</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                        <option value="3">Otro</option>
                                        <option value="4">No es necesario decirlo</option>
                                    </select>
                                    <div id="ms-genero" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="pais" name="pais">
                                        <option value="0">País</option>
                                        <?php $pais = pais();
                                            foreach($pais as $row) {
                                            ?>
                                        <option value="<?php echo $row['idPais'] ?>"><?php echo $row['pais'] ?></option>

                                        <?php } ?>
                                    </select>
                                    <div id="ms-pais" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ciudad" placeholder="Ciudad"
                                        name="ciudad">
                                    <div id="ms-ciudad" class="msj-alerta oculto">Campo requerido</div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="colegio"
                                        placeholder="Colegio/Institución" name="colegio">
                                    <div id="ms-colegio" class="msj-alerta oculto">Campo requerido</div>
                                </div>

                                <div class="custom-control custom-radio mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="radio" class="custom-control-input" id="tipoCol1" name="tipoCol" value="1" required>
                                            <label class="custom-control-label" for="tipoCol1">Privado</label>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="radio" class="custom-control-input" id="tipoCol2" name="tipoCol" value="2" required>
                                            <label class="custom-control-label" for="tipoCol2">Público</label>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="b1" class="btn btn-secondary btn-block previene">Anterior</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="p2" class="btn btn-primary btn-block previene">Siguiente</a>
                                    </div>
                                </div>

                            </div>



                            <div id="step3" class="oculto">
                                <div class="form-group">
                                    <select class="form-control" id="cargo" name="cargo">                                        
                                        <?php $cargo = cargo();
                                            for ($i = 0; $i < count($cargo); $i++) {
                                            ?>
                                        <option value="<?php echo $i ?>"><?php echo $cargo[$i] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <p class="text-center pt-3"><b>Grados en los que enseña</b></p>
                                <div class="form-group">

                                    <?php $grado = grado();
                                            for ($i = 0; $i < count($grado); $i++) { ?>
                                    <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary redondeo">
                                            <input class="selectHerramienta" type="checkbox" name="grados[]"
                                                autocomplete="off" value="<?php echo $grado[$i][1]?>">
                                            <?php echo $grado[$i][0]?>
                                        </label>
                                    </div>
                                    <?php }?>

                                </div>


                                <p class="text-center pt-3"><b>Áreas en las que dicta clase</b></p>
                                <div class="form-group">

                                    <?php $materias = materias();
                                            for ($i = 0; $i < count($materias); $i++) { ?>
                                    <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary redondeo">
                                            <input class="selectHerramienta" type="checkbox" name="materias[]"
                                                autocomplete="off" value="<?php echo $materias[$i][1]?>">
                                            <?php echo $materias[$i][0]?>
                                        </label>
                                    </div>
                                    <?php }?>

                                </div>



                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="b2" class="btn btn-secondary btn-block previene">Anterior</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="p3" class="btn btn-primary btn-block previene">Siguiente</a>
                                    </div>
                                </div>

                            </div>



                            <div id="step4" class="oculto">

                                <h6 class="text-center pt-3">Confirma la información:</h6>


                                <div class="pl-5 pr-5 pt-5">
                                    <p class="row"><b id="reNombre"></b></p>
                                    <div class="row">
                                        <div class="col-lg-5 col-sm-12">
                                            <span class="row"><i class="fa fa-envelope pr-2 pt-1"
                                                    aria-hidden="true"></i></i>
                                                <p id="reCorreo"></p>
                                            </span>
                                            <span class="row"><i class="fa fa-map-marker pr-2 pt-1"
                                                    aria-hidden="true"></i>
                                                <p id="reUbicacion"></p>
                                            </span>
                                            <span class="row"><i class="fa fa-university pr-2 pt-1"
                                                    aria-hidden="true"></i>
                                                <p id="reIntitucion"></p>
                                            </span>

                                        </div>

                                        <div class="col-lg-7 col-sm-12">
                                            <span class="row"><b>Materias que dicta:</b> <p id="reMaterias"></p></span>
                                            <span class="row"><b>Grados que enseña:</b> <p id="reGrados"></p></span>
                                            

                                        </div>
                                    </div>


                                    <div class="text-center pt-5 pb-5">
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input id="acepto" class="form-check-input" type="checkbox"> Autorizo el tratamiento de mis datos personales de acuerdo a la política de tratamiento de Eduteka <a href="https://eduteka.icesi.edu.co/articulos/datosPersonales" target="_blank">https://eduteka.icesi.edu.co/articulos/datosPersonales</a> * Al registrarme, confirmo que acepto los terminos de uso del sitio <a href="https://eduteka.icesi.edu.co/articulos/PoliticaUso" target="_blank">https://eduteka.icesi.edu.co/articulos/PoliticaUso</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="b3" class="btn btn-secondary btn-block previene">Anterior</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <a id="finalizar" class="btn btn-primary btn-block previene">Finalizar registro</a>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                    <!-- Formulario -->





                </section>

            </div>
        </div>

        
    </div>





    <?php require_once('../includes/footerScript.php')?>
    <script src="js/registro.js"></script>
</body>

</html>