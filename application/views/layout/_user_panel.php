<?php if( $this->auth_username ){ ?>
<div class="user-panel">
  <div class="pull-left image">
    <img src="/eugene/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p><?php echo $this->auth_username; ?></p>
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>
<?php } ?>