var institucion_id ="node";

$(function(){
  $('#lista-Institucion').on('change',onSelectInstitucionChange);
});


function onSelectInstitucionChange(){
institucion_id = $(this).val();
//console.log(institucion_id);
}



$(function() {
    $(".chosen-select").chosen({
      no_results_text: "No se encuentra resultados->",
      width: "95%"
    });
});


$('.boton').on('click', function(){

$('#tabla tr:not(:first-child)').slice(0).remove();

  $.get("/api/sedes/"+institucion_id+"/sedes", function(data){

  for (var i = 0; i < data.length; i++){

  $('#tabla > tbody:last-child').append('<tr><td>'+'<a value="">'+data[i]+'</a>'+
  '</td><td>'+'<a class="link" href="/institucion/cargarInfoAlimentos/'+data[i]+'">Descargar</a>'+'</td></tr>');
  }

})});


$('.boton2').on('click', function(){

$('#tabla tr:not(:first-child)').slice(0).remove();

  $.get("/api/sedes/"+institucion_id+"/asistenaicas", function(data){

  for (var i = 0; i < data.length; i++){

  $('#tabla > tbody:last-child').append('<tr><td>'+'<a value="">'+data[i]+'</a>'+
  '</td><td>'+'<a class="link" href="/institucion/cargarInfoAlimentos/'+data[i]+'">Descargar</a>'+'</td></tr>');
  }

})});
