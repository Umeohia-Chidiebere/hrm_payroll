
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Login - Payroll Management System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('login/plugins/fontawesome-free/css/all.min.css ')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('login/plugins/icheck-bootstrap/icheck-bootstrap.min.css ')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('login/dist/css/adminlte.min.css ')}}">

</head>
<body class="hold-transition login-page bg-dark">
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"><b> <i class="fa fa-lock"></i> Account Login </b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg"> Login to Access your Dashboard </p> -->
      <p class="login-box-ms text-center text-uppercase"> <b> {{ request()->email }} </b> </p>
      
      @include("partials.alert_msg")
      <form action="{{ route('login_user') }}" method="post">
          @csrf()
          @if( request()->has('email'))
          <input type="hidden" name="email" required value="{{ request()->email }}" class="form-control" placeholder="Email">
          @else

          <div class="input-group mb-3">
          <input type="email" name="email" required value="" class="form-control" placeholder="Your Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @endif
        

        <div class="input-group mb-3">
          <input type="password" name="password" required class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-success">
              <input type="checkbox" name="remember_me" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-block btn-outline-success"> Login </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- 
        <p class="mb-1">
         <a href="#">I forgot my password</a>
        </p> -->
 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</body>
</html>
