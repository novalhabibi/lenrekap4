<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php

?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form action="<?= site_url('admin/cek_login') ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus"> -->
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_ulr() ?>/assets/jquery/jquery.min.js"></script>
  <script src="<?= base_ulr() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_ulr() ?>/assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="//code.jquery.com/jquery-3.0.0.slim.min.js"></script>
</body>

</html>
