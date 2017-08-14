<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Usuarios</h1>
  <a class="btn btn-success pull-right" style="margin-right: 5px;" href="<?php echo site_url('usuarios/nuevo'); ?>">
    <i class="fa fa-user-plus"></i> Nuevo usuario
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($usuarios as $usuario): ?>
    <tr>
      <td><?php echo $usuario['username']; ?></td>
      <td><?php echo $usuario['email']; ?></td>
      <td><?php echo $this->Usuario_model->getRol($usuario['auth_level']); ?></td>
      <td>
        <a href="<?php echo site_url('clientes/'.$usuario['user_id']); ?>">Editar</a>
        <a href="<?php echo site_url('clientes/'.$usuario['user_id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    