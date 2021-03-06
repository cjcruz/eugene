<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="header">Menu Principal</li>
  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Tablero</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-bar-chart"></i> <span>Cliente Frecuente</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active">
        <a href="<?php echo base_url('/cupones'); ?>"><i class="fa fa-circle-o"></i> Canje de Cupones</a>
      </li>
      <li><a href="<?php echo base_url('/promociones'); ?>"><i class="fa fa-circle-o"></i> Promociones</a></li>
      <li><a href="<?php echo base_url('/ventas'); ?>"><i class="fa fa-circle-o"></i> Ventas</a></li>
      <li><a href="<?php echo base_url('/tiendas/ranking'); ?>"><i class="fa fa-circle-o"></i> Ranking</a></li>
    </ul>
  </li>
  <li><a href="<?php echo base_url('/clientes'); ?>"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
  <li><a href="<?php echo base_url('/tiendas'); ?>"><i class="fa fa-university"></i> <span>Tiendas</span></a></li>
  <li><a href="<?php echo base_url('/usuarios'); ?>"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
</ul>