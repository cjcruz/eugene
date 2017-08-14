<section class="content-header text-right" style="padding-top: 20px;">
  <a class="btn btn-info" style="margin-right: 5px;" href="<?php echo site_url('promociones/'); ?>">
    <i class="fa fa-long-arrow-left"></i> Regresar a Listado
  </a>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de nueva promoción</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php echo form_open( 'promociones/crear', array( 'class'=>'execute-validation' ) ); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="promocion[nombre]">Nombre</label>
          <input type="text" class="form-control" name="promocion[nombre]" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="promocion[valor_cupon]">Valor del Cupón</label>
          <input type="number" step="0.01" class="form-control" name="promocion[valor_cupon]" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="promocion[descripcion]">Descripcion</label>
          <textarea class="form-control" placeholder="" name="promocion[descripcion]"></textarea>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</section>