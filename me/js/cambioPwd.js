

$(document).ready(function () {
    $(".previene").click(function (event) {
      event.preventDefault();
    });
    $("#pwd1").focus();
});



$("#cambio").click(function () {



    $("#pwd1").removeClass("input-alerta");
    $("#ms-pwd1").addClass("oculto");

    $("#ms-conPwd2-vigia").addClass("oculto");
  
    $("#pwd2").removeClass("input-alerta");
    $("#ms-conPwd2").addClass("oculto");

    let vali1 = 0;
    let vali2 = 0;
    let vali3 = 0;

    pwd1 = $("#pwd1").val();
    pwd2 = $("#pwd2").val();

    if (pwd1 == "") {
        
        $("#pwd1").addClass("input-alerta");
        $("#ms-pwd1").removeClass("oculto");
        vali1 = 0;
      } else {
        if (validarClave(pwd1)) {      
          vali1 = 1;
        } else {            
          vali1 = 0;
        }
      }
    
      if (pwd2 == "") {
        
        $("#pwd2").addClass("input-alerta");
        $("#ms-conPwd2").removeClass("oculto");
        vali2 = 0;
      } else {
        vali2 = 1;
      }
    
      if (pwd1 != pwd2) {
        
        $("#pwd2").addClass("input-alerta");
        $("#ms-conPwd2-vigia").removeClass("oculto");
        vali3 = 0;
      } else {
        vali3 = 1;
      }

      if(vali1 == 1 && vali2 == 1 && vali3 == 1){
        var form = document.getElementById("fomularioCambio");
        form.submit();
      }

 
  });




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
      swal("alerta!", "la contraseña debe de tener almenos uno de estos caracteres @#$%^&*+- ", "warning");
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