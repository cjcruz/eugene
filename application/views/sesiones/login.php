<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio de Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/eugene/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/eugene/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="/eugene/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/eugene/assets/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="/eugene/assets/dist/css/eugene.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">



<?php
if( ! isset( $on_hold_message ) ){
  if( isset( $login_error_mesg ) ){
    echo '
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error al iniciar sesión. Intento #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts').'</h4>
        Usuario, Dirección de Email o Contraseña invalida.
      </div>
    ';
  }

  if( $this->input->get(AUTH_LOGOUT_PARAM) )
  {
    echo '
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alerta!</h4>
        Has cerrado la sesión con éxito.
      </div>
    ';
  }

  echo form_open( $login_url, ['class' => 'std-form'] ); ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">e<b>UG</b>ene</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicio de sesión</p>

        
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Usuario o Email" name="login_string" id="login_string" autocomplete="off" maxlength="255"/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="login_pass" id="login_pass" placeholder="Contraseña" <?php 
            if( config_item('max_chars_for_password') > 0 )
              echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
          ?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php if( config_item('allow_remember_me') ) { ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" id="remember_me" name="remember_me" value="yes"> Recordarme en este equipo
              </label>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Login" id="submit_button">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
        
        <?php $link_protocol = USE_SSL ? 'https' : NULL; ?>
        <a href="<?php echo site_url('examples/recover', $link_protocol); ?>">He olvidado mi contraseña</a><br>
        <a href="register.html" class="text-center">Registrarme como nuevo usuario.</a>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
  </form>

  <!-- jQuery 2.2.3 -->
  <script src="/eugene/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="/eugene/assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="/eugene/assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>

<?php

  } else {
    // EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
    echo '
      <div style="border:1px solid red;">
        <p>
          Excessive Login Attempts
        </p>
        <p>
          You have exceeded the maximum number of failed login<br />
          attempts that this website will allow.
        <p>
        <p>
          Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
        </p>
        <p>
          Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
          or contact us if you require assistance gaining access to your account.
        </p>
      </div>
    ';
  }
 ?>
</body>
</html>
