<section class="content-header" style="margin-bottom: 10px;">
  &nbsp;
  <a class="btn btn-info pull-right" style="margin-right: 5px;margin-bottom: 10px;" href="<?php echo site_url('cupones/'); ?>">
    <i class="fa fa-long-arrow-left"></i> Regresar a Listado
  </a>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Nueva solicitud de cupones</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php echo form_open( 'cupones/crear', array('class'=>'solicitud-cupon') ); ?>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="cliente_id">Cliente</label>
              <select class="form-control cliente" id="cliente" name="cliente_id" required></select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="promocion_id">Promoción</label>
              <?php echo form_dropdown('promocion_id', $promociones, '', array('class'=>'form-control select2 promocion', 'required'=>'required')); ?>
            </div>
          </div>
        </div>
        <table class="table table-striped facturas-cliente">
          <thead>
            <tr>
              <th>Tienda</th>
              <th>Factura #</th>
              <th>Fecha de Compra</th>
              <th>Total de Compra</th>   
              <th></th>           
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <p>
          <button type="button" class="btn btn-link btn-agregar-factura">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar factura
          </button>
        </p>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-guardar">Guardar</button>
        <button type="submit" class="btn btn-primary btn-guardar-y-aprobar">Guardar y Aprobar</button>
      </div>
    </form>
  </div>
</section>
<div class="modal modal-warning fade" id="modal-warning" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>No se puede guardar una Solicitud de canje de cupones sin facturas de compra del cliente asociadas. Ingrese al menos una.</p>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  var tiendas = <?php echo json_encode($tiendas); ?>;
</script>