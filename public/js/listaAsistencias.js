$(function(){

  $('#lista-Institucion').on('change',onSelectInstitucionChange);

});

function onSelectInstitucionChange(){
  var institucion_id = $(this).val();
  //$.getJSON("musica/show", function(data)
  $.get("/api/sedes/"+institucion_id+"/sedes", function(data){
      $('#lista-Sede').empty();
      $('#lista-Sede').append("<option disabled selected>Seleccione sede</option>");
    for (var i = 0; i < data.length; i++){
      $('#lista-Sede').append("<option value='"+data[i].id+"'>"+data[i].nombre+"</option>");
    }
  });


}
