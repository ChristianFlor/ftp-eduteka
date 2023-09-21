$(document).ready(function() {

    var indicador = 0;

    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
        if (indicador == 0) {
            $('#menu-opc').removeClass("oculto");
            $('#menu-opc').addClass('slit-in-vertical');
            indicador = 1;
        } else {
            indicador = 0;
            $('#menu-opc').addClass("oculto");
            $('#menu-opc').removeClass('slit-in-vertical');
        }

    });

    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    })




});