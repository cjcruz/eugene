<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Ventas</h1>
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Tienda</th>
        <th>Fecha de Emisión</th>
        <th>Número</th>
        <th>Total</th>
      </tr>
    </thead>
  <?php foreach ($facturas as $item): ?>
    <tr>
      <td><?php echo $item['tienda']; ?></td>
      <td><?php echo $item['fecha_emision']; ?></td>
      <td><?php echo $item['numero']; ?></td>
      <td><?php echo $item['total']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    