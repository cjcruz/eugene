<section class="content-header text-right" style="padding-top: 20px;">
  <a class="btn btn-info" style="margin-right: 5px;" href="<?php echo site_url('promociones/'); ?>">
    <i class="fa fa-long-arrow-left"></i> Regresar a Listado
  </a>
  <?php if($promocion->estado == 'activo'){ ?>
  <?php echo form_open( 'promociones/finalizar/'.$promocion->id, array('style'=>'display:inline-block;') ); ?>
    <button type="submit" class="btn btn-success" style="margin-right: 5px;" href="<?php echo site_url('cupones/'); ?>">
      <i class="fa fa-check"></i> Finalizar
    </button>
  </form>
  <?php } ?>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Datos de la Promoción</h3>
    </div>
    <!-- /.box-header -->
    
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt>Nombre</dt>
        <dd><?php echo $promocion->nombre; ?></dd>
        <dt>Descripción</dt>
        <dd><?php echo $promocion->descripcion; ?></dd>
        <dt>Disponible desde</dt>
        <dd><?php echo $promocion->fecha_creacion; ?></dd>
        <?php if($promocion->fecha_finalizacion){ ?>
        <dt>Fecha de Finalización</dt>
        <dd><?php echo $promocion->fecha_finalizacion; ?></dd>
        <?php } ?>
        <dt>Valor del Cupón</dt>
        <dd><?php echo $promocion->valor_cupon; ?></dd>
        <dt>Estado</dt>
        <dd>
          <?php if($promocion->estado == 'activo'){ ?>
          <span class="label label-success">Activo</span>
          <?php }else if($promocion->estado == 'finalizado'){ ?>
          <span class="label label-warning">Finalizado</span>
          <?php }else{ ?>
          <span class="label label-info"><?php echo $promocion->estado; ?></span>
          <?php }?>  
        </dd>
        <dt># de Solicitudes</dt>
        <dd><?php echo $promocion->numero_de_solicitudes; ?></dd>
      </dl>
      
    </div>
    
  </div>

  
</section>