$(document).ready(function () { 

    var ventana_ancho = $(window).width();

    if(ventana_ancho <= 500){
        $(".laterales").remove();
        $(".central").removeClass("col-sm-12 col-md-10");
        $(".botones-qw").removeClass("ml-5");
        $(".botones-pw").removeClass("ml-3");       
    }

});


function verMas() {
    $(".prevenir").click(function(event) {
        event.preventDefault();
    });
    $('#mas').addClass('oculto');
    $('#menos').removeClass('oculto');
    $('#filtro').removeClass('oculto');
    $('#filtro').addClass('efecto-ingreso');
    $('#filtro').removeClass('efecto-salida');

}


function verMenos() {
    $(".prevenir").click(function(event) {
        event.preventDefault();
    });

    $('#mas').removeClass('oculto');
    $('#menos').addClass('oculto');
    $('#filtro').removeClass('efecto-ingreso');
    $('#filtro').addClass('efecto-salida');
    /* $('#filtro-' + dato).addClass('oculto'); */

    window.setTimeout(ocultar, 700);

    function ocultar() {
        $('#filtro').addClass('oculto');
    }

}