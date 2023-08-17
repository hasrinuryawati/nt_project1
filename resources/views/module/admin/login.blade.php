<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in Admin</title>
    
    @include('layout.stylesheet')
</head>
<body class="hold-transition login-page" style="font-family: 'Times New Roman', Times, serif;">
    <div class="login-box">
        <div class="login-logo">
            <p>Login Admin</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
                
                <form action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 mt-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="show_hide_password">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block float-right">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ route('user.login') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-user"></i> Login Sebgai User
                    </a>
                </div>
                <!-- /.social-auth-links -->
                
                {{-- <p class="mb-1">
                    <a href="forgot-password.html">Lupa password</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    
    @include('layout.script')
    <script>
        const passwordInput = document.getElementById('password');
        const passwordShowHideBtn = document.getElementById('show_hide_password');
        passwordShowHideBtn.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordShowHideBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                passwordShowHideBtn.innerHTML = '<i class="fa fa-eye"></i>';
            }
        });
    </script>
</body>
</html>
