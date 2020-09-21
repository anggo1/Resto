<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/admin.css">

  </head>
     <style type="text/css">
    .bg-login{
        background-color: transparent;
        background-image: url(<?php echo base_url("assets/img/background.png");?>);
        -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    }
</style>
    <body  class="bg-login">
  <body class="hold-transition login-page" >
    <div class="login-box">
      <div class="login-logo">
        <!--<img src="<?php echo base_url(); ?>assets/img/se3.png" alt="logo" width="70" class="shadow-light rounded-circle"><P></P>-->
		  <a href="#"><b> <strong>RESTORAN</strong></b></a>
      </div>
<div class="box box-primary">
              <div class="card-header">
  <div class="box-header">
    <div class="col-md-12"></div>
        <p class="login-box-msg">
          Log in to start your session
        </p>

        <form action="<?php echo base_url('Auth/login'); ?>" method="post">
	
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="UserName" name="UserName">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          
            <div class="col-sm-12 margin pull-right">
            <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i>LOGIN</button>
        </div>
          </div>
        </form>


      </div>
      <!-- /.login-box-body -->
      <?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?>
    </div>   
    </div>   
    </div>   
  </body>
</html>
