<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jul 2019 01:21:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Percetakan| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?><?php echo base_url('assets/backend/') ?><?php echo base_url('assets/backend/') ?>use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?><?php echo base_url('assets/backend/') ?><?php echo base_url('assets/backend/') ?>code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('assets/backend/') ?>index2.html"><b>Bersaudara Print</b> -  Admin Area</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk ke akun anda</p>
      
      <?php if ($this->session->flashdata('pesan')): ?>
       
          <small class="text-danger"><?= $this->session->flashdata('pesan') ?></small>       
    
      <?php endif ?>
      <form action="<?php echo base_url('admin/login/buat_login') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="admin_kode" placeholder="Masukkan Kode Admin">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jul 2019 01:21:06 GMT -->
</html>
