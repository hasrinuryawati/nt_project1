@extends('layout.main')
@push('stylesheet')
<style>
  .center-card {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Sesuaikan dengan tinggi halaman yang diinginkan */
  }
</style>
@endpush
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="center-card">
      <div class="text-center">
        <h2>SELAMAT DATANG </h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <!-- Profile Image -->
          {{-- <div class="card"> --}}
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
          {{-- </div> --}}
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
