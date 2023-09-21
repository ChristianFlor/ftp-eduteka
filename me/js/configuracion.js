$(document).ready(function () {
    $(".previene").click(function (event) {
      event.preventDefault();
    });
    $("#correo").focus();
  });
  
  
  
  
  $("#p1").click(function () {
    $("#step2").removeClass("oculto");
    $("#step1").addClass("oculto");

    $("#step2").addClass("scale-in-hor-left ");
    $("#step1").removeClass("scale-in-hor-left ");

    $("#cuadro1").removeClass("activo-paso");
    $("#cuadro1").addClass("done-paso");
    $("#linea1").addClass("activo-linea");
    $("#linea1").addClass("done-linea");
    $("#txt1").addClass("done-subtexto");
    $("#txt11").addClass("done-subtexto");

    $("#cuadro2").addClass("activo-paso");
    $("#linea2").addClass("activo-linea");

    $("#linea21").addClass("activo-linea");

    $("#nombre").focus();
  
 
  });
  
  
  
  
  
  
  $("#b1").click(function () {
    $("#step1").removeClass("oculto");
    $("#step2").addClass("oculto");
  
    $("#step1").addClass("scale-in-hor-left ");
    $("#step2").removeClass("scale-in-hor-left ");
  
    $("#cuadro1").addClass("activo-paso");
    $("#cuadro1").removeClass("done-paso");
    $("#linea1").addClass("activo-linea");
    $("#linea1").removeClass("done-linea");
  
    $("#txt1").removeClass("done-subtexto");
    $("#txt11").removeClass("done-subtexto");
  
    $("#cuadro2").removeClass("activo-paso");
    $("#linea2").addClass("activo-linea");
  
    $("#correo").focus();
  });
  
  
  
  $("#p2").click(function () {
    let vali = validarPaso2();
  
    if (vali == 1) {
      $("#step3").removeClass("oculto");
      $("#step2").addClass("oculto");
      $("#step1").addClass("oculto");
  
      $("#step3").addClass("scale-in-hor-left ");
      $("#step2").removeClass("scale-in-hor-left ");
      $("#step1").removeClass("scale-in-hor-left ");
  
      $("#cuadro1").removeClass("activo-paso");
      $("#cuadro1").addClass("done-paso");
      $("#linea1").addClass("activo-linea");
      $("#linea1").addClass("done-linea");
      $("#txt1").addClass("done-subtexto");
      $("#txt11").addClass("done-subtexto");
  
      $("#cuadro2").removeClass("activo-paso");
      $("#cuadro2").addClass("done-paso");
      $("#linea2").addClass("done-linea");
      $("#linea21").addClass("done-linea");
      $("#txt2").addClass("done-subtexto");
      $("#txt21").addClass("done-subtexto");
  
      $("#cuadro3").addClass("activo-paso");
      $("#linea3").addClass("activo-linea");
      $("#linea31").addClass("activo-linea");
  
      $("#cargo").focus();
    }
  });
  
  $("#b2").click(function () {
    $("#step1").addClass("oculto");
    $("#step3").addClass("oculto");
    $("#step2").removeClass("oculto");
  
    $("#step1").removeClass("scale-in-hor-left");
    $("#step3").removeClass("scale-in-hor-left");
    $("#step2").addClass("scale-in-hor-left");
  
    $("#cuadro2").addClass("activo-paso");
    $("#cuadro2").removeClass("done-paso");
    $("#linea2").addClass("activo-linea");
    $("#linea21").addClass("activo-linea");
    $("#linea2").removeClass("done-linea");
    $("#linea21").removeClass("done-linea");
  
    $("#txt1").removeClass("done-subtexto");
    $("#txt11").removeClass("done-subtexto");
  
    $("#txt2").removeClass("done-subtexto");
    $("#txt21").removeClass("done-subtexto");
  
    $("#cuadro3").removeClass("activo-paso");
    $("#linea3").addClass("activo-linea");
  
    $("#nombre").focus();
  });
  
  function validarPaso2() {
    $("#nombre").removeClass("input-alerta");
    $("#ms-nombre").addClass("oculto");
  
    var nombre = "";
  
    nombre = $("#nombre").val(); 
  
    if (nombre == "") {
      $("#nombre").addClass("input-alerta");
      $("#ms-nombre").removeClass("oculto");
    } else {
      return 1;
    }
  }
  
  $("#p3").click(function () {
    
  
    $("#step4").removeClass("oculto");
    $("#step3").addClass("oculto");
    $("#step2").addClass("oculto");
    $("#step1").addClass("oculto");
  
    $("#step4").addClass("scale-in-hor-left ");
    $("#step3").removeClass("scale-in-hor-left ");
    $("#step2").removeClass("scale-in-hor-left ");
    $("#step1").removeClass("scale-in-hor-left ");
  
    $("#cuadro1").removeClass("activo-paso");
    $("#cuadro1").addClass("done-paso");
    $("#linea1").addClass("activo-linea");
    $("#linea1").addClass("done-linea");
    $("#txt1").addClass("done-subtexto");
    $("#txt11").addClass("done-subtexto");
  
    $("#cuadro2").removeClass("activo-paso");
    $("#cuadro2").addClass("done-paso");
    $("#linea2").addClass("done-linea");
    $("#linea21").addClass("done-linea");
    $("#txt2").addClass("done-subtexto");
    $("#txt21").addClass("done-subtexto");
  
    $("#cuadro3").removeClass("activo-paso");
    $("#cuadro3").addClass("done-paso");
    $("#linea3").addClass("done-linea");
    $("#linea31").addClass("done-linea");
    $("#txt3").addClass("done-subtexto");
    $("#txt31").addClass("done-subtexto");
  
    $("#cuadro4").addClass("activo-paso");
    $("#linea4").addClass("activo-linea");
  
    // Crear un array con la función constructora
    const arrayManterias = new Array();
    arrayManterias[1] = "Informática";
    arrayManterias[2] = "Lenguaje";
    arrayManterias[3] = "Matemáticas";
    arrayManterias[4] = "Ciencias Naturales";
    arrayManterias[5] = "Ciencias Sociales";
    arrayManterias[6] = "Arte";
    arrayManterias[7] = "Humanidades";
    arrayManterias[8] = "Idiomas Extranjeros";
    arrayManterias[9] = "Comercio";
    arrayManterias[10] = "Otra(s)";
  
    // Crear un array con la función constructora
    const arrayGrados = new Array();
    arrayGrados[1] = "Preescolar";
    arrayGrados[2] = "Básica Primaria (1°-5°)";
    arrayGrados[3] = "Básica Secundaria (6°-9°)";
    arrayGrados[4] = "Media (10°-11°)";
    arrayGrados[5] = "Superior";
    arrayGrados[6] = "Otro";
  
    const reNombre = $("#reNombre");
    reNombre.text($("#nombre").val());
  
    const reCorreo = $("#reCorreo");
    reCorreo.text($("#correo").val());
  
    let textoPais = $('select[name="pais"] option:selected').text();
  
    const reUbicacion = $("#reUbicacion");
    reUbicacion.text(
      $("#ciudad").val() + ", " + textoPais
    );
  
    const reIntitucion = $("#reIntitucion");
    reIntitucion.text($("#colegio").val());
  
    // Seleccionamos los elementos checkbox por su atributo name
    const miCheckboxArray = $('input[name="materias[]"]');
  
    // Obtenemos los valores de los elementos checkbox utilizando la función map() de jQuery
    const valores = miCheckboxArray
      .map(function () {
        if (this.checked) {
          return this.value;
        }
      })
      .get();
  
    let acumulador = "";
    for (let i = 0; i < valores.length; i++) {
      acumulador += arrayManterias[valores[i]] + " - ";
    }
  
    acumulador = acumulador.slice(0, -2);
  
    const reMaterias = $("#reMaterias");
    reMaterias.text(acumulador);
  
    // Seleccionamos los elementos checkbox por su atributo name
    const miCheckboxArrayGrados = $('input[name="grados[]"]');
  
    // Obtenemos los valores de los elementos checkbox utilizando la función map() de jQuery
    const valoresGrados = miCheckboxArrayGrados
      .map(function () {
        if (this.checked) {
          return this.value;
        }
      })
      .get();
  
    let acumuladorGrados = "";
    for (let i = 0; i < valoresGrados.length; i++) {
      acumuladorGrados += arrayGrados[valoresGrados[i]] + " - ";
    }
  
    acumuladorGrados = acumuladorGrados.slice(0, -2);
  
    const reGrados = $("#reGrados");
    reGrados.text(acumuladorGrados);
  });


  
  
  $("#b3").click(function () {
    $("#step1").addClass("oculto");
    $("#step2").addClass("oculto");
    $("#step4").addClass("oculto");
    $("#step3").removeClass("oculto");
  
    $("#step1").removeClass("scale-in-hor-left");
    $("#step2").removeClass("scale-in-hor-left");
    $("#step4").removeClass("scale-in-hor-left");
    $("#step3").addClass("scale-in-hor-left");
  
    $("#cuadro3").addClass("activo-paso");
    $("#cuadro3").removeClass("done-paso");
    $("#linea3").addClass("activo-linea");
    $("#linea31").addClass("activo-linea");
    $("#linea3").removeClass("done-linea");
    $("#linea31").removeClass("done-linea");
  
    $("#txt2").removeClass("done-subtexto");
    $("#txt21").removeClass("done-subtexto");
  
    $("#txt3").removeClass("done-subtexto");
    $("#txt31").removeClass("done-subtexto");
  
    $("#cuadro4").removeClass("activo-paso");
    $("#linea4").addClass("activo-linea");
  
    $("#cargo").focus();
  });
  
  $("#finalizar").click(function () {
    
    var form = document.getElementById("datosActualizar");
    form.submit();
    
  });
  

  