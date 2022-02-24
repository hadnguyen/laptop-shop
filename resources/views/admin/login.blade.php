<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin123') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('admin123') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin123') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('shop') }}">
                <img style="width:100px" src="{{ url('site') }}/img/logo2-removebg-preview.png" alt="">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập</p>
                @if (session('status'))
                    <div class="text-danger">{{session('status')}}</div>
                @endif
                <form action="{{ route('admin.postlogin') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="txtEmail" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="chkRemember">
                                <label for="remember">
                                    Nhớ phiên làm việc
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- Hoặc -</p>
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i> Đăng nhập bằng Google+
                    </a>
                  </div> --}}
                  <!-- /.social-auth-links -->

                  <p class="mb-1">
                    <a href="forgot-password.html">Quên mật khẩu</a>
                  </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('admin123') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin123') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin123') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
