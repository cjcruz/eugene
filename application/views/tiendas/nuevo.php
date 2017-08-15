<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de nueva Tienda</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
     <?php echo form_open('tiendas/crear'); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="usuario">Nombre de la Tienda</label>
          <input type="text" class="form-control" id="nombre" name="tiendas[nombre]" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="contrasenia">Ubicacion</label>
          <input class="form-control" id="ubicacion" name="tiendas[ubicacion]" placeholder="Ubicacion">
        </div>
        <div class="form-group">
          <label for="contrasenia">Telefono</label>
          <input class="form-control" id="telefono" name="tiendas[telefono]" placeholder="Telefono">
        </div>
        <div class="form-group">
          <label for="contrasenia">Email</label>
          <input type="email" class="form-control" id="email" name="tiendas[email]" placeholder="Correo Electronico">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" >Registrar</button>
      </div>
    </form>
  </div>
</section>