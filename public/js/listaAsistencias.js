$(function(){
  $('#lista-Institucion').on('change',onSelectInstitucionChange);
});


function onSelectInstitucionChange(){
var institucion_id = $(this).val();
console.log(institucion_id);
}



$(function() {
    $(".chosen-select").chosen({
      no_results_text: "No se encuentra resultados->",
      width: "95%"
    });
});
