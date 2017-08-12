<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Nueva solicitud de cupones</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" class="solicitud-cupon">
      <div class="box-body">
        <div class="form-group">
          <label for="cliente">Cliente</label>
          <select class="form-control cliente" id="cliente" name="cliente" placeholder="Cliente"></select>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Tienda</th>
              <th>Factura #</th>
              <th>Fecha de Compra</th>
              <th>Total de Compra</th>              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                  </div>
                  <?php echo form_dropdown('tienda', $tiendas, array(), array('class'=>'form-control select2', 'id'=>'tienda', 'style'=>'width:100%;')); ?>
                </div>
              </td>
              <td>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-hashtag"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "999-999-999999999"' name="factura_numero" id="factura_numero" data-mask/>
                </div>
              </td>
              <td>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="fecha" id="fecha" placeholder="Fecha" class="form-control date-picker-control" />
                </div>
              </td>
              <td>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-usd"></i>
                  </div>
                  <input type="text" name="total" id="total" placeholder="Total de la compra" class="form-control"/>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <p>
          <button type="button" class="btn btn-link">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar factura</button>
        </p>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</section>