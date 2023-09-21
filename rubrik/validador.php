<?php
require('../config.php');
require_once('includes/funciones.php');

$estadoCre = "activo";
$tituloPagina = "Rubrik: Crear Rúbricas";
$descripcionPagina = "Cree, edite y visualice sus rúbricas";
$imagePaginaDefault = "https://edtk.co/img/RubrikMeta.png";
$urlPagina = "https://".$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

$nuevo = "procesa.php";

(isset($idU)) ? '' : header('Location: '.$serverName.'rubrikas/');

if($_POST['tipoEdu']>1){
    $idEduTipo = $_POST['tipoEdu']; 
    $area = area($idEduTipo); 
    $tituloEdu = "Educación Superior";
    $nombreAreaMostrar = "Área del Conocimiento";
    $nombreAsigMostrar = "Nombre del programa";
    $nombreCatMostrar = " Área del Conocimiento y Nombre del programa";
    $focus = "active";
} else { 
    $area = area();
    $tituloEdu = "Educación Básica y media";
    $nombreAreaMostrar = "Área académica";
    $nombreAsigMostrar = "Asignatura";
    $nombreCatMostrar = " Área académica y Asignatura";
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      
      <?php include($ahost.'includes/head.php'); ?>         
        
     
       
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://www.google.com/recaptcha/api.js?render=6LdbmpkeAAAAAHcSJJx_VmoqOwsLLhOIVM_aZ49t"></script>
        <!-- Estilos propios -->
  
    <link rel="stylesheet" href="<?php echo $serverName ?>css/internos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/general.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo $serverName ?>css/proyectos.css">

          <style type="text/css">
            input[type="text"]{        
                width:94%!important;
                background: #FFF;
            }
            textarea{        
                width:94%!important;
                background: #FFF;
            }
         
            .round {
                border-radius: 15px;
                padding:20px;
                background: #FFF;
            }
            .oculto{display:none}
            .msj-alerta{color:#dd4a48;font-size:12px}
            .input-alerta {
                border: solid 1px #DD4A48;
            }
            #number {
              width: 2em!important;
            }
            
            .accordion {
              background-color: #eee;
              color: #444;
              cursor: pointer;
              padding: 18px;
              width: 100%;
              text-align: left;
              border: none;
              outline: none;
              transition: 0.4s;
              font-size: 20px;
              font-weight: 700;
            }
            
            /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
            .active, .accordion:hover {
              background-color: #ccc;
            }
            
            /* Style the accordion panel. Note: hidden by default */
            .panel {
              padding: 20px 18px;
              background-color: white;
      
              overflow: hidden;
            }
    </style>


    </head>

    <body  id="img-fondo">
        <?php include($ahost.'includes/navRubrik.php'); ?>
        
           <div class="pt-6 mb-5" id="cuerpo-general">
            <div class="container ">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-12  mt-5 mb-5 round" style="#F0F0F0; max-width:800px!important;">
                        <h2>Crear Rúbrica</h2>
                  

                        <?php if($_POST['tipoEdu']<2){ ?>
                        <div class="">                                   
                            
                            <form action="validador.php" method="post">
                                <input type="hidden" name="tipoEdu" value="2">
                               <p align="center"> Si usted es un docente de Educación superior, seleccione: 
                                <input type="submit" class="btn btn-morado" style="background: #008000;font-weight: 700;" value="Educación Superior"></p>
                            </form>                                    
                        </div> 
                        <?php } else { ?>
                            <div class="">                                   
                             
                            <form action="validador.php" method="post">
                                <input type="hidden" name="tipoEdu" value="1">
                               <p align="center"> Si usted es un docente de Educación Básica y media seleccione:
                                <input type="submit" class="btn btn-morado" style="background: #00FFFF;color: #000;font-weight: 700;" value="Educación Básica y Media"></p>
                            </form>                                    
                        </div> 
                        <?php } ?>
                        <p align="right"><b>* campo obligatorio</b></p>
             
                        <form id="formularioValidador" action="<?php echo $nuevo; ?>" method="POST">
                        
                            <div class="accordion ">
                                Paso 1: <?php print $nombreCatMostrar; ?>.
                                <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Esto nos define sobre qué area de conocimiento nos enfocamos"></i>
                            </div>                            
                            <div id="p1" class="panel">  

                                <p align="center">Va a realizar una rúbrica para <b><?php print $tituloEdu; ?></b>.</p>
                                     <!-- Combox de area academica -->
                                    <div class="form-group">
                                        <label for="area" class="color-cuerpo"><b><?php print $nombreAreaMostrar; ?>*</b></label>
                                        <select class="form-control" name="cbx_materia" id="cbx_materia">
                                            <option value="0">Selecciona <?php print $nombreAreaMostrar; ?></option>
                                            <?php while ($row = $area->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['idArea']; ?>"><?php echo $row['nombreArea']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <div id="ms-area" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    </div>
                                    <!-- Fin combox area -->
     
                                    <!-- Combox de asignatura -->
                                    <div class="form-group">
                                        <label for="asignatura" class="color-cuerpo"><b><?php print $nombreAsigMostrar; ?>*</b></label>
                                        <select name="cbx_asignatura" id="cbx_asignatura" class="form-control">
                                            <option value="0">Selecciona <?php print $nombreAsigMostrar; ?></option>
                                        </select>
                                        <div id="ms-asignatura" class="msj-alerta oculto">*Este campo es obligatorio</div>
                                    </div>
                                    <!-- Fin combox asignatura -->
                             
                                    <?php if($_POST['tipoEdu']<2){ ?>
                                    <label for="edad"><b>Edad promedio de mis estudiantes: *</b></label>                 
                                      <div id="edadPW">
                                        <div class="">                                       
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad1"
                                                        autocomplete="off" value="1"> 5-6
                                                </label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad2"
                                                        autocomplete="off" value="2"> 7-8
                                                </label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad3"
                                                        autocomplete="off" value="3"> 9-10
                                                </label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad4"
                                                        autocomplete="off" value="4"> 11-12
                                                </label>
                                            </div>
                                        </div>
    
                                        <div class=" my-2">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad5"
                                                        autocomplete="off" value="5"> 13-14
                                                </label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad6"
                                                        autocomplete="off" value="6"> 15-16
                                                </label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad7"
                                                        autocomplete="off" value="7"> 17+
                                                </label>
                                            </div>
                                        </div>
    
                                    </div>
                                    
                                                                    
                                     <?php } else { ?>
                                      <div class="btn-group btn-group-toggle oculto <?php print $focus; ?>" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input class="selectAge" type="checkbox" name="edad[]" id="edad7"
                                                        autocomplete="off" value="7" checked> 17+
                                                </label>
                                            </div>
                                     <?php } ?> 
                                     <div id="ms-edad" class="msj-alerta oculto">*Este campo es obligatorio</div> 
                                </div>
                                
                                    
                            
                                
                           
                                  <div class="accordion">
                                    Paso 2: Tipo de rúbrica
                                    <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Aquí delimitamos qué tipo de metodología usaremos, cada una tiene caracteristicas diferentes, pero todas centradas en nuestros estudiantes, las sesiones y edad es importante"></i>
                                </div>                            
                                <div id="p2" class="panel">
                                
                                    <div class="form-group">
                                     <label for="modoRubrica"><b>Escoja el tipo de rúbrica: </b></label>
                                      <select name="modoRubrica" id="modoRubrica">
                                      <option value="">Seleccione una opción</option>
                                        <option value="RA" selected>Rúbrica analítica</option>
                                        <option value="RH">Rúbrica holística</option>
                                        <option value="RV">Rúbrica de lista de verificación</option>
                                        <option value="RE">Rúbrica escalar</option>
                                        <option value="RO">Rúbrica de observación</option>
                                        <option value="AE">Rúbrica de autoevaluación y coevaluación</option>    
                                         <option value="PU">Rúbrica de Punto único</option>                                
                                      </select>
                                    </div>   
                                    
                                    <div id="nivelDiv" class="form-group" class="oculto">
                                        <label for="niveles"><b>Cu&aacute;ntos niveles de desempeño tiene la rúbrica:</b></label>
                                          <select id="niveles" name="niveles">
                                            <option value="">Seleccione una opción</option>
                                            <option value="3">3 niveles</option>
                                            <option value="4">4 niveles</option>
                                            <option value="5">5 niveles</option>
                                          </select>
                                        </div>
                                      
                                 <div class="container-fluid col-lg-12">
                                 <p><a class="btn btn-primary" href="#" id="show" ><i class="fa fa-eye"></i> Mostrar descripción de cada tipo de rúbrica</a></p>
                                    <div id="element" class="col-lg-12" style="display: none; background:#E1E1E1;"> 
                                        <div id="close"><a class="btn btn-small" href="#" id="hide" title="Cerrar"  style="float: right;background: #FFF;"><i class="fa fa-close"></i></a></div>
                                            <ul>
                                                <li><strong>R&uacute;bricas anal&iacute;ticas:</strong>&nbsp;Eval&uacute;an cada criterio individualmente y permiten obtener una visi&oacute;n detallada de fortalezas y debilidades.</li>
                                                <li><strong> R&uacute;bricas hol&iacute;sticas:</strong>&nbsp;Eval&uacute;an el trabajo en su conjunto y asignan una sola calificaci&oacute;n global.</li>
                                                <li><strong>R&uacute;bricas de lista de verificaci&oacute;n:</strong>&nbsp;Eval&uacute;an tareas sencillas y repetitivas con si o no se cumplen.</li>
                                                <li><strong>R&uacute;bricas escalares:</strong>&nbsp;Asignan una puntuaci&oacute;n num&eacute;rica a cada criterio y para obtener una calificaci&oacute;n final.</li>
                                                <li><strong>R&uacute;bricas de observaci&oacute;n:</strong>&nbsp;Se usan en evaluaciones pr&aacute;cticas y observar comportamientos y habilidades con una escala de puntuaci&oacute;n.</li>
                                                <li><strong>R&uacute;bricas de autoevaluaci&oacute;n y coevaluaci&oacute;n:</strong>&nbsp;Son usadas por estudiantes para evaluar su propio trabajo o el de sus compa&ntilde;eros.</li>
                                                <li><strong>Rúbricas de Punto único</strong>: describen los desempeños que deben cumplirse para completar una tarea; define lo que el estudiante hizo bien y aquello que puede mejorar</li>
                                            </ul>
                                        </div>                           
                                    </div>
                                 </div>
                                <div class="accordion">
                                    Paso 3: Cuál es el tema a evaluar?
                                    <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Entre más delimitado es el tema es mejor los resultados, es bueno definir el tema o problema a resolver"></i>
                                </div>                                
                                <div id="p3" class="panel">                                

                                	<label for="pregunta">Escribe el tema espec&iacute;fico de la rúbrica: *</label><br>
                                	<input type="text" id="pregunta" name="pregunta" maxlength="150" required>
                                     <div id="ms-pregunta" class="msj-alerta oculto">*Este campo es obligatorio</div><br><br>                                    
   
                                                         
                                    <label for="objetivo">
                                        Que cumpla con el siguiente objetivo de aprendizaje: <br>(opcional, sino es definido Rubrik propone objetivos pertinentes al tema o problema)
                                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Es muy importante tener muy claros los objetivos especificos o competencias que quieren  evaluar,  sino existen la IA creará unos apropiados"></i>
                                     </label><br>
                                    <textarea id="objetivo" name="objetivo"  maxlength="800" rows="4"></textarea><br><br>                                	
                                    
                                                    	
                                </div>
                                 <hr>
                
                            <!-- <input type="hidden" name="tipo" value="<?php echo $tipo ?>">  -->
                          
                            <button class="btn btn-primary text-center mb-5" type="button"  style="background: #008000!important;" id="enviar"> Crear Rúbrica </button>
                        </form>

                    </div>
                    <div class="col-2"></div>
                </div>
            
        </div>            

        <?php include($serverPath . '/includes/footer.php'); ?>
 
    <!-- Modal -->
    <?php


$indice_aleatorio = rand(0, 10);
$fraseWaiting = $array[$indice_aleatorio];
	
?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body" style="text-align: center;">
          <h4>Estamos creando tu Rúbrica</h4>
           <p><img src="<?php print $serverName; ?>img/loading.gif" width="70%" /></p>
           <p id="frase">Estamos creando tu Rúbrica, es un poquito más de 1 minuto</p>
            <div id="contador">Tiempo</div>
          </div>
          
        </div>
      </div>
    </div>
    
 <script>
    $(document).ready(function() {
        
          $("#ms-edad").addClass("oculto");
        
         $("#cbx_materia").change(function() {
            $("#cbx_materia option:selected").each(function() {
                idArea = $(this).val(); 
                showArea(idArea);                          
            });
        });
        
        $('[data-toggle="tooltip"]').tooltip();  
        
        function showArea(idArea) {
                $.ajax({
                  type: "POST",
                  data: { idArea: idArea },
                  url: "includes/getAsignatura.php",
                }).done(function (data) {                
                    $("#cbx_asignatura").html(data); 
                });
        } 
               
        function mostrarFrases(selector, frases) {
            setInterval(function() {
                var indice = Math.floor(Math.random() * frases.length);
                $(selector).fadeOut(500, function() {
                    $(this).text(frases[indice]);
                }).fadeIn(500);
            }, 7000);
        }
        
        
        $('#enviar').click(function() {
            
            var idArea = $("#cbx_materia").val();
            var idAsig = $("#cbx_asignatura").val();
            var estadoPregunta = $("#pregunta").val();
 
            var edades = validadorEdad();
            
            if (estadoPregunta == "") {
                $("#pregunta").addClass("input-alerta");
                $("#ms-pregunta").removeClass("oculto");
                $("#pregunta").focus();
                vali1 = 0;
            } else {   
                vali1 = 1;
            }
            
         
               
            if (edades == 0) {
              $("#ms-edad").removeClass("oculto");
              vali3 = 0;
            } else {
              vali3 = 1;
            }
            
            var arregloEdades = $('[name="edad[]"]:checked')
                .map(function () {
                  return this.value;
                })
                .get();
          
              edad = arregloEdades.join(",");
            
             if (idArea == 0) {
                  $("#cbx_materia").addClass("input-alerta");
                  $("#ms-area").removeClass("oculto");
                  $("#cbx_materia").focus();
                  vali4 = 0;
             } else {
                  vali4 = 1;
             }
              
              if (idAsig == 0) {
                  $("#cbx_asignatura").addClass("input-alerta");
                  $("#ms-asignatura").removeClass("oculto");
                  $("#cbx_asignatura").focus();
                  vali5 = 0;
              } else {
                  vali5 = 1;
              }      
              
              /* Valida el check de edad */
            function validadorEdad() {
              var vali = 0;
              for (var i = 1; i <= 7; i++) {
                if ($("#edad" + i).is(":checked")) {
                  vali += 1;
                }
              }
              /* console.log(vali); */
              return vali;
            }              
             
            if (vali1 == 1 && vali3 == 1 && vali4 == 1 && vali5 == 1) { 
                
                 var frases = [
                    "Creando unos objetivos de aprendizaje impresionantes.",
                      "Creando los aspectos a evaluar que si se diferencien",
                      "Creando los críterios de evaluación super claros",
                      "Entendiendo el contexto, lo cual es bastante dificil",
                      "Haciendo cálculos matemáticos super complejos",
                      "Formateando la tabla de resultados espectacular",
                      "Tratando de hacerlo muy rápido",
                      "En serio, ya casi, vamos a toda máquina"
                   
                    ];

                  $("#errorMateria").remove();
                  $("#errorAsignatura").remove();
                  $("#errorEdad").remove();
      
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdbmpkeAAAAAHcSJJx_VmoqOwsLLhOIVM_aZ49t', {
                        action: 'validarProyecto'
                    }).then(function(token) {
                        $('#formularioValidador').append('<input type="hidden" name="token" value="' + token + '" >');
                        $('#formularioValidador').append("<input type='hidden' name='action' value='validarProyecto' >");
                        $('#formularioValidador').submit();                          
                        $('#exampleModal').modal({ show:true, backdrop:'static' });
                        mostrarFrases("#frase", frases);
                    });
                });
            }
        })
        
        $("#exampleModal").on("shown.bs.modal", function() {
            var segundos = 90;
            var contador = setInterval(function() {
              segundos--;
              var minutos = Math.floor(segundos / 60);
              var segundosRestantes = segundos % 60;
              var textoContador = minutos + ":" + (segundosRestantes < 10 ? "0" : "") + segundosRestantes;
              $("#contador").html(textoContador);
              if (segundos <= 0) {
                clearInterval(contador);                
                $("#miModal").modal("hide");
              }
            }, 1000);
          });
        
          // Función que se ejecuta cuando se cierra el modal
          $("#miModal").on("hidden.bs.modal", function() {
            // Reiniciamos el contador
            $("#contador").html("00:00");
          });
          
          
          $("#hide").on('click', function() {
                $("#element").hide();
                return false;
            });
         
            $("#show").on('click', function() {
                $("#element").show();
                return false;
            });
            
         
    
    // Detectar cambio en el menú desplegable
    $('#modoRubrica').change(function() {
      // Obtener valor seleccionado
      var valorSeleccionado = $(this).val();
      
      // Mostrar u ocultar el div según el valor seleccionado
      if (valorSeleccionado === 'RA') {
        $('#nivelDiv').removeClass('oculto');
      } else {
        $('#nivelDiv').addClass('oculto');
      }
    });
    })
</script>

        
<script src="<?php echo $serverRubrik ?>js/script.js"></script>
</body>
</html>