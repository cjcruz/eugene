
<?php if($mostrar_exito){ ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    La solicitud de cupones ha sido <strong>guardada</strong> con éxito.
  </div>
<?php } ?>

<?php if($mostrar_aprobacion){ ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    La solicitud ha sido <strong>aprobada</strong> con éxito.
  </div>
<?php } ?>

<section class="content-header text-right" style="padding-top: 20px;">
  <a class="btn btn-info" style="margin-right: 5px;" href="<?php echo site_url('cupones/'); ?>">
    <i class="fa fa-long-arrow-left"></i> Regresar a Listado
  </a>
  <?php if($solicitud->estado == 'pendiente'){ ?>
  <?php echo form_open( 'cupones/aprobar/'.$solicitud->id, array('style'=>'display:inline-block;') ); ?>
    <button type="submit" class="btn btn-success" style="margin-right: 5px;" href="<?php echo site_url('cupones/'); ?>">
      <i class="fa fa-check"></i> Aprobar
    </button>
  </form>
  <?php } ?>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Datos de la solicitud de cupones</h3>
    </div>
    <!-- /.box-header -->
    
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt>Fecha</dt>
        <dd><?php echo $solicitud->fecha; ?></dd>
        <dt>Promoción</dt>
        <dd><?php echo $solicitud->promocion; ?></dd>
        <dt>Cliente</dt>
        <dd><?php echo $solicitud->cliente; ?></dd>
        <dt>Estado</dt>
        <dd>
          <?php if($solicitud->estado == 'pendiente'){ ?>
          <span class="label label-warning">Pendiente</span>
          <?php }else if($solicitud->estado == 'aprobado'){ ?>
          <span class="label label-success">Aprobado</span>
          <?php }else{ ?>
          <span class="label label-info"><?php echo $solicitud->estado; ?></span>
          <?php }?>  
        </dd>
        <dt># de Facturas</dt>
        <dd><?php echo $solicitud->numero_de_facturas; ?></dd>
        <dt>Total de Compras</dt>
        <dd><?php echo $solicitud->total; ?></dd>

        <?php if($solicitud->estado == 'aprobado'){ ?>
        <dt>Cupones ganados</dt>
        <dd><?php echo $solicitud->cupones; ?></dd>
        <?php } ?>
      </dl>
      
    </div>
    
  </div>

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Detalle de Compras de Cliente</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table">
        <thead>
          <tr>
            <th>Tienda</th>
            <th>Fecha de emisión</th>
            <th>Número</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($facturas as $factura) { ?>
          <tr>
            <td><?php echo $factura['tienda']; ?></td>
            <td><?php echo $factura['fecha_emision']; ?></td>
            <td><?php echo $factura['numero']; ?></td>
            <td><?php echo $factura['total']; ?></td>
          </tr>            
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    
  </div>
</section>