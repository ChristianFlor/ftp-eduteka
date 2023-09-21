<?php

$datosPY = verRubrica($idR);
$autor = autor($idR);

$tipoR = ver_tipoRub($idR);
$nombreRubrica = $nombreTipoRubrica[$tipoR];

$area = $datosPY['area'];
$datosArea = nombreAreaId($area);

if($area>=20){
    $tagArea = "Área del Conocimiento";
    $tagAsigna = "Nombre del programa";
}else {
    $tagArea = "Área académica";
    $tagAsigna = "Asignatura";
}

$asignatura = $datosPY['asignatura'];
$datosAsignatura =datosAsignatura($asignatura);

$edad = $datosPY['edad'];

$titulo = $datosPY['titulo'];
$evaluacion = limpiarH($datosPY['evaluacion']);

$fechaCreacion = time_difference_month($datosPY['fechaCreacion']);

if (empty($titulo)) {
    redirect();
}
?>
<a href="https://edtk.co/rubrik/validador.php" class="btn btn-morado" style="float: right;background: #008000;">Crea tu Rúbrica</a>
<div  id="contenido_wq_py" style="padding: 10px!important;">

<div class="oculto" id="sora" revali="<?php echo trim((mb_convert_case($titulo, MB_CASE_TITLE, "UTF-8"))); ?>"></div>
    <article class="pr-lg-5 pr-sm-1 pl-lg-5 pl-sm-1" id="pdf-py-wq">
        <div class="mt-10">        
        <br>
            <p style="font-size: 13px!important;"><a href="https://edtk.co/rubrikas/">Rúbrica</a> <i class="fa fa-angle-right fa-lg"
                    aria-hidden="true"></i> <?php echo $datosArea['nombre']?> <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                    <?php echo $datosAsignatura['nombre']?> <i class="fa fa-angle-right fa-lg"
                    aria-hidden="true"></i>
                <?php echo trim((mb_convert_case($titulo, MB_CASE_TITLE, "UTF-8"))); ?>               
            </p>
        </div>
        <br>
        <img src="https://edtk.co/img/log-eduteka-rubrik.png" style="float: left;">
        <!-- Imprimir y descargar PDF -->        
        <div class="alinear-derecha">        
            <a id="print" href="javascript:window.print()" class="btn btn-morado-lineas"><span><i class="fa fa-print"
                        aria-hidden="true"></i></span>
                <p class="act-print-share-pdf">Imprimir</p>
            </a>
            <a id="btnCrearPdf" href="#" class="btn btn-morado-lineas"><span><i class="fa fa-cloud-download"
                        aria-hidden="true"></i></span>
                <p class="act-print-share-pdf">PDF</p>
            </a>
            <a id="compartir" href="#" class="btn btn-morado-lineas"><span><i class="fa fa-share-alt"
                        aria-hidden="true"></i></span>
                <p class="act-print-share-pdf">Compartir</p>
            </a>
        </div>
        <!-- Fin Imprimir y descargar PDF -->
        
         <hr>
        <!-- Titulo -->
        <h2 class="mt-4 ">
            <?php echo trim($titulo); ?>
        </h2>
      
        <!-- Evaluación -->
        <div class="mrt-1vh mt-3 pb-3 limitarCaracteres">    
            <?php echo $evaluacion; ?>
        </div>
        <!-- Fin Evaluación -->
        
        <!-- Ficha tecnica -->   
        <div class="mrt-1vh mt-3 pb-3 limitarCaracteres">         
            <p><b>Editor:</b> <?php echo $autor; ?></p>
            <p><b><?php print $tagArea;?>:</b> <?php echo verArea($area)?></p>
            <p><b><?php print $tagAsigna;?>:</b> <?php echo verAsignatura($asignatura)?></p>
            <p><b>Tipo de Rúbrica:</b> <?php echo $nombreRubrica; ?></p>
        
            <br><p class="tipo-ar-as">Publicado el <?php echo $fechaCreacion?></p>            
        </div>     
        <!-- Fin Ficha tecnica -->

     
        <hr>
        <div class="mt-5 row col-12">
            <div class="col-lg-4 col-sm-8">
                <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://eduteka.icesi.edu.co/img/cc1.png" width="150" class="img-fluid"/></a>                    
            </div>
            <div class="col-lg-8 col-sm-12">
                <p style="font-size: 12px!important;"><b>*Nota:</b> La información contenida en Rúbrica fue planteada por edutekaLab, a partir del modelo ChatGPT 3.5 (OpenAI) y editada por los usuarios de edutekaLab. 
                <br>Esta obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Licencia Creative Commons Atribución-NoComercial 4.0 Internacional</a>
</p>               
            </div>
        </div>
    </article>
</div>