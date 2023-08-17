@extends('layout.main')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                
                <!-- Profile Image -->
                <div class="card card-info card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if (Auth::user()->image == null)
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('template/dist/img/AdminLTELogo.png') }}"
                                alt="Profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('storage/' . Auth::user()->image) }}"
                                alt="{{ Auth::user()->name }}"
                                width="100">
                            @endif
                        </div>
                        
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        
                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            
                        </ul>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <h3>Edit Profil</h3>
                            {{-- <li class="nav-item"><a class="nav-link active" href="#edit_profil" data-toggle="tab">Edit Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#edit_foto" data-toggle="tab">Change Password</a></li> --}}
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="edit_profil">
                                <form action="{{ route('user.profile.update', Auth::user()->id) }}" method="POST" id="update_user_profile" enctype="multipart/form-data" class="form-horizontal">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="inputName" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control" id="image" value="{{ Auth::user()->image }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" id="update_user_profile" class="btn btn-secondary">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            
                            {{-- <div class="tab-pane" id="edit_foto">
                                <form action="#" method="POST" id="user_change_password" class="form-horizontal">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="current_password" class="col-sm-3 col-form-label">Password Lama</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="password" name="current_password" class="form-control" id="current_password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show_hide_current_password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-3 col-form-label">Password Baru</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="password" name="new_password" class="form-control" id="new_password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show_hide_new_password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="repeat_new_password" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="password" name="repeat_new_password" class="form-control" id="repeat_new_password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show_hide_repeat_new_password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-10">
                                            <button type="submit" id="user_change_password" class="btn btn-secondary">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('script')
<script>
    const currentPasswordInput = document.getElementById('current_password');
    const currentPasswordShowHideBtn = document.getElementById('show_hide_current_password');
    currentPasswordShowHideBtn.addEventListener('click', function () {
        if (currentPasswordInput.type === 'password') {
            currentPasswordInput.type = 'text';
            currentPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            currentPasswordInput.type = 'password';
            currentPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });
    
    const newPasswordInput = document.getElementById('new_password');
    const newPasswordShowHideBtn = document.getElementById('show_hide_new_password');
    newPasswordShowHideBtn.addEventListener('click', function () {
        if (newPasswordInput.type === 'password') {
            newPasswordInput.type = 'text';
            newPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            newPasswordInput.type = 'password';
            newPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });
    
    const repeatNewPasswordInput = document.getElementById('repeat_new_password');
    const repeatNewPasswordShowHideBtn = document.getElementById('show_hide_repeat_new_password');
    repeatNewPasswordShowHideBtn.addEventListener('click', function () {
        if (repeatNewPasswordInput.type === 'password') {
            repeatNewPasswordInput.type = 'text';
            repeatNewPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            repeatNewPasswordInput.type = 'password';
            repeatNewPasswordShowHideBtn.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });
</script>
@endpush