<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>aMuslim | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <?php echo enqueue_style('bootstrap/css/bootstrap.min.css'); ?>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <?php echo admin_enqueue_style('css/AdminLTE.min.css'); ?>
    <!-- iCheck -->
    <?php echo enqueue_style('plugins/iCheck/square/blue.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo site_url('/'); ?>">a<b>Muslim</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="alert alert-danger alert-dismissable hide">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i></h4>
        </div>
        <form action="<?php echo site_url('basecamp/check'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username"  class="form-control" placeholder="Username" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember" value="1"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <?php echo enqueue_script('plugins/jQuery/jQuery-2.1.4.min.js'); ?>
    <!-- Bootstrap 3.3.2 JS -->
    <?php echo enqueue_script('bootstrap/js/bootstrap.min.js'); ?>
    <!-- iCheck -->
    <?php echo enqueue_script('plugins/iCheck/icheck.min.js'); ?>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

        $( 'form' ).submit( function ( e ) {
          
          var form_data = $( 'form' ).serializeArray(),
              msg = $( '.alert' );
          $.ajax({
            type: 'POST',
            url: $( 'form' ).attr('action'),
            dataType: 'json',
            data: form_data,
            success: function ( r ) {
              
              if( r.result ) {

                msg
                  .attr( 'class', 'alert alert-success')
                  .find('h4')
                  .html( '<i class="icon fa fa-check-circle-o"></i> Login berhasil' )
                  .parent()
                  .append('Tunggu beberapa saat, system akan mengarahkan anda kehalaman admin');

                setTimeout( function () {
                  window.location=r.message;
                }, 2000 )
              } else {

                msg
                  .removeClass('hide')
                  .find('h4')
                  .html( '<i class="icon fa fa-ban"></i>' + r.message )
                  .parent()
                  .append('Username dan Password anda salah');
              }
            }
          });

          return false;
        })
      });
    </script>
  </body>
</html>
