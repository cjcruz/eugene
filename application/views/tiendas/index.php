<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Tiendas</h1>
  <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo site_url('Tiendas/nuevo'); ?>">
    <i class="fa fa-user-plus"></i> Nueva Tienda
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($establecimientos as $item): ?>
    <tr>
      <td><?php echo $item['nombre']; ?></td>
      <td><?php echo $item['ubicacion']; ?></td>
      <td><?php echo $item['telefono']; ?></td>
      <td><?php echo $item['email']; ?></td>
      <td>
        <a class="btn btn-warning pull-right" style="margin-right: 5px;" href="<?php echo site_url('Tiendas/editar/'.$item['id']); ?>">
        <i class="fa fa-edit"></i>Editar</a>
        <a class="btn btn-info pull-right" style="margin-right: 5px;" href="<?php echo site_url('Tiendas/ver/'.$item['id']); ?>">
        <i class="fa fa-search-plus"></i>Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->