$(document).ready(function () {
  $(".previene").click(function (event) {
    event.preventDefault();
  });
  $("#correo").focus();
});




$("#p1").click(function () {
  var validar = validarPaso1();

  if (validar == 1) {

    /* 
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
   */
    let correo = "";
    correo = $("#correo").val();
    validarExistenciaCorreo(correo);
  }
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




function validarPaso1() {
  $("#correo").removeClass("input-alerta");
  $("#ms-correo").addClass("oculto");

  $("#conCorreo").removeClass("input-alerta");
  $("#ms-conCorreo").addClass("oculto");
  $("#ms-conCorreo-vigia").addClass("oculto");

  $("#pwd").removeClass("input-alerta");
  $("#ms-pwd").addClass("oculto");
  $("#ms-conPwd-vigia").addClass("oculto");

  $("#conPwd").removeClass("input-alerta");
  $("#ms-conPwd").addClass("oculto");

  /* Para obtener el valor */
  let correo = "";
  let valCorreo = "";
  let pwd = "";
  let valPwd = "";

  let vali1 = 0;
  let vali2 = 0;
  let vali3 = 0;
  let vali4 = 0;
  let vali5 = 0;
  let vali6 = 0;

  correo = $("#correo").val();
  valCorreo = $("#conCorreo").val();
  pwd = $("#pwd").val();
  valPwd = $("#conPwd").val();

  if (correo == "") {
    $("#correo").addClass("input-alerta");
    $("#ms-correo").removeClass("oculto");
    $("#correo").focus();
    vali1 = 0;
  } else {
    if (validarCorreo(correo)) {
      vali1 = 1;
    } else {
      swal("Oops", "Correo no valido", "info");
      vali1 = 0;
    }
  }

  if (valCorreo == "") {
    $("#conCorreo").focus();
    $("#conCorreo").addClass("input-alerta");
    $("#ms-conCorreo").removeClass("oculto");
    vali2 = 0;
  } else {
    vali2 = 1;
  }

  if (correo != valCorreo) {
    $("#conCorreo").focus();
    $("#conCorreo").addClass("input-alerta");
    $("#ms-conCorreo-vigia").removeClass("oculto");
    vali3 = 0;
  } else {
    vali3 = 1;
  }

  if (pwd == "") {
    $("#pwd").focus();
    $("#pwd").addClass("input-alerta");
    $("#ms-pwd").removeClass("oculto");
    vali4 = 0;
  } else {
    if (validarClave(pwd)) {      
      vali4 = 1;
    } else {            
      vali4 = 0;
    }
  }

  if (valPwd == "") {
    $("#conPwd").focus();
    $("#conPwd").addClass("input-alerta");
    $("#ms-conPwd").removeClass("oculto");
    vali5 = 0;
  } else {
    vali5 = 1;
  }

  if (pwd != valPwd) {
    $("#conPwd").focus();
    $("#conPwd").addClass("input-alerta");
    $("#ms-conPwd-vigia").removeClass("oculto");
    vali6 = 0;
  } else {
    vali6 = 1;
  }

  if (vali1 == 1 && vali2 == 1 && vali3 == 1 &&  vali4 == 1 && vali5 == 1 && vali6 == 1) {
    return 1;
  }else{
    return 0;
  }
}

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

  /*     $("#genero").removeClass('input-alerta');
    $("#ms-genero").addClass('oculto');

    $("#pais").removeClass('input-alerta');
    $("#ms-pais").addClass('oculto');
   
    $("#ciudad").removeClass('input-alerta');
    $("#ms-ciudad").addClass('oculto');
   
    $("#colegio").removeClass('input-alerta');
    $("#ms-colegio").addClass('oculto');
 */

  var nombre = "";
  /*     var genero = 0;
    var pais = 0;
    var ciudad = "";
    var colegio = ""; */

  nombre = $("#nombre").val();
  /*     ciudad = $("#ciudad").val();
    colegio = $("#colegio").val();    
    genero = document.getElementById("genero").value;
    pais = document.getElementById("pais").value;
 */

  if (nombre == "") {
    $("#nombre").addClass("input-alerta");
    $("#ms-nombre").removeClass("oculto");
  } else {
    return 1;
  }
}

$("#p3").click(function () {
  $("#acepto").focus();

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
  var checkbox = document.getElementById("acepto");

  if (checkbox.checked) {
    var form = document.getElementById("datosRegistro");
    form.submit();
  } else {
    swal(
      "Oops",
      "Es necesario aceptar las políticas de uso de datos de Eduteka",
      "info"
    );
    $("#acepto").focus();
  }
});

function validarExistenciaCorreo(correo) {
  /*acemos ajax*/

  $.ajax({
    type: "POST",
    /*va enviar el valor por post*/
    url: "validadorCorreo.php",
    /*url donde se va enviar los datos*/

    data: {
      correo: correo,
    },
  })
    .done(function (resultado) {
      /*una vez realizada la busqueda envia los resultados la etiequeta que tenga el id result*/
      if (resultado != 0) {
        swal("Oops!", "El correo fue resgistrado anteirormente", "warning");
        
      } else {
        
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

      }
    })
    .fail(function () {
      /*si la funcion no arroja resultado envia un aler de error*/
      swal("error!", "Algo salio mal", "error");
    });
}

function validarCorreo(correo) {
  // Expresión regular para validar correos electrónicos
  const expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return expresionRegular.test(correo);
}

function validarClave(cadena) {

  const regex = /[!@#$%^&*+-]/;
  let v1 = 0;
  let v2 = 0;
  let v3 = 0;
  let v4 = 0;
  let v5 = 0;

  if (regex.test(cadena)) {        
    v1 = 1;
  } else {
    swal("alerta!", "la contraseña debe de tener almenos uno de estos caracteres @#$%^&* ", "warning");
    v1 = 0;
  }

  const regexNum = /\d/;

  if (regexNum.test(cadena)) {    
    v2 = 1;
  } else {
    swal("alerta!", "la contraseña debe de tener almenos uno un número", "warning");
    v2 = 0;
  }

  if (cadena.length >= 8) {    
    v3 = 1;
  } else {
    swal("alerta!", "la contraseña debe de contener como minimo 8 caracteres", "warning");
    v3 = 0;
  }

  if (/\s/.test(cadena)) {    
    v4 = 0;
    swal("alerta!", "la contraseña no debe de tener espacios en blanco", "warning");
  } else {    
    v4 = 1;
  }


  let regexEspecial = /[="'><.]/;

  if (regexEspecial.test(cadena)) {
    swal("alerta!", "la contraseña no debe de tener estos caracteres ='>.<", "warning");
    v5 = 0;
  } else {
    v5 = 1;
  }



  if(v1 == 1 && v2 == 1 && v3 == 1 && v4 == 1 && v5 == 1){
    return true;    
  }else{    
    return false;
  }



}
