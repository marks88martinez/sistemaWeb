<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template_admin/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/template_admin/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template_admin/admin/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="">
  <style>
    .btn-primary {
        color: #fff;
        background-color: #20ce65;
        border-color: #20ce65;
        box-shadow: none;
    }
    .card-primary.card-outline {
        border-top: 3px solid #19232b;
    }
    .btn-primary:hover {
        color: #fff;
        background-color: #18984b;
        border-color: #18984b;
    }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      {{-- <a class="h1"><b>Admin</b>LTE</a> --}}
      <img src="/template_admin/admin/img/logo.png" style="width: 150px" alt="">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar su sesión</p>

            {{-- //////////////////// --}}
            @yield('content')
            {{-- //////////////////// --}}
      {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/template_admin/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template_admin/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template_admin/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
