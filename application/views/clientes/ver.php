<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Informacion del Cliente</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php echo form_open('clientes/index'); ?>
     <?php foreach ($data as $item): ?>
      <div class="box-body">
        <div class="form-group" style="display:none">
          <label for="usuario">ID</label>
          <input type="text" class="form-control" id="id" name="clientes[id]" value="<?php echo @$item['id']?>" readonly>
        </div>
        <div class="form-group">
          <label for="usuario">Nombre de la Tienda</label>
          <input type="text" class="form-control" id="nombre" name="clientes[nombre]" placeholder="Nombre" value="<?php echo @$item['nombre']?>" readonly>
        </div>
        <div class="form-group">
          <label for="contrasenia">Ubicacion</label>
          <input class="form-control" id="identificacion" name="clientes[identificacion]" placeholder="Ubicacion" value="<?php echo @$item['identificacion']?>" readonly>
        </div>
        <div class="form-group">
          <label for="contrasenia">Telefono</label>
          <input class="form-control" id="telefono" name="clientes[telefono]" placeholder="Telefono" value="<?php echo @$item['telefono']?>" readonly>
        </div>
        <div class="form-group">
          <label for="contrasenia">Direccion</label>
          <input class="form-control" id="direccion" name="clientes[direccion]" placeholder="Telefono" value="<?php echo @$item['direccion']?>" readonly>
        </div>
        <div class="form-group">
          <label for="contrasenia">Email</label>
          <input type="email" class="form-control" id="email" name="clientes[email]" placeholder="Correo Electronico" value="<?php echo @$item['email']?>" readonly>
        </div>
      </div>
    <?php endforeach; ?>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Volver</button>
      </div>
</section>