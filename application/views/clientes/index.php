<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Clientes</h1>
  <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo site_url('Clientes/nuevo'); ?>">
    <i class="fa fa-user-plus"></i> Nuevo Cliente
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Nombres</th>
        <th>CI/RUC</th>
        <th>Email</th>
        <th>Cupones</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($clientes as $cliente): ?>
     <tr>
      <td><?php echo $cliente['nombre']; ?></td>
      <td><?php echo $cliente['identificacion']; ?></td>
      <td><?php echo $cliente['email']; ?></td>
      <td><?php echo $cliente['cupones']; ?></td>
      <td>
        <a class="btn btn-warning pull-right" style="margin-right: 5px;" href="<?php echo site_url('Clientes/editar/'.$cliente['id']); ?>">
        <i class="fa fa-edit"></i>Editar</a>
        <a class="btn btn-info pull-right" style="margin-right: 5px;" href="<?php echo site_url('Clientes/ver/'.$cliente['id']); ?>">
        <i class="fa fa-search-plus"></i>Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    