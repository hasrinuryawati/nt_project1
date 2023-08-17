<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      @auth('admin')
        @if (Route::currentRouteName() === 'admin.dashboard')
          <a href=""></a>
        @else   
          <a href="{{ route('admin.dashboard') }}" class="nav-link">DASHBOARD</a>
        @endif
      @endauth

      {{-- @auth('user')
        @if (Route::currentRouteName() === 'user.dashboard')
          <a href=""></a>
        @else   
          <a href="{{ route('user.dashboard') }}" class="nav-link">DASHBOARD</a>  
        @endif
      @endauth --}}
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>
  
  <ul class="navbar-nav ml-auto mr-3">
    <li class="nav-item dropdown">
      @auth('user')
        <a href="{{ route('user.profile') }}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Profil
        </a>
      @endauth
    </li>
    {{-- <li class="nav-item dropdown">
      <a class="dropdown-item" data-toggle="dropdown" href="#">
        <i class="fas fa-user mr-2"></i> Profil
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Lihat Profil
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-cog mr-2"></i> Pengaturan
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i> Ubah Password
        </a>
      </div>
    </li> --}}
    <li class="nav-item dropdown">
      @auth('admin')
        <a href="{{ route('admin.logout') }}" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      @endauth
      
      @auth('user')
        <a href="{{ route('user.logout') }}" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      @endauth
    </li>
  </ul>
</nav>