<?php
require_once('../config.php');

require_once('../includes/initialFunctions.php');
require_once('mailerSend.php');


(empty($_POST)) ? header('Location: '.$serverName.'me/ingresar.php'): '';


$correo = $_POST['correo'];
$conRow = validadorCorreo($correo);

$tituloPagina = "Registro finalizado";
$descripcionPagina ="Registro finalizado";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/head.php');?>

    <link rel="stylesheet" href="<?php echo $serverName ?>css/registro.css">

    
</head>
<?php include("../includes/nav.php");?>

<body id="img-fondo">
    <div class="container">

        <?php
if($conRow > 0){ 
    
    $idU = validadorCorreoConId($correo);
    $_SESSION['NOMBREU'] = $nombre;   
    $_SESSION["idU"] = $idU;

    $nombreUsuario = $_SESSION['NOMBREU'];
	$idU = $_SESSION["idU"];

    ?>


        <div class="pt-100">
            <div class="jumbotron">
                <h1>Ya te encuentras registrado</h1>
                <h5>Te invitamos a explorar las secciones de Artículos, Módulos temáticos, Proyectos y Herramientas TIC en nuestra página web. Allí encontrarás información relevante y actualizada en tu área de interés, proyectos interesantes para poner en práctica tus conocimientos y herramientas tecnológicas que mejorarán tu desempeño en el ámbito profesional o académico. Te animamos a que aproveches esta oportunidad para mejorar tus habilidades y conocimientos. Visita nuestras secciones y descubre todo lo que tenemos para ofrecerte.</h5>
                <!-- <a href="<?php echo $serverName?>me/registro.php" class="btn btn-primary">Registrar me</a> -->
            </div>
            
        </div>

        <div class="pt-5 mb-5">
            <div class="row  pt-2">

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirArticulosMascara?>"  class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Artículos</h4>
                            <p class="card-text color-blanco">Esta sección del portal web presenta artículos académicos sobre la
                                innovación y las TIC en la
                                educación. Los expertos analizan cómo las tecnologías están transformando la forma de
                                enseñar y aprender.
                                Desde plataformas en línea hasta realidad virtual, se cubren temas variados sobre la
                                innovación educativa.
                                Los artículos también ofrecen una perspectiva crítica sobre los desafíos y oportunidades
                                del uso de la
                                tecnología en la educación, con sugerencias prácticas para educadores y líderes
                                escolares.</p>
                        </div>                    
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirModulos?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Módulos temáticos</h4>
                            <p class="card-text color-blanco">Bajo el nombre de <b>Módulos Temáticos</b>, Eduteka ofrece a sus
                                usuarios <b>la
                                    agrupación organizada de la
                                    totalidad de los contenidos</b> que ha publicado sobre temas específicos con el
                                objeto principal de
                                <b>facilitar su consulta y utilización</b>. Desde su concepción, se diseñaron con la
                                flexibilidad suficiente
                                para poder agregarles fácilmente y a medida que se vayan publicando, nuevos recursos que
                                los enriquezcan y
                                actualicen.
                            </p>
                        </div>                    
                    </a>
                </div>

            </div>
            
            <div class="row pt-2">

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirProyecto?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Proyectos</h4>
                            <p class="card-text color-blanco"> Esta sección del portal web es una comunidad de intercambio de
                                proyectos y webquest creados por otros
                                educadores. Los profesores pueden explorar una amplia variedad de proyectos motivadores
                                y actividades en
                                línea, así como compartir sus propios proyectos y webquest con la comunidad. Es una
                                fuente inagotable de
                                inspiración y apoyo para mejorar la enseñanza con proyectos y webquest enfocados en el
                                aprendizaje
                                activo y colaborativo.</p>
                        </div>                    
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirHerramientas?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Herramientas TIC</h4>
                            <p class="card-text color-blanco">En Eduteka, ofrecemos a nuestros usuarios una gran variedad de
                                <b>Herramientas TIC</b> que les permiten mejorar su proceso de enseñanza-aprendizaje.
                                Con una <b>organización clara y fácil de usar</b>. Estas herramientas son esenciales
                                para crear un <b>ambiente educativo moderno y estimulante, que fomente el pensamiento
                                    crítico y la creatividad</b>. ¡Explora nuestras opciones y descubre cómo pueden
                                mejorar tu experiencia educativa de manera efectiva!
                            </p>
                        </div>                    
                    </a>
                </div>

            </div>

        </div>


        
        <?php
}else{


    $pwd = md5($_POST['pwd']);
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $colegio = $_POST['colegio'];
    $tipoCol = $_POST['tipoCol'];
    $cargos = $_POST['cargo'];

    $grados = $_POST['grados'];
    $materias = $_POST['materias'];




    $sumaGrados = "";
    $sumaMaterias = "";

    for($i=0;$i<count($grados);$i++){
        $sumaGrados .= $grados[$i].",";    
    }

    for($i=0;$i<count($materias);$i++){
        $sumaMaterias .= $materias[$i].",";    
    }

    $sumaGrados = substr($sumaGrados, 0, strlen($sumaGrados) - 1);
    $sumaMaterias = substr($sumaMaterias, 0, strlen($sumaMaterias) - 1);



    $tipoSocial = "";
    $uid = "";
    $grado = "";
    $linkSocial = "";
    $picSocial = "";
    $picture = "";



    $idU = registroUsuario($nombre, $correo, $pwd, $tipoSocial, $uid, $grado, $linkSocial, $picSocial, $picture, 0, $fecha);

    if(isset($idU)){
        $profecion = registroUsuarioProfesion($idU, $colegio, $tipoCol, $cargos, $sumaGrados, $sumaMaterias);
        $local = registroUsuarioLocal($idU, $pais, $ciudad);
        $_SESSION['NOMBREU'] = $nombre;   
        $_SESSION["idU"] = $idU;

        $asunto = 'Mensaje de bienvenida Eduteka';
        
        $msj = utf8_decode('

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
                    text-align: center;
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
                <p>En nombre del equipo de Eduteka, queremos expresar nuestra más sincera gratitud por haberse registrado en nuestro portal web.</p>
                <p>Nuestro compromiso es ofrecerles contenidos educativos de calidad y herramientas pedagógicas innovadoras para mejorar el aprendizaje de los estudiantes. Sabemos que la educación es fundamental para el desarrollo de nuestra sociedad y por eso trabajamos arduamente para brindarles recursos que les permitan enriquecer su labor docente.</p>
                <p>Gracias por confiar en nosotros y por ser parte de nuestra comunidad de aprendizaje. Nos sentimos honrados de contar con su participación y esperamos que encuentren en nuestra plataforma los recursos que necesitan para llevar a cabo una educación más efectiva y significativa.</p>
                <p>De nuevo, muchas gracias por registrarse en Eduteka.</p>

            </div>

            
            <div class="mt-1">
                <p>Atentamente,</p>
                <p>El equipo de Eduteka</p>                
            </div>

        </body>


        </html>');

        if(enviarCorreo($nombre, $msj, $correo, $asunto) == 1){
            unset($_POST);
        }
        
    ?>

        <div class="pt-100">
            <div class="jumbotron">
                <h1>Gracias por realizar el registro</h1>
                <h5>Te invitamos a explorar las secciones de Artículos, Módulos temáticos, Proyectos y Herramientas TIC en nuestra página web. Allí encontrarás información relevante y actualizada en tu área de interés, proyectos interesantes para poner en práctica tus conocimientos y herramientas tecnológicas que mejorarán tu desempeño en el ámbito profesional o académico. Te animamos a que aproveches esta oportunidad para mejorar tus habilidades y conocimientos. Visita nuestras secciones y descubre todo lo que tenemos para ofrecerte.</h5>
            </div>
        </div>

        <div class="pt-5 mb-5">
            <div class="row  pt-2">

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirArticulosMascara?>"  class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Artículos</h4>
                            <p class="card-text color-blanco">Esta sección del portal web presenta artículos académicos sobre la
                                innovación y las TIC en la
                                educación. Los expertos analizan cómo las tecnologías están transformando la forma de
                                enseñar y aprender.
                                Desde plataformas en línea hasta realidad virtual, se cubren temas variados sobre la
                                innovación educativa.
                                Los artículos también ofrecen una perspectiva crítica sobre los desafíos y oportunidades
                                del uso de la
                                tecnología en la educación, con sugerencias prácticas para educadores y líderes
                                escolares.</p>
                        </div>                    
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirModulos?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Módulos temáticos</h4>
                            <p class="card-text color-blanco">Bajo el nombre de <b>Módulos Temáticos</b>, Eduteka ofrece a sus
                                usuarios <b>la
                                    agrupación organizada de la
                                    totalidad de los contenidos</b> que ha publicado sobre temas específicos con el
                                objeto principal de
                                <b>facilitar su consulta y utilización</b>. Desde su concepción, se diseñaron con la
                                flexibilidad suficiente
                                para poder agregarles fácilmente y a medida que se vayan publicando, nuevos recursos que
                                los enriquezcan y
                                actualicen.
                            </p>
                        </div>                    
                    </a>
                </div>

            </div>
            
            <div class="row pt-2">

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirProyecto?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Proyectos</h4>
                            <p class="card-text color-blanco"> Esta sección del portal web es una comunidad de intercambio de
                                proyectos y webquest creados por otros
                                educadores. Los profesores pueden explorar una amplia variedad de proyectos motivadores
                                y actividades en
                                línea, así como compartir sus propios proyectos y webquest con la comunidad. Es una
                                fuente inagotable de
                                inspiración y apoyo para mejorar la enseñanza con proyectos y webquest enfocados en el
                                aprendizaje
                                activo y colaborativo.</p>
                        </div>                    
                    </a>
                </div>

                <div class="col-lg-6 col-sm-12 pt-2">
                    <a href="<?php echo $DirHerramientas?>" class="btn btn-morado p-3 min-h">                    
                        <div class="card-body">
                            <h4 class="text-center color-blanco">Herramientas TIC</h4>
                            <p class="card-text color-blanco">En Eduteka, ofrecemos a nuestros usuarios una gran variedad de
                                <b>Herramientas TIC</b> que les permiten mejorar su proceso de enseñanza-aprendizaje.
                                Con una <b>organización clara y fácil de usar</b>. Estas herramientas son esenciales
                                para crear un <b>ambiente educativo moderno y estimulante, que fomente el pensamiento
                                    crítico y la creatividad</b>. ¡Explora nuestras opciones y descubre cómo pueden
                                mejorar tu experiencia educativa de manera efectiva!
                            </p>
                        </div>                    
                    </a>
                </div>

            </div>

        </div>

        <?php }




}


?>

    </div>





    <?php require_once('../includes/footerScript.php')?>
    <script src="js/registro.js"></script>
</body>

</html>