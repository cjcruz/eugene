<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editando el Registro de esta Tienda</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php echo form_open('tiendas/cambiar'); ?>
     <?php foreach ($data as $item): ?>
      <div class="box-body">
        <div class="form-group" style="display:none">
          <label for="usuario">ID</label>
          <input type="text" class="form-control" id="id" name="tiendas[id]" value="<?php echo @$item['id']?>" >
        </div>
        <div class="form-group">
          <label for="usuario">Nombre de la Tienda</label>
          <input type="text" class="form-control" id="nombre" name="tiendas[nombre]" placeholder="Nombre" value="<?php echo @$item['nombre']?>" >
        </div>
        <div class="form-group">
          <label for="contrasenia">Ubicacion</label>
          <input class="form-control" id="ubicacion" name="tiendas[ubicacion]" placeholder="Ubicacion" value="<?php echo @$item['ubicacion']?>">
        </div>
        <div class="form-group">
          <label for="contrasenia">Telefono</label>
          <input class="form-control" id="telefono" name="tiendas[telefono]" placeholder="Telefono" value="<?php echo @$item['telefono']?>">
        </div>
        <div class="form-group">
          <label for="contrasenia">Email</label>
          <input type="email" class="form-control" id="email" name="tiendas[email]" placeholder="Correo Electronico" value="<?php echo @$item['email']?>">
        </div>
      </div>
    <?php endforeach; ?>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
</section>