<?php

$ocultador = (isset($idU))? 'oculto-ingreso':'';

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light color-nav">
    <a class="navbar-brand" href="<?php echo $serverPlaneo ?>">
        <img src="<?php echo $serverName ?>img/log-eduteka-planeo.png"  
            class="d-inline-block align-top grande" alt="logo planeo" title="ir al inicio Planeo">
        <img src="<?php echo $serverName ?>img/log-eduteka-planeo.png" class="d-inline-block align-top pequeno"
            alt="logo Rubrik" title="ir al inicio Planeo">
    </a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">

        <div class="ml-5 ml-small-0">
            <?php if(isset($idU)){ ?>
            <div class="dropdown dropleft float-right float-right-inverso">
                <a class="" data-toggle="dropdown">
                    <!-- <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i> -->
                    <div class="circle-perfil"  style="background: #008000!important;">
                        <span><?php echo $letras?></span>
                    </div>
                </a>
                <div class="dropdown-menu usuario-opc">
                    <h6 class="dropdown-item sin-decoracio-h"><?php echo utf8_encode($nombreUsuario)?></h6>
                    <a class="dropdown-item" href="<?php echo $serverPlaneo?>listado.php"><i
                            class="fa fa-check-square" aria-hidden="true"></i> Mis Cursos</a>
                            
                    <a class="dropdown-item" href="<?php echo $serverPlaneo?>validador.php"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Crear Curso</a>
                            
                    <a class="dropdown-item" href="<?php echo $serverName?>me/logout.php"><i class="fa fa-sign-out"
                            aria-hidden="true"></i> Cerrar sesión</a>
                </div> 
            </div>
            <?php }else{?>
            <a href="<?php echo $serverName?>me/ingresar.php?o=4" class="btn btn-call-to-action size-nav-btn">Ingresar
            </a>
            <?php }?>
        </div>
        
        <div class="ml-5 ml-small-0">        
            <div class="dropdown float-right float-right-inverso">
                <a class="" data-toggle="dropdown">         
                    <img src="<?php echo $serverName?>img/app.png" width="28" style="cursor: pointer;">
                </a>
                <div class="dropdown-menu usuario-opc">
                    <h5 class="dropdown-item sin-decoracio-h">Herramientas</h5>
                                
                    <a class="dropdown-item" href="https://eduteka.icesi.edu.co/">
                        <div class="row p-2">
                            <span class="submenu-titulo"><i class="fa fa-star" aria-hidden="true"></i> Eduteka</span> 
                            <small>Artículos, recursos y herramientas de calidad gratuitas para docentes, directivos y formadores de maestros.</small>
                        </div>
                   </a>     
                   
                   <a class="dropdown-item" href="<?php echo $serverName?>planeo">
                        <div class="row p-2">
                            <span class="submenu-titulo"><i class="fa fa-star" aria-hidden="true"></i> Planeo</span> 
                            <small>Simplifica la planificación de tus Cursos con IA.</small>
                        </div>
                   </a>                        
                            
                   <a class="dropdown-item" href="<?php echo $serverName?>idea">
                        <div class="row p-2">
                            <span class="submenu-titulo"><i class="fa fa-star" aria-hidden="true"></i> IDEA</span> 
                            <small>Crea proyectos educativos personalizados y ahorra tiempo con nuestra IA.</small>
                        </div>
                   </a> 
                   
                    <a class="dropdown-item" href="<?php echo $serverName?>rubrik">
                        <div class="row p-2">
                            <span class="submenu-titulo"><i class="fa fa-star" aria-hidden="true"></i> Rubrik</span> 
                            <small>Crea rúbricas efectivas y personalizadas en minutos con ayuda la IA.</small>
                        </div>
                   </a>                   
                 
                   <a class="dropdown-item" href="<?php echo $serverName?>mitica">
                        <div class="row p-2">
                            <span class="submenu-titulo"><i class="fa fa-star" aria-hidden="true"></i> Mítica</span> 
                            <small>Propuesta de diagnostico para la incorporación efectiva de las TIC en instituciones educativas.</small>
                        </div>
                   </a>   
                                     
                </div>               
            </div>           
        </div>

        <div class="navbar-nav">
            <a class="nav-link ml-sm-0 ml-md-2 ml-lg-3 ml-xl-3 mr-sm-0 mr-md-2 mr-lg-3 mr-xl-3 font-weight-normal <?php echo $estadoIni?>"
                href="<?php echo $serverName?>"><span><b style="color: #333;">eduteka</b><b style="color: #09F;">Lab</b></span> </a>
            
            <a class="nav-link ml-sm-0 ml-md-2 ml-lg-3 ml-xl-3 mr-sm-0 mr-md-2 mr-lg-3 mr-xl-3 font-weight-normal <?php echo $estadoDes?>"
                href="<?php echo $serverName?>cursos/"><span>Descubrir</span></a>
           
            <?php if(isset($idU)){ ?>
            
             <a class="nav-link ml-sm-0 ml-md-2 ml-lg-3 ml-xl-3 mr-sm-0 mr-md-2 mr-lg-3 mr-xl-3 font-weight-normal <?php echo $estadoMis?>"
                href="<?php echo $serverPlaneo?>listado.php"><span>Mis Cursos</span></a>
            
            <a class="nav-link ml-sm-0 ml-md-2 ml-lg-3 ml-xl-3 mr-sm-0 mr-md-2 mr-lg-3 mr-xl-3 font-weight-normal <?php echo $estadoCre?>"
                href="<?php echo $serverPlaneo?>validador.php"><span>Crear Curso</span></a>
                
            <?php } ?>

        </div>
    </div>
</nav>