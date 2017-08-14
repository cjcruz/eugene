<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Últimas solicitudes de canje de cupones </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <div class="box-body">
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
            <?php }else if($item['estado'] == 'aprobado'){  ?>
            <span class="label label-success">Aprobado</span>
            <?php }else{ ?>
            <span class="label label-info"><?php echo $item['estado'] ?></span>
            <?php } ?>
          </td>
          <td><?php echo $item['total']; ?></td>
          <td>
            <a href="<?php echo site_url('cupones/mostrar/'.$item['id']); ?>">Ver</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="<?php echo site_url('cupones/nuevo'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Nueva Solicitud</a>
      <a href="<?php echo site_url('cupones'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las solicitudes</a>
    </div>
  </div>
</section>