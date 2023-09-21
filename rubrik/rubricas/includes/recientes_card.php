<?php
$ahostR2 = "/newDisk/edtk/public_html/rubrik/rubricas/";
require_once($ahostR2.'includes/funciones.php');

(intval($pagina) == '') ? $pagina = 1 : '';
(intval($pagina) == '') ? header("Location: https://".$serverRubrikDescubrir."") : '';

$registro_por_pagina = 20;
$start_from = ($pagina - 1) * $registro_por_pagina;
$dato = ver_banco_recientes($start_from, $registro_por_pagina);
?>



<div class="row contenedor-tarjetas" style="width: 100%!important;">

    <?php
    while ($row = $dato->fetch_assoc()) {

        $idR = $row['idR'];
        $nombre = busAreaNombre($row['area']);
        $asignatura = busAsignaturaNombre($row['asignatura']);
        $tipo = "Rúbrica"; 
        $tipoRub = ver_tipoRub($idR);
        $idU = ver_IdUsuario($idR);
        $datosCreador = datos_usuario($idU);
        $nombreCreador = ucwords(strtolower($datosCreador['nombre']));
        $imagenCreador = $datosCreador['imagen'];
         $letraCreador = letrasNm($nombreCreador);
        
    ?>

    <a class="sin-deco color-parrafo-py cuadro-py"
        href="https://edtk.co/rbk/<?php echo $row['idR'];?>">
        <div class="info-py-qw" data-aos="fade-right">
            <div class="col-12">
                <div class="row">
                    <span class="tipo-ar-as"><?php echo utf8_encode($nombre); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <?php echo utf8_encode($asignatura); ?></span>
                    <div>
                        <h5 class="color-neutro-titulos hover-titulo">
                            <?php echo trim((utf8_encode($row['titulo']))); ?>
                        </h5>
                        <p class="color-parrafo-rc">
                         <?php echo "<i>".$nombreTipoRubrica[$tipoRub].":</i> "; ?>
                            <!-- <?php echo strtolower(limitarPalabrasCrad(strip_tags(trim(preg_replace('/&nbsp;/',"",$row['descripcion']))))) ?> -->
                            <?php echo strtolower(limitarPalabrasCrad(strip_tags(trim((mb_convert_case(utf8_encode($row['descripcion']), MB_CASE_TITLE, "UTF-8")))))) ?>
                        </p>
                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <div class="centrar-horizonta-lf">
                        <span class="img-fluid mb-4 circle-perfilXS"><?php echo $letraCreador; ?></span>                           
                        <p class="color-cuerpo-light ml-3 creador-estilo"> <?php echo $nombreCreador?>  -  <?php echo time_difference($row['fechaCreacion']) ?></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="">
            <hr class="linea">
        </div>
    </a>

    <?php } ?>
</div>
<div class="container">
    <div class="mt-5 mb-5 d-flex justify-content-center">
        <?php


        $total_pages = totalPaginasRecientes($registro_por_pagina);
        $start_loop = $pagina;
        $diferencia = $total_pages - $pagina;
        if ($diferencia <= 5) {
            $start_loop = $total_pages - 5;
        }
        $end_loop = $start_loop + 4;
        if ($pagina > 1) {
            echo '<div class="">';
            echo "<a class='btn btn-light tiny-list tiny-list-text' href='".$serverRubrikDescubrir."1'>Primera</a>";
            echo "<a class='btn btn-light tiny-list-text' href='".$serverRubrikDescubrir."" . ($pagina - 1) . "'><i class='fa fa-angle-left' aria-hidden='true'></i></a>";
            echo '</div>';
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            $estilo = ($i == $pagina) ? 'primary' : 'light';

            echo '<div class="">';
            echo "<a class='btn  btn-" . $estilo . " tiny-list' href='".$serverRubrikDescubrir."" . $i . "'>" . $i . "</a>";
            echo '</div>';
        }
        if ($pagina <= $end_loop) {
            echo '<div class="">';
            echo "<a class='btn btn-light tiny-list-text' href='".$serverRubrikDescubrir."" . ($pagina + 1) . "'><i class='fa fa-angle-right' aria-hidden='true'></i></a>";
            echo "<a class='btn btn-light tiny-list-text' href='".$serverRubrikDescubrir."" . ($total_pages-1) . "'>Última</a>";

            echo '</div>';
        }


        ?>

    </div>

</div>