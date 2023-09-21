<?php
    include("../config.php");
    include("../includes/initialFunctions.php");
    $tituloPagina = "Rubrik: Creando rúbricas con ayuda de la IA";
    $descripcionPagina = "Nuestra herramienta de rúbricas con IA crea rúbricas efectivas y personalizadas en minutos. Ahorra tiempo y mejora la calidad de la evaluación educativa.";
    $imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
    $urlPagina = "https://".$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

$datoProyectos = ver_rubricas_recientes(1, 9);  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("includes/head.php");?>
    <title>Eduteka</title>
    
    <style type="text/css">
    	.fondo-proyectos{ padding: 6rem 4rem !important; background-image: url(<?php print $serverName; ?>img/CTARubrica.png) !important; }
        .round { border-radius: 15px;padding:20px; background: #FFF; }
       
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.dots.min.js"></script>
    
</head>
 <?php include($ahost.'includes/navRubrik.php'); ?>

<body id="img-fondo">

    <div id="showing" class="carousel-inner shdround" style="background: #33334D;">
        <div class="carousel-item active" style="#33334D; height: 550px!important;">
        
            <div class="carousel-caption text-left" style="padding-bottom: 50px;">
              <p class="color-blanco texto-carrusel">
              Plataform in line que te guía en la creación de rúbricas efectivas y personalizadas. Utilizando la IA, la herramienta te ayuda en la definición de objetivos de aprendizaje claros, en la creación de criterios de evaluación adecuados y en la generación de rúbricas. Puedes editar, guardar y compartir tus rúbricas con colegas y estudiantes. Ahorra tiempo y mejora la calidad de la evaluación educativa con nuestra herramienta de rúbricas con IA.                  
                </p>
                <p align="center">
                    <a class="btn btn-morado"   style="background: #99CC00; color: #000; font-weight: 700;"  href="validador.php">Crea tu rúbrica</a>
                </p>
            </div>
        </div>        
    </div>
    
    <div class="container cuerpo round mb-5 mt-5" id="cuerpo-general" >
       
        <article class="mb-0">
            <div class="mt-2 mb-2">
                <div class="clearfix">
                    <h2 class="color-morado float-left">Rúbricas recientes</h2>

                    <div class="verMas float-right color-morado" data-animation="bonus">
                        <b><a href="<?php echo $serverRubrik."rubrikas/"?>">Ver todo <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a></b>
                    </div>
                </div>
            </div>
            <p class="mb-5">
                Esta sección podemos ver las últimas rúbricas creadas por otros
                educadores + nuestra IA. 
            </p>

            <div class="row contenedor-tarjetas">

                <?php
                while ($row = $datoProyectos->fetch_assoc()) {

                    $nombre = busAreaNombre($row['area']);
                    ($row['tipo'] == 1) ? $tipo = "WebQuest" : $tipo = "Proyecto";  

                    //$datosCreador = datos_usuario($row['idU']);
                    //$nombreCreador = ucwords(strtolower($datosCreador['nombre']));
                   // $imagenCreador = $datosCreador['imagen'];
                    
                ?>
                <div class="col-lg-4 col-sm-12 mb-2 " >
                    <a href="<?php echo $serverName?>rbk/<?php echo $row['idR'];?>">
                        <div class="size-min">                            
                            <h5 class="mt-3 color-morado">
                              <?php echo trim(ucfirst(utf8_encode($row['titulo']))); ?>
                            </h5>
                            <span class="tipo-ar-as"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <?php echo utf8_encode($nombre); ?></span>
                            <p class="color-gris" style="font-size: 13px!important;">
                               <?php echo strtolower(limitarPalabrasCrad(strip_tags(trim(preg_replace('/&nbsp;/',"",utf8_encode($row['descripcion'])))))) ?>
                            </p>                           
                        </div>
                    </a>
                </div>

                <?php } ?>
            </div>
        </article>    
            
         <article class="">
            <div class="mt-0 mb-4">
       
            </div>
            <div class="jumbotron fondo-proyectos">
                <div class="col-lg-4">
                    <h4 class="mb-5 color-blanco">Crea rúbricas efectivas y personalizadas en minutos con ayuda de la IA.".</h4>
                    <a href="<?php echo $serverRubrik."listado.php"?>" class="btn btn-call-to-action btn-block" style="background: #99CC00;">Crear Rúbrica</a>
                </div>                
            </div>
        </article>
    </div>

        <div class="row CTA-sobre-eduteka"  style="background: #80A788!important;">
            <div class="col-lg-12 col-sm-12 margenes-6 " style="padding: 0 10%;">
                <h3 style="color: #000 !important;">¿Por qué es importante?</h3>
                <p style="color: #000 !important;">Rubrik es una herramienta innovadora que utiliza la inteligencia artificial (IA) para ayudar a los educadores a crear rúbricas de evaluación efectivas. Las rúbricas son esenciales para definir objetivos de aprendizaje, establecer criterios de evaluación y proporcionar retroalimentación efectiva a los estudiantes. Con Rubrik, los educadores pueden crear rúbricas personalizadas y adaptadas a las necesidades específicas de los estudiantes y las tareas evaluadas en cuestión de minutos. Esto ahorra tiempo y mejora la calidad de la evaluación educativa, lo que resulta en una mejor comprensión y retención del material por parte de los estudiantes.</p>
                <div style="display:inline-block;min-height:40px; margin:0 0 10px 0!important;">
                            <a href="<?php print $serverName; ?>rubrikas/" style="color: #FFF;" class="button orange">
                            <span class="btn btn-morado" style="background: #99CC00; color: #000; font-weight: 500;">Ver más</span></a>
                        </div>
                
            </div>
         </div>

   

    <div class="row CTA-sobre-eduteka"  style="background: #FFF;">
        <div class="container espacio-5 pb-0">
        <h3>¿Qué evaluamos?</h3>
            <div class="row text-center pb-5">
                <div class="col-md-2 col-sm-12">
                        <a href="<?php echo $serverRubrik."listado.php"?>" class="no-decoracion">
                        <img src="<?php print $serverName; ?>img/R1.png" alt="" style="max-width: 100px;width: 85%;padding: 10px 0 20px 0;">
                        <h5 class="text-center color-principal">Cuéntanos que enseñas</h5>
                    </a></div>
                <div class="col-md-2 col-sm-12">
                        <a href="<?php echo $serverRubrik."listado.php"?>" class="no-decoracion">
                        <img src="<?php print $serverName; ?>img/R2.png" alt="" style="max-width: 100px;width: 85%;padding: 10px 0 20px 0;">
                        <h5 class="text-center color-principal">Define el tema a evaluar</h5>
                    </a></div>
                <div class="col-md-2 col-sm-12">
                        <a href="<?php echo $serverRubrik."listado.php"?>" class="no-decoracion">
                        <img src="<?php print $serverName; ?>img/R3.png" alt="" style="max-width: 100px;width: 85%;padding: 10px 0 20px 0;">
                        <h5 class="text-center color-principal">Escoge el tipo de Rúbrica</h5>
                    </a></div>
                <div class="col-md-2 col-sm-12">
                        <a href="<?php echo $serverRubrik."listado.php"?>" class="no-decoracion">
                        <img src="<?php print $serverName; ?>img/R4.png" alt="" style="max-width: 100px;width: 85%;padding: 10px 0 20px 0;">
                        <h5 class="text-center color-principal">La IA te propone una rúbrica</h5>
                    </a></div>
                <div class="col-md-2 col-sm-12">
                        <a href="<?php echo $serverRubrik."listado.php"?>" class="no-decoracion">
                        <img src="<?php print $serverName; ?>img/R5.png" alt="" style="max-width: 100px;width: 85%;padding: 10px 0 20px 0;">
                        <h5 class="text-center color-principal">Edita, guarda y comparte </h5>
                    </a></div>
            </div>
        </div>
    </div>

    
    <?php include("../includes/footer.php");?>  
<script>

VANTA.DOTS({
  el: "#showing",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0x5b964d,
  color2: 0x47ff20,
  backgroundColor: 0x2c3741,
  size: 2.30,
  spacing: 13.00,
  showLines: false
})

</script>
</body>
</html>