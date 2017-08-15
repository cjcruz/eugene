<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editando el Registro del Cliente</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php echo form_open('clientes/cambiar'); ?>
     <?php foreach ($data as $item): ?>
      <div class="box-body">
        <div class="form-group" style="display:none">
          <label for="usuario">ID</label>
          <input type="text" class="form-control" id="id" name="clientes[id]" value="<?php echo @$item['id']?>" >
        </div>
        <div class="form-group">
          <label for="usuario">Nombre del Cliente</label>
          <input type="text" class="form-control" id="nombre" name="clientes[nombre]" placeholder="Nombre" value="<?php echo @$item['nombre']?>" >
        </div>
        <div class="form-group">
          <label for="contrasenia">CI/RUC</label>
          <input class="form-control" id="ubicacion" name="clientes[identificacion]" placeholder="Identificacion" value="<?php echo @$item['identificacion']?>">
        </div>
        <div class="form-group">
          <label for="contrasenia">Telefono</label>
          <input class="form-control" id="telefono" name="clientes[telefono]" placeholder="Telefono" value="<?php echo @$item['telefono']?>">
        </div>
         <div class="form-group">
          <label for="contrasenia">Direccion</label>
          <input class="form-control" id="direccion" name="clientes[direccion]" placeholder="Direccion" value="<?php echo @$item['direccion']?>">
        </div>
        <div class="form-group">
          <label for="contrasenia">Email</label>
          <input type="email" class="form-control" id="email" name="clientes[email]" placeholder="Correo Electronico" value="<?php echo @$item['email']?>">
        </div>
      </div>
    <?php endforeach; ?>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
</section>