var $ = jQuery;
$(document).ready(function(){
  $('form.cupones-form').submit(function(){
    var ci = $('.busqueda').val();
    var jqxhr = $.get( "/eugene/frontend/consulta", { ci: ci })
    .done(function(html){
      $('.cupones-resultados').html(html);
    })
    .fail(function() {
      alert( "error" );
    })
 
    return false;
  });
});