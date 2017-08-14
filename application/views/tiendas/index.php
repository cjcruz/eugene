<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Tiendas</h1>
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
        <a href="<?php echo site_url('establecimientos/'.$item['id']); ?>">Editar</a>
        <a href="<?php echo site_url('establecimientos/'.$item['id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    