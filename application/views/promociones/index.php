<!-- Content Header (Page header) -->
<section class="content-header">
  Solicitudes de Cupones
  <a class="btn btn-success pull-right" style="margin-right: 5px;" href="<?php echo site_url('promociones/nuevo'); ?>">
    <i class="fa fa-user-plus"></i> Nueva Promoción
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Fecha Inicio</th>
        <th>Fecha Finalización</th>
        <th>Estado</th>
        <th># Solicitudes</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($promociones as $item): ?>
    <tr>
      <td><?php echo $item['nombre']; ?></td>
      <td><?php echo $item['fecha_inicio']; ?></td>
      <td><?php echo $item['fecha_fin']; ?></td>
      <td>
        <?php if($item['estado'] == 'activo'){ ?>
        <span class="label label-success">Activo</span>
        <?php }else if($item['estado'] == 'cerrado'){ ?>
        <span class="label label-warning">Cerrado</span>
        <?php } ?>
      </td>
      <td></td>
      <td>
        <a href="<?php echo site_url('promociones/mostrar/'.$item['id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
