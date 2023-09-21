$(document).ready(function() {

    $("#cbx_materia").change(function() {

        $("#cbx_materia option:selected").each(function() {
            idArea = $(this).val();
            $.post("includes/getAsignatura.php", {
                idArea: idArea
            }, function(data) {
                $("#cbx_asignatura").html(data);

            });
        });
    })



    var ventana_ancho = $(window).width();


    if (ventana_ancho <= 500) {

        CKEDITOR.replace('descripcion', {
            toolbar: [
                { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates'] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.            																					
                { name: 'basicstyles', items: ['Bold', 'Italic'] }
            ]
        });


        CKEDITOR.replace('evaluacion', {
            toolbar: [
                { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates'] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.            																					
                { name: 'basicstyles', items: ['Bold', 'Italic'] }
            ]
        });

  
    } else {
        CKEDITOR.replace('descripcion');
        CKEDITOR.replace('evaluacion');
    }


});