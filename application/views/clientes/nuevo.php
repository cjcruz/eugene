<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de nuevo Cliente</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
     <?php echo form_open('clientes/crear'); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="usuario">Nombre del Cliente</label>
          <input type="text" class="form-control" id="nombre" name="clientes[nombre]" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="contrasenia">CI/RUC</label>
          <input class="form-control" id="identificacion" name="clientes[identificacion]" placeholder="Identificacion">
        </div>
        <div class="form-group">
          <label for="contrasenia">Telefono</label>
          <input class="form-control" id="telefono" name="clientes[telefono]" placeholder="Telefono">
        </div>
        <div class="form-group">
          <label for="contrasenia">Direccion</label>
          <input class="form-control" id="direccion" name="clientes[direccion]" placeholder="Direccion">
        </div>
        <div class="form-group">
          <label for="contrasenia">Email</label>
          <input type="email" class="form-control" id="email" name="clientes[email]" placeholder="Correo Electronico">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" >Registrar</button>
      </div>
    </form>
  </div>
</section>