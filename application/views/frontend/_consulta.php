<h2 style="color: #000000;font-weight: normal !important;font-size:20px;">Resultados:</h2>

<?php if(!$resultados){ ?>
  <div class="alert alert-warning" role="alert">
    No se han encontrado resultados que mostrar.
  </div>
<?php }else{ ?>
<div class="resultados-container" style="    padding: 15px 30px;
    border: 1px solid #dddddd;
    border-radius: 5px;">
  <dl class="dl-horizontal">
    <dt>Cliente</dt>
    <dd><?php echo $cliente->nombre; ?></dd>
    <dt>CI/RUC</dt>
    <dd><?php echo $cliente->identificacion; ?></dd>
    <dt>Email</dt>
    <dd><?php echo $cliente->email; ?></dd>
  </dl>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Promoción</th>
        <th># de Cupones</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($solicitudes as $solicitud) { ?>
      <tr>
        <td><?php echo $solicitud['promocion'] ?></td>
        <td><?php echo $solicitud['cupones'] ?></td>
        <td><?php echo $solicitud['estado'] ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>