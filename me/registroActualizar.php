<?php
require_once('../config.php');

require_once('../includes/initialFunctions.php');



(empty($_POST)) ? header('Location: '.$serverName.'me/ingresar.php'): '';


$tituloPagina = "Registro finalizado actualizar";
$descripcionPagina ="Registro finalizado actualizar";

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


    
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $colegio = $_POST['colegio'];
    $tipoCol = $_POST['tipoCol'];
    $cargos = $_POST['cargo'];

    $grados = $_POST['grados'];
    $materias = $_POST['materias'];


    $p = paisId($pais);
    $pais = $p['pais'];




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


    
    $vali = registroUsuarioActulizar($idU,$nombre);

    if($vali){
        $profecion = registroUsuarioProfesionActulizar($idU, $colegio, $tipoCol, $cargos, $sumaGrados, $sumaMaterias);        
        $local = registroUsuarioLocalActualizar($idU, $pais, $ciudad);
        $_SESSION['NOMBREU'] = $nombre; 

        
    ?>

        <div class="pt-100">
            <div class="jumbotron">
                <h1>Gracias por actulizar tus datos</h1>
                <h5>Te invitamos a explorar las secciones de Eduteka Artículos, Módulos temáticos, Proyectos y Herramientas TIC en nuestra página web. Allí encontrarás información relevante y actualizada en tu área de interés, proyectos interesantes para poner en práctica tus conocimientos y herramientas tecnológicas que mejorarán tu desempeño en el ámbito profesional o académico. Te animamos a que aproveches esta oportunidad para mejorar tus habilidades y conocimientos. Visita nuestras secciones y descubre todo lo que tenemos para ofrecerte.</h5>
            </div>
        </div>

      

        <?php }







?>

    </div>





    <?php require_once('../includes/footerScript.php')?>
    <script src="js/registro.js"></script>
</body>

</html>