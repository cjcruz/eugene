<!-- Content Header (Page header) -->
<section class="content-header">
  Listado de Promociones
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
        <th>Disponible desde</th>
        <th>Fecha Finalización</th>
        <th>Valor del Cupón</th>
        <th>Estado</th>
        <th># Solicitudes</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($promociones as $item): ?>
    <tr>
      <td><?php echo $item['nombre']; ?></td>
      <td><?php echo $item['fecha_creacion']; ?></td>
      <td><?php echo $item['fecha_finalizacion']; ?></td>
      <td><?php echo $item['valor_cupon']; ?></td>
      <td>
        <?php if($item['estado'] == 'activo'){ ?>
        <span class="label label-success">Activo</span>
        <?php }else if($item['estado'] == 'finalizado'){ ?>
        <span class="label label-warning">Finalizado</span>
        <?php }else{ ?>
        <span class="label label-info"><?php echo $item['estado']; ?></span>
        <?php } ?>
      </td>
      <td><?php echo $item['numero_de_solicitudes']; ?></td>
      <td>
        <a href="<?php echo site_url('promociones/mostrar/'.$item['id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
