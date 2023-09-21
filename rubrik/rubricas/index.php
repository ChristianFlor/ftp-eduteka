<?php
$ahostR = "/newDisk/edtk/public_html/";
require($ahostR.'config.php');

/*reemplza caracteres*/
function replace_chars_iniclial($content)
{
    $content = mb_strtolower($content);
    $content = strip_tags($content);
    $punctuations = array(
        ',', ')', '(', '.', "'", '"',
        '<', '>', '!', '¿', '?', '%20',
        '[', ']', ':', '+', '=', '#',
        '$', '&quot;', '&copy;', '&gt;', '&lt;',
        '&nbsp;', '&trade;', '&reg;', ';',
        chr(10), chr(13), chr(9)
    );
    $content = str_replace($punctuations, "", $content);
    $content = preg_replace('/ {2,}/si', "", $content);
    return $content;
}

function totalPaginas()
{
    $ahostR = "/newDisk/edtk/public_html/rubrik";
  require($ahostR.'/conexion.php');
    $conexion->select_db("edtk_rubrik");
    $conexion->set_charset("utf8");    
    $query = "SELECT `idEst` FROM `rubusuario`";
    $result = mysqli_query($conexion, $query);
    $rowcount = mysqli_num_rows($result);
    mysqli_close($conexion);
    return $rowcount;
}

$estadoDes = "activo";
$tituloPagina = "Rúbricas";
$descripcionPagina = "Aquí podras encontrar una idea o un plan que busca alcanzar una meta de carácter formativo.";

($_GET['url'] || !empty($_GET['url']))?$urlget = replace_chars_iniclial($_GET['url']):$urlget ='';


$tipoURL = explode("/", $urlget);

$tipoDato = "recientes";
$nombreDato = "";
$pagina = 1;

switch (count($tipoURL)) {
    case 1:        
        $pagina = $tipoURL[0];  // recientes | area | asignatura | recomendacion | webquest | proyecto
        break;
    case 2:        
        $pagina = $tipoURL[0];  // recientes | area | asignatura | recomendacion | webquest | proyecto
       $pagina = intval($tipoURL[1]); // pagina
        break;
   
    default:
    $tipoDato = "recientes";
    $nombreDato = "";
    $pagina = 0;
}

$totalPaginasR = totalPaginas();

$tituloPagina = "IDEA: Descubrir Proyectos";
$descripcionPagina = "Cree, edite y visualice sus Proyectos de Clase o WebQuest.";
$imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
$urlPagina = "https://".$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../includes/head.php");?>
    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo $serverName ?>proyectos/gp/css/estilos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>proyectos/gp/css/verProyectos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/internos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/proyectos.css">
    
    <style type="text/css">
.container { max-width: 1024px!important; }
</style>
</head>
<body id="img-fondo">
    <?php include('../../includes/navRubrik.php'); ?>

    <!-- Contenido -->
    <div class="container padding-cabecera " style="background: #F9F9F9;">

        <div class="pb-5">
            <div class="mt-5">
                <div class="clearfix">
                    <h2 class="color-morado">Rúbricas</h2>
                </div>
            </div>
            <p class="mb-1">
                Las rúbricas son importantes en educación para establecer objetivos, criterios y retroalimentación efectiva. La creación puede ser laboriosa y especializada. Las herramientas de rúbricas con IA simplifican el proceso y permiten crear rúbricas personalizadas y adaptadas en minutos. Esto ahorra tiempo y mejora la calidad de la evaluación educativa, resultando en una mejor comprensión y retención del material por parte de los estudiantes..
            </p>
        </div>
        <a href="https://edtk.co/rubrik/validador.php" class="btn btn-morado" style="float: right;background: #008000;">Crea tu Rúbrica</a>
      
        <div class="oculto" id="bow" zelda="<?php echo $idU ?>"></div>

         <h4>Recientes:</h4>
         <p><?php print $totalPaginasR." Rúbricas creadas"; ?></p>
         <hr>
              <div class="pb-5">        
                <div class="pl-5 pr-5">
                  
                    <div id="resultadoBuscar">
                        <?php                     
                            include('includes/recientes_card.php');
                        ?>
                    </div>
                </div>
            </div>
        
    </div>
    <!-- Fin del contenido -->

    <?php include('../../includes/footer.php'); ?>

    <!-- Script propios  -->
    <script src="<?php echo $serverDir ?>js/script.js"></script>
    <script src="<?php echo $serverDir ?>js/funciones.js"></script>
    <script src="<?php echo $serverDir ?>js/visualizador.js"></script>
    <script>
    AOS.init({
        once: false,
    });
    </script>

    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

    });
    </script>

    <script>
    var _0x4e310c = _0x34ee;

    function _0x21eb() {
        var _0x509a42 = ['115ibNWnw', '943914leuMCA', '1866789bziZjt', 'href',
            'https://edtk.co/proyectos/gp/', 'click', 'preventDefault', 'dialog', 'zelda',
            '182aoQQNA', '116236yvCqqt', '4220469WhmBif',
            '<h3\x20class=\x27text-center\x27>!!!Oops¡¡¡</h3><br><p>Para\x20poder\x20<b>crear</b>\x20un\x20\x27proyecto\x27\x20o\x20una\x20\x27webquest\x27,\x20debe\x20de\x20<b>iniciar\x20sesión</b>\x20para\x20ello\x20dele\x20clic\x20en\x20el\x20botón\x20\x27ir\x20a\x20iniciar\x20sesión\x27\x20o\x20si\x20desea\x20permanecer\x20en\x20esta\x20página\x20de\x20clic\x20en\x20el\x20botón\x20\x27cerrar\x27</p><div\x20class=\x27text-center\x27><a\x20class=\x27btn\x20btn-primary\x27\x20href=\x27https://estk.co/me/ingresar.php\x27>Ir\x20a\x20niciar\x20sesión\x20<i\x20class=\x27fa\x20fa-rocket\x27\x20aria-hidden=\x27true\x27></i></a><a\x20class=\x27btn\x20btn-outline-danger\x20ml-4\x27\x20href=\x27https://edtk.co/proyecto/\x27>cerrar\x20<i\x20class=\x27fa\x20fa-times\x27\x20aria-hidden=\x27true\x27></i></a></div>',
            '10930376ubTkHV', '1160436mQHLGn', '#bow', '34044ccIdZQ', '#cp', 'attr'
        ];
        _0x21eb = function() {
            return _0x509a42;
        };
        return _0x21eb();
    }

    function _0x34ee(_0x41e95f, _0x492876) {
        var _0x21eb96 = _0x21eb();
        return _0x34ee = function(_0x34ee29, _0x38aad5) {
            _0x34ee29 = _0x34ee29 - 0x158;
            var _0x594e99 = _0x21eb96[_0x34ee29];
            return _0x594e99;
        }, _0x34ee(_0x41e95f, _0x492876);
    }(function(_0x187246, _0x4fd177) {
        var _0xcd9ada = _0x34ee,
            _0x37f776 = _0x187246();
        while (!![]) {
            try {
                var _0x2afe50 = parseInt(_0xcd9ada(0x167)) / 0x1 + parseInt(_0xcd9ada(0x161)) / 0x2 + -parseInt(
                    _0xcd9ada(0x15e)) / 0x3 + -parseInt(_0xcd9ada(0x15d)) / 0x4 * (parseInt(_0xcd9ada(0x166)) /
                    0x5) + parseInt(_0xcd9ada(0x163)) / 0x6 * (parseInt(_0xcd9ada(0x15c)) / 0x7) + parseInt(
                    _0xcd9ada(0x160)) / 0x8 + -parseInt(_0xcd9ada(0x168)) / 0x9;
                if (_0x2afe50 === _0x4fd177) break;
                else _0x37f776['push'](_0x37f776['shift']());
            } catch (_0x34b429) {
                _0x37f776['push'](_0x37f776['shift']());
            }
        }
    }(_0x21eb, 0xb8698), $(_0x4e310c(0x164))[_0x4e310c(0x158)](function(_0x2eeb2a) {
        var _0x21218e = _0x4e310c;
        _0x2eeb2a[_0x21218e(0x159)]();
        var _0x5bfbf6 = $(_0x21218e(0x162))[_0x21218e(0x165)](_0x21218e(0x15b));
        if (_0x5bfbf6 || _0x5bfbf6 != '') location[_0x21218e(0x169)] = _0x21218e(0x16a);
        else var _0x42113a = bootbox[_0x21218e(0x15a)]({
            'message': _0x21218e(0x15f),
            'closeButton': ![]
        });
    }));
    </script>

</body>
</html>