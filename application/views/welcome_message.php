<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Tablero</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Tablero</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $facturas ?></h3>
          <p>Número de Ventas</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo site_url('ventas'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $ventas ?></h3>
          <p>Monto de Ventas</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="<?php echo site_url('ventas'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $clientes ?></h3>
          <p>Clientes registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo site_url('clientes'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $cupones ?></h3>
          <p>Cupones Emitidos</p>
        </div>
        <div class="icon">
          <i class="ion ion-pricetag"></i>
        </div>
        <a href="<?php echo site_url('cupones'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">      
      <?php $this->load->view('widgets/_grafico_ventas') ?>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <?php $this->load->view('widgets/_ultimas_solicitudes') ?>
    </div>
  </div>
</section>
    