<?php if( $this->auth_username ){ ?>
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="/eugene/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
    <span class="hidden-xs"><?php echo $this->auth_username; ?></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      <img src="/eugene/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      <p>
        <?php echo $this->auth_username; ?> - <?php echo $this->auth_level; ?>
        <small><?php echo $this->auth_email; ?></small>
      </p>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Perfil</a>
      </div>
      <div class="pull-right">
        <a href="<?php echo site_url('sesiones/logout'); ?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
      </div>
    </li>
  </ul>
</li>
<?php } ?>