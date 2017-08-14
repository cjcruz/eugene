<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Estadística de Ventas (última semana)</h3>
      <a href="<?php echo site_url('ventas'); ?>" class="btn btn-sm btn-info btn-flat pull-right">Ver todas las ventas</a>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
      <canvas id="areaChart" width="400" height="200"></canvas>
    </div>
    <!-- /.box-body -->
  </div>
</section>
<script>
  var etiquetas = <?php echo json_encode($grafico_x) ?>;
  var ventas = <?php echo json_encode($grafico_y) ?>;
</script>