<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Log in</title>
    
    @include('layout.stylesheet')
</head>
<body class="hold-transition login-page" style="font-family: 'Times New Roman', Times, serif;">
    <div class="login-box">
        <div class="card card-info">
            <div class="card-header text-center">
                <h3 class="login-logo">Pilih Login</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <a href="{{ route('admin.login') }}" class="btn btn-block btn-outline-info nav-link" style="width: 150px">Admin</a>
                </div>
                <br>
                <div class="row justify-content-center">
                    <a href="{{ route('user.login') }}" class="btn btn-block btn-outline-info nav-link" style="width: 150px">User</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-8 pl-5 pb-3">
                    
                </div>
            </div>
        </div>
    </div>
        
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
