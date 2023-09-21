<?php

//header('Content-Type: text/html; charset=utf-8');


$termino = replace_chars_iniclial($_POST['termino']);
$dato = ver_banco_termino($termino);

/*reemplza caracteres*/
function replace_chars_iniclial($content)
{
    $content = mb_strtolower($content);
    $content = strip_tags($content);
    $punctuations = array(
        ',', ')', '(', '.', "'", '"',
        '<', '>', '!', '¿', '?', '/', '%20',
        '[', ']', ':', '+', '=', '#',
        '$', '&quot;', '&copy;', '&gt;', '&lt;',
        '&nbsp;', '&trade;', '&reg;', ';',
        chr(10), chr(13), chr(9)
    );
    $content = str_replace($punctuations, "", $content);
    $content = preg_replace('/ {2,}/si', "", $content);
    return $content;
}

/* Busqueda de termino */
function ver_banco_termino($termino){
    require('/newDisk/edtk/public_html/proyectos/gp/includes/conexion.php');
    //$conexion->set_charset("utf8");    
    $query = "SELECT `idP`, `idU`, `tipo`, `area`, `asignatura`, `grado`, `titulo`, `descripcion`, `url`, `fechaPub` FROM `bancoProyectos` WHERE titulo LIKE '%$termino%' OR descripcion LIKE '%$termino%' ORDER BY `bancoProyectos`.`fechaPub` DESC";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $result;
}


function busAreaNombre($idArea)
{
    require('/newDisk/edtk/public_html/proyectos/gp/includes/conexion.php');
    mysqli_select_db($conexion, "edtk_general");
    //$conexion->set_charset("utf8");   
    $sql = "SELECT `nombreArea` FROM `area` WHERE idArea = $idArea";
    $resultado = $conexion->query($sql) or die(mysqli_error($conexion));
    $datos = $resultado->fetch_assoc();
    mysqli_close($conexion);
    return $datos['nombreArea'];
}
/* Fin busqueda de termino */

function limitarPalabrasCradtitle($cadena, $longitud = 10, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}


function limitarPalabrasCrad($cadena, $longitud = 50, $elipsis = ' <b>...</b>')
{
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud) {
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    } else {
        return $cadena;
    }
}


/* Establece el tiempo*/
function time_difference_month($date){ 
    date_default_timezone_set("America/Bogota");
    if (empty($date)) {
        return "- - -";
    }
    
    $fecha = explode("-",$date);
    $diaHora =explode(" ", $fecha[2]);

    $AAAA = $fecha[0];
    if($AAAA == "" || empty($AAAA)){
        return "- - -";
    }
    
    $MM = $fecha[1];
    if($MM == "" || empty($MM)){
        return "- - -";
    }
    $dia = $diaHora[0];
    if($dia == "" || empty($dia)){
        return "- - -";
    }

    $arreglo = array("1"=>"Ene","2"=>"Feb","3"=>"Mar","4"=>"Abr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Ago","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dic");
    $mes="";
    for($i=1; $i < count($arreglo);$i++){
        ($i == $MM)?$mes = $arreglo[$i]:'';        
    }
    if($mes == "" || empty($mes)){
        return "- - -";
    }

    $fechaDia = $mes." ".$dia.", ".$AAAA;
    
    
    return $fechaDia;
}


function datos_usuario($idU){
    require('/newDisk/edtk/public_html/proyectos/gp/includes/conexion.php');  
    mysqli_select_db($conexion, "edtk_registro");
    $conexion->set_charset("utf8");
    $consulta = "SELECT `idU`, `nombre`, `tipoSocial`, `picture` FROM `usuarios` WHERE `idU` =  $idU";    
    $result = mysqli_query($conexion, $consulta);
    $dato = $result->fetch_assoc();    
    $d1 = $dato['nombre'];
    $d2 = $dato['picture'];
    $tipo = $dato['tipoSocial'];
    $random = rand(1, 8);

    ($tipo == "Twitter" || $tipo == "Google") ? $imagen = $d2 : $imagen = "https://eduteka.net/img/avatar".$random.".jpg";


    $arreglo = array('nombre'=>$d1,'imagen'=>$imagen);
    mysqli_close($conexion);
    return $arreglo;    
}

function letras($nombreUsuario){
    	$porciones = explode(" ", $nombreUsuario);

	if(count($porciones) > 1){
		$primera = $porciones[0];
		$segunda = $porciones[1];

		$letras = $primera[0].$segunda[0];
		$letras = strtoupper($letras);

	}else{
		$unica = $porciones[0];
		$letras = $unica[0].$unica[1];
		$letras = strtoupper($letras);


	}
    
    return $letras;
}


?>


<div class="col-12 mt-5">
    <h2 class="text-center">T&eacute;rmino buscado "<?php echo $termino?>"</h2>
</div>

<div class="row mt-5 ">

    <?php
    while ($row = $dato->fetch_assoc()) {

        $nombre = busAreaNombre($row['area']);    
        $asignatura = busAsignaturaNombre($row['asignatura']);    
        ($row['tipo'] == 1) ? $tipo = "WebQuest" : $tipo = "Proyecto";        

        $datosCreador = datos_usuario($row['idU']);
        $nombreCreador = ucwords(strtolower($datosCreador['nombre']));
        $letraCreador = letras($nombreCreador);
        
    ?>




    <a class="sin-deco color-parrafo-py cuadro-py"
        href="https://edtk.co/p/<?php echo $row['idP'];?>" style="width: 90% !important;">
        <div class="info-py-qw">
            <div class="col-12">
                <div class="row" >
                    <span class="tipo-ar-as"><?php echo utf8_encode($nombre); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <?php echo utf8_encode($asignatura); ?></span>
                    <div>
                        <h5 class="color-neutro-titulos hover-titulo">
                            <?php echo trim((utf8_encode($row['titulo']))); ?>
                        </h5>
                        <p class="color-parrafo-rc">
                            <!-- <?php echo strtolower(limitarPalabrasCrad(strip_tags(trim(preg_replace('/&nbsp;/',"",$row['descripcion']))))) ?> -->
                            <?php echo strtolower(limitarPalabrasCrad(strip_tags(trim((mb_convert_case(utf8_encode($row['descripcion']), MB_CASE_TITLE, "UTF-8")))))) ?>
                        </p>
                    </div>
                </div>
               
                <div class="d-flex justify-content-end" >

                    <div class="centrar-horizonta-lf">
                        <span class="img-fluid mb-4 circle-perfilXS"><?php echo $letraCreador; ?></span>                           
                        <p class="color-cuerpo-light ml-3 creador-estilo"> <?php echo $nombreCreador?>  -  <?php echo time_difference_month($row['fechaPub']) ?></p>

                    </div>
                </div>

            </div>
        </div>
        <div class="mb-5">
            <hr class="linea">
        </div>
    </a>




    <?php } ?>

</div>