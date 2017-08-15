<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>CONTROL DEL PARQUEO</h1>
  <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo site_url('/parqueoc'); ?>">
    <i class="fa fa-user-plus"></i> Actualizar
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Placa</th>
        <th>Hora de entrada</th>
        <th>Estado</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($establecimientos as $item): ?>
    <tr>
      <td><?php echo $item['parqueo_placa']; ?></td>
      <td><?php echo $item['parqueo_fentrada']; ?></td>
      <td><?php echo $item['parqueo_status']; ?></td>
      <td>
        <a class="btn btn-info pull-right" style="margin-right: 5px;" href="<?php echo site_url('Parqueoc/ver/'.$item['parqueo_id']); ?>">
        <i class="fa fa-search-plus"></i>Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->