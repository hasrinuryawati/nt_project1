<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  @auth('admin')
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <h3><span class="brand-text font-weight-light">Logo</span></h3>
    </a>
  @endauth

  @auth('user')
    <a href="{{ route('user.dashboard') }}" class="brand-link">
      @if (Auth::user()->image == null)
        <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      @else
        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      @endif
      <h3><span class="brand-text font-weight-light">Logo</span></h3>
    </a>
  @endauth
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <h4 class="sidebar_user_name" style="color: rgb(239, 236, 236);">{{ Str::limit(Auth::user()->name, $limit = 18, $end = '...') }}</h4>
      </div>
    </div>
    
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @auth('admin')
        <li class="nav-item">
          <a href="{{ route('product') }}" class="nav-link {{ request()->is('product') ?  'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('/') ?  'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Order
            </p>
          </a>
        </li>
        @endauth

        {{-- USER GUARD --}}
        @auth('user')            
        <li class="nav-item">
          <a href="{{ route('user.product') }}" class="nav-link {{ request()->is('user/product') ?  'active' : '' }}">
            <i class="nav-icon fas fa-poll"></i>
            <p>
              Produk
              {{-- <i class="fas fa-angle-left right"></i> --}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.order') }}" class="nav-link {{ request()->is('user/order') ?  'active' : '' }}">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Order
              {{-- <i class="fas fa-angle-left right"></i> --}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.order.history') }}" class="nav-link {{ request()->is('user/order/history') ?  'active' : '' }}">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Riwayat Order
            </p>
          </a>
        </li>
        @endauth        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>