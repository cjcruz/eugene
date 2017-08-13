<!-- Content Header (Page header) -->
<section class="content-header">
  Solicitudes de Canje de Cupones
  <a class="btn btn-success pull-right" style="margin-right: 5px;" href="<?php echo site_url('cupones/nuevo'); ?>">
    <i class="fa fa-user-plus"></i> Nueva solicitud
  </a>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Cliente</th>
        <th># Facturas</th>
        <th>Estado</th>
        <th>Total de Compras</th>
        <th></th>
      </tr>
    </thead>
  <?php foreach ($solicitudes as $item): ?>
    <tr>
      <td><?php echo $item['fecha']; ?></td>
      <td><?php echo $item['cliente']; ?></td>
      <td><?php echo $item['numero_de_facturas']; ?></td>
      <td>
        <?php if($item['estado'] == 'pendiente'){ ?>
        <span class="label label-warning">Pendiente</span>
        <?php } ?>
      </td>
      <td><?php echo $item['total']; ?></td>
      <td>
        <a href="<?php echo site_url('cupones/mostrar/'.$item['id']); ?>">Ver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
