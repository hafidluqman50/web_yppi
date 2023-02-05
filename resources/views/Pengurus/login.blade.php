
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/yppi.png') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend-assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Form</b> Login
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      @if(session()->has('log'))
      <div class="alert alert-danger alert-dismissible">
        {{ session('log') }} <button class="close" data-dismiss="alert">X</button>
      </div>
      @endif
      <form action="{{ url('/login/auth') }}" method="POST">
        @csrf
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk  <span class="fa fa-lock"></span></button>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>