<?php

require_once('../config.php');

require_once('../includes/initialFunctions.php');
require_once('mailerSend.php');

(isset($idU))? header('Location: '.$serverName .''):'';

$clave = $_POST['pwd1'];



$idU = intval($_POST['dato']);

$clave = replace_chars($clave);

$clave = md5($clave);





$cambioPwd = cambioClave($idU, $clave);






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
                <?php if($cambioPwd){
                    $datos = buscarUsuarioConPwd($clave);                    
                    $_SESSION['NOMBREU'] = $datos['nombre'];
                    $_SESSION["idU"] = $datos['idU'];
                    $nombreUsuario = $_SESSION['NOMBREU'];
                    $idU = $_SESSION["idU"];
                    ?>
                <h3>Felicidades <?php echo $_SESSION['NOMBREU']?> se realizó el cambio de contraseña</h3>
                <h5>Te invitamos a explorar las secciones de Artículos, Módulos temáticos, Proyectos y Herramientas TIC
                    en nuestra página web. Allí encontrarás información relevante y actualizada en tu área de interés,
                    proyectos interesantes para poner en práctica tus conocimientos y herramientas tecnológicas que
                    mejorarán tu desempeño en el ámbito profesional o académico. Te animamos a que aproveches esta
                    oportunidad para mejorar tus habilidades y conocimientos. Visita nuestras secciones y descubre todo
                    lo que tenemos para ofrecerte</h5>

                <div class="pt-5 mb-5">
                    <div class="row  pt-2">

                        <div class="col-lg-6 col-sm-12 pt-2">
                            <a href="<?php echo $DirArticulosMascara?>" class="btn btn-morado p-3 min-h sizeC">
                                <div class="card-body">
                                    <h4 class="text-center color-blanco">Artículos</h4>
                                    <p class="card-text color-blanco">Esta sección del portal web presenta artículos
                                        académicos sobre la
                                        innovación y las TIC en la
                                        educación. Los expertos analizan cómo las tecnologías están transformando la
                                        forma de
                                        enseñar y aprender.
                                        Desde plataformas en línea hasta realidad virtual, se cubren temas variados
                                        sobre la
                                        innovación educativa.
                                        Los artículos también ofrecen una perspectiva crítica sobre los desafíos y
                                        oportunidades
                                        del uso de la
                                        tecnología en la educación, con sugerencias prácticas para educadores y líderes
                                        escolares.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-sm-12 pt-2">
                            <a href="<?php echo $DirModulos?>" class="btn btn-morado p-3 min-h sizeC">
                                <div class="card-body">
                                    <h4 class="text-center color-blanco">Módulos temáticos</h4>
                                    <p class="card-text color-blanco">Bajo el nombre de <b>Módulos Temáticos</b>,
                                        Eduteka ofrece a sus
                                        usuarios <b>la
                                            agrupación organizada de la
                                            totalidad de los contenidos</b> que ha publicado sobre temas específicos con
                                        el
                                        objeto principal de
                                        <b>facilitar su consulta y utilización</b>. Desde su concepción, se diseñaron
                                        con la
                                        flexibilidad suficiente
                                        para poder agregarles fácilmente y a medida que se vayan publicando, nuevos
                                        recursos que
                                        los enriquezcan y
                                        actualicen.
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="row pt-2">

                        <div class="col-lg-6 col-sm-12 pt-2">
                            <a href="<?php echo $DirProyecto?>" class="btn btn-morado p-3 min-h sizeC">
                                <div class="card-body">
                                    <h4 class="text-center color-blanco">Proyectos</h4>
                                    <p class="card-text color-blanco"> Esta sección del portal web es una comunidad de
                                        intercambio de
                                        proyectos y webquest creados por otros
                                        educadores. Los profesores pueden explorar una amplia variedad de proyectos
                                        motivadores
                                        y actividades en
                                        línea, así como compartir sus propios proyectos y webquest con la comunidad. Es
                                        una
                                        fuente inagotable de
                                        inspiración y apoyo para mejorar la enseñanza con proyectos y webquest enfocados
                                        en el
                                        aprendizaje
                                        activo y colaborativo.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-sm-12 pt-2 ">
                            <a href="<?php echo $DirHerramientas?>" class="btn btn-morado p-3 min-h sizeC">
                                <div class="card-body">
                                    <h4 class="text-center color-blanco">Herramientas TIC</h4>
                                    <p class="card-text color-blanco">En Eduteka, ofrecemos a nuestros usuarios una gran
                                        variedad de
                                        <b>Herramientas TIC</b> que les permiten mejorar su proceso de
                                        enseñanza-aprendizaje.
                                        Con una <b>organización clara y fácil de usar</b>. Estas herramientas son
                                        esenciales
                                        para crear un <b>ambiente educativo moderno y estimulante, que fomente el
                                            pensamiento
                                            crítico y la creatividad</b>. ¡Explora nuestras opciones y descubre cómo
                                        pueden
                                        mejorar tu experiencia educativa de manera efectiva!
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>


                <?php }else{?>
                <div>
                    <h4>Oops</h4>
                    <p>Parecer que algo salió mal, te invitamos a que intentes realizar el proceso nuevamente</p>
                    <a href="<?php echo $serverName ?>me/recordar.php" class="btn btn-morado">Realizar nuevamente el
                        proceso</a>

                </div>
                <?php }?>
            </div>
        </div>


    </div>
    <?php require_once('../includes/footerScript.php')?>

</body>

</html>