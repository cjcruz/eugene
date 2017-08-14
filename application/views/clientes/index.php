<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Clientes</h1>
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
        <a href="<?php echo site_url('clientes/'.$cliente['id']); ?>">Editar</a>
        <a href="<?php echo site_url('clientes/'.$cliente['id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    