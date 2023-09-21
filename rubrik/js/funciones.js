$(document).ready(function () {
 
    $("img").addClass("img-fluid");

});
  
  
$(".noLoad").click(function (event) {
    event.preventDefault();
});


function send_from() {
    document.formulario.submit();
}

$(".zelda").click(function () {
    var idP = $(this).attr("revali");
    editar(idP);
});

function eliminar(pro, sw) {
swal({
  icon: "info",
  title: "¿Esta seguro que desea eliminar la rúbrica?",
  text: "Una vez eliminado la rúbrica no se podrá recuperar \n¿Esta seguro que desea eliminar la rúbrica?",
  buttons: ["Cancelar ", "Eliminar"],
}).then((value) => {
  if (value) {
    /*acemos ajax*/
    $.ajax({
      type: "POST",
      /*va enviar el valor por post*/
      url: "includes/eliminar.php",
      /*url donde se va enviar los datos*/

      data: {
        est: sw,
        pro: pro,            
      },
      /*los datos que se va a enviar*/
      beforeSend: function () {
        /* esta funcion beforeSend realiza una accion despues del envia de los datos */
        $("#proyectosCuerpo").html(
          '<div class="text-center"><img src="https://eduteka.icesi.edu.co/img/cargando.gif"><br/>Eliminando...</div>'
        ); /*muestra un gif al momento de realizar la busqueda*/
      },
    })
      .done(function (resultado) {
        /*una vez realizada la busqueda envia los resultados la etiequeta que tenga el id result*/
        swal({
          title: "¡Listo!",
          text: "Se eliminó la rúbrica!",
          icon: "success",
        }).then((willDelete) => {
          if (willDelete) {
            location.reload();
          } else {
            location.reload();
          }
        });
      })
      .fail(function () {
        /*si la funcion no arroja resultado envia un aler de error*/

        swal("!!Oops!!", "Hubo un error :(", "info");
      });
  } else {
  }
});
}


function editar(idP) {
    var server = location.hostname;
    //alert(server);
    my_form = document.createElement("FORM");
    my_form.name = "myForm";
    my_form.method = "POST";
    my_form.action = "editar.php";
    
    my_tb = document.createElement("INPUT");
    my_tb.type = "HIDDEN";
    my_tb.name = "idP";
    my_tb.value = idP;
    my_form.appendChild(my_tb);
    
    document.body.appendChild(my_form);
    my_form.submit();

}


$(".ganon").click(function () {
    var idP = $(this).attr("revali"); 
    var Est = $(this).attr("mipha");
    eliminar(idP, Est);
});


