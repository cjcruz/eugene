<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de nuevo usuario</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php echo form_open('usuarios/crear'); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" placeholder="Usuario">
        </div>
        <div class="form-group">
          <label for="contrasenia">Contraseña</label>
          <input type="password" class="form-control" id="contrasenia" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="contrasenia_confirmacion">Confirme Contraseña</label>
          <input type="password" class="form-control" id="contrasenia_confirmacion" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
          <label>Rol</label>
          <select class="form-control">
            <option value="1">Cliente</option>
            <option value="6">Manager</option>
            <option value="9">Administrador</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Foto</label>
          <input type="file" id="exampleInputFile">

          <p class="help-block">Esta es la imagen que se usará como foto de perfil.</p>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    
  </div>
</section>