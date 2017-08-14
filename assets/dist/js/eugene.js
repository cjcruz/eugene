$(document).ready(function(){
  $('.date-picker-control').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  $(".select2").select2();

  $("[data-mask]").inputmask();

  $("form.execute-validation").validate({});

  function formatCliente (cliente) {
    if (cliente.loading) return 'Buscando...';

    var markup = "<div class='cliente-dropdown-item clearfix'>" +
        "<div class='cliente-dropdown-item-title'>" + cliente.nombre + "</div>";

    markup += "<div class='cliente-dropdown-item-info'>" +
      "<div class='cliente-dropdown-item-id'><i class='fa fa-id-card'></i> " + cliente.identificacion + "</div>" +
      "<div class='cliente-dropdown-item-email'><i class='fa fa-envelope'></i> " + cliente.email + "</div>" +
      "<div class='cliente-dropdown-item-telefono'><i class='fa fa-phone'></i> " + cliente.telefono + "</div>" +
    "</div>" +
    "</div>";

    return markup;
  }

  function formatClienteSeleccionado (cliente) {
    return cliente.nombre;
  }

  function crearFacturaIngresoLinea(id){
    return '<tr id="'+id+'">\
              <td>\
                <div class="input-group">\
                  <div class="input-group-addon">\
                    <i class="fa fa-home"></i>\
                  </div>\
                  <select name="facturas['+id+'][tienda_id]" id="tienda_'+id+'" class="form-control tienda" style="width:100%;" required></select>\
                </div>\
              </td>\
              <td>\
                <div class="input-group">\
                  <div class="input-group-addon">\
                    <i class="fa fa-hashtag"></i>\
                  </div>\
                  <input required type="text" name="facturas['+id+'][numero]" class="form-control factura-numero" data-inputmask="\'mask\': \'999-999-999999999\'" id="factura_'+id+'" data-mask/>\
                </div>\
              </td>\
              <td>\
                <div class="input-group date">\
                  <div class="input-group-addon">\
                    <i class="fa fa-calendar"></i>\
                  </div>\
                  <input required type="text" name="facturas['+id+'][fecha_emision]" id="fecha_'+id+'" placeholder="Fecha" class="form-control fecha" data-date-format="yyyy-mm-dd"/>\
                </div>\
              </td>\
              <td>\
                <div class="input-group">\
                  <div class="input-group-addon">\
                    <i class="fa fa-usd"></i>\
                  </div>\
                  <input required type="number" step="0.01" name="facturas['+id+'][total]" id="total_'+id+'" placeholder="Total de la compra" class="form-control"/>\
                </div>\
              </td>\
              <td>\
                <button type="button" class="btn btn-link btn-quitar-factura" data-factura-id="'+id+'"><i class="fa fa-trash" aria-hidden="true"></i> Quitar</button>\
              </td>\
            </tr>';
  }


  $(".solicitud-cupon select.cliente").select2({
    ajax: {
      url: "http://localhost/eugene/clientes/listar_para_ajax_drowpdown",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      },
      cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 3,
    templateResult: formatCliente,
    templateSelection: formatClienteSeleccionado
  });

  $('.solicitud-cupon .btn-agregar-factura').click(function(){
    if(typeof facturas_contador === 'undefined') facturas_contador = 0;
    var fila = crearFacturaIngresoLinea(facturas_contador);
    var tabla = '.solicitud-cupon table tbody';
    $(tabla).append(fila);
    selector = tabla + ' tr#'+facturas_contador;
    $(selector+' select.tienda').select2({data: tiendas});
    $(selector+' .factura-numero').inputmask();
    $(selector+' .factura-numero').rules('add', {
      factura: true
    });
    
    $(selector+' .fecha').datepicker({autoclose: true});
    $(selector+' .btn-quitar-factura').click(function(){
      var fila_actual = $(this).data('facturaId');
      $(tabla+' tr#'+fila_actual).remove();
    });
    

    facturas_contador++;
  });

  $.validator.addMethod( "factura", function( value, element ) {
    if ( this.optional( element ) ) {
      return true;
    }
    param = new RegExp( "^(?:[0-9]{3}-[0-9]{3}-[0-9]{9})$" );
    return param.test( value );
  }, "Numero de factura incorrecto." );

  $('form.solicitud-cupon').validate({ 

    errorPlacement: function(error, element) {
      if( element.hasClass('cliente') || element.hasClass('promocion') ){
        error.appendTo( element.parent() );
      }else{
        error.appendTo( element.closest("td") );
      }
    },

    submitHandler: function(form) {
      if($('table.facturas-cliente tbody tr').length == 0){
        $('#modal-warning').modal({});
        return false;
      }
      form.submit();
    }

  });

  $('form.solicitud-cupon .btn-guardar').click(function(){
    $('form.solicitud-cupon').attr('action', '/eugene/cupones/crear');
  });

  $('form.solicitud-cupon .btn-guardar-y-aprobar').click(function(){
    $('form.solicitud-cupon').attr('action', '/eugene/cupones/crear_y_aprobar');
  });


  // Get context with jQuery - using jQuery's .get() method.
  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
  // This will get the first returned node in the jQuery collection.
  var areaChart       = new Chart(areaChartCanvas)

  var areaChartData = {
    labels  : etiquetas,
    datasets: [
      {
        label               : 'Ventas',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : ventas
      }
    ]
  }

  var areaChartOptions = {
    //Boolean - If we should show the scale at all
    showScale               : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - Whether the line is curved between points
    bezierCurve             : true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot                : false,
    //Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  }

  //Create the line chart
  areaChart.Line(areaChartData, areaChartOptions)

});