<?php
require('../config.php');
require_once('includes/funciones.php');

$estadoPro = "activo";

$idR = $_SESSION["idR"];
$idR = intval($idR);

if (empty($idR) || $idR == "") {
    header("location: $serverRubrik");
}

$tipo = 'Rúbrica';
$datos = buscarRubrica($idR);
foreach ($datos as $row) {
    $tituloPagina = $row['titulo'];
}
  $descripcionPagina = "Rúbrica creada para $tituloPagina ";
  $imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
$urlPagina = "https://".$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo $serverDir ?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo $serverDir ?>css/visualizador.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/proyectos.css">
    
</head>
<body  id="img-fondo">
<div class="oculto" id="bow" revali="<?php echo $serverName."rbk/".$idR ?>"></div>

    <?php include('../includes/navRubrik.php'); ?>

    <div class="container pt-5" id="cuerpo-general">
        <div class="cuadro-gestor">
            <div class="text-right mt-0 ">                     
                <form action="editar.php" method="post">
                    <input type="hidden" name="idP" value="<?php echo $idR; ?>">
                    <input type="submit" class="btn btn-morado"  style="background: #008000!important;" value="Edita esta Rúbrica">
                </form>                
            </div>  
            
            <?php include('ver.php'); ?>  
            
            <div class="text-center mt-5 ">                     
                <form action="editar.php" method="post">
                    <input type="hidden" name="idP" value="<?php echo $idR; ?>">
                    <input type="submit" class="btn btn-morado"  style="background: #008000!important;" value="Edita este Rúbrica">
                </form>                
            </div>  
                          
        </div>
        
        <!-- Modal -->
            <div class="modal fade" id="modalEdita" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Est&aacute; lista tu Rúbrica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   
                    <p>Queremos asegurarnos de que el proyecto se ajuste perfectamente a sus necesidades y contexto, por lo que le recomendamos que lo <strong>Edite</strong> y lo adapte seg&uacute;n sus preferencias.</p>

                    <p>Si por alguna raz&oacute;n los resultados no son los que esperaba, no se preocupe, siempre puede crear otra rúbrica. &iexcl;Estamos aqu&iacute; para ayudarlos y apoyarlos en todo lo que necesiten!</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
    </div>
    
<?php include('../includes/footer.php'); ?>

<script type="text/javascript">
    $( document ).ready(function() {
        $('#modalEdita').modal('toggle');
    });
    </script>

<!-- jsPDF -->
<script src="<?php echo $serverDir?>lib/html2pdf/html2pdf.js"></script>
<!-- Script propios  -->
<script src="<?php echo $serverDir?>js/proyectos.js"></script>
</body>
</html>