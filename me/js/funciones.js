$(document).ready(function() {
    $(".previene").click(function(event) {
        event.preventDefault();
        validar();
    });
    $("#email").focus();
});

$(document).on('keypress', function(e) {
    if (e.which == 13) {
        validar();
    }
});


function validar() {

    $("#email").removeClass('input-alerta');
    $("#pwd").removeClass('input-alerta');
    $("#ms-email").addClass('oculto');
    $("#ms-pwd").addClass('oculto');

    var email = "";
    var pwd = "";

    email = $("#email").val();
    pwd = $("#pwd").val();

    if (email == "" && pwd == "") {

        $("#email").addClass('input-alerta');
        $("#pwd").addClass('input-alerta');
        $("#ms-email").removeClass('oculto');
        $("#ms-pwd").removeClass('oculto');

        swal("Debes de llenar todos los campos", "", "info");

    } else if (email == "") {
        $("#email").addClass('input-alerta');
        $("#ms-email").removeClass('oculto');

        swal("Debes de llenar el campo Dirección de correo electrónico", "", "info");

    } else if (pwd == "") {

        $("#pwd").addClass('input-alerta');
        $("#ms-pwd").removeClass('oculto');

        swal("Debes de llenar el campo Contraseña", "", "info");

    } else {
        buscarUsuario(email, pwd);
    }



}


function buscarUsuario(email, pwd) {
    /*acemos ajax*/
    $.ajax({
            type: 'POST',
            /*va enviar el valor por post*/
            url: 'localValidador.php',
            /*url donde se va enviar los datos*/

            data: {
                'email': email,
                'pwd': pwd,
            },

        })
        .done(function(resultado) {            
            var server = location.hostname;
            /*una vez realizada la busqueda envia los resultados la etiequeta que tenga el id result*/
            if (resultado == 0) {
                var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i>¡No estas registrado o los datos no son correctos!<br/><a href="registro.php"> ¿deseas regístrate?</a><br/> o <br/><a href="recordar.php">¿deseas recordar los datos de registro?</a><br/> o <br/><a href="">volver a intentarlo</a></p>',
                    closeButton: false
                });

                // do something in the background
                dialog.modal('hide');
            } else {
                window.location.href = 'https://'+server;                
            }
        })
        .fail(function() {
            /*si la funcion no arroja resultado envia un aler de error*/
            swal("error!", "Algo salio mal", "error");

        })
}



function mostrarPassword(){
    var cambio = document.getElementById("pwd");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

$(document).ready(function () {
//CheckBox mostrar contraseña
$('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
});
});