$(document).ready(function () {
   // sin
    if (screen.width < 800) {
      $(".sizeNoSee").addClass("oculto");
    }
  
  $(".partes").hide();
  $("#paso1").show();
  

    // Initialize tooltip component
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  
  // Initialize popover component
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
  


    
});