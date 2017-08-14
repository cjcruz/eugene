<!-- Content Header (Page header) -->
<section class="content-header">
  Ranking de Tiendas
</section>

<!-- Main content -->
<section class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Posición</th>
        <th>Tienda</th>
        <th>Ventas</th>
      </tr>
    </thead>
  <?php foreach ($ranking as $index => $item): ?>
    <tr>
      <td><?php echo $index+1; ?></td>
      <td><?php echo $item['tienda']; ?></td>
      <td><?php echo $item['ventas']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</section>
<!-- /.content -->
    