<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasri</title>
  
  @include('layout.stylesheet')
  @stack('link')
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Times New Roman', Times, serif;">
  <div class="wrapper">
    
    <!-- Preloader -->
    {{-- @include('layout.preloader') --}}
    
    <!-- Navbar -->
    @include('layout.navbar')
    <!-- /.navbar -->
    
    <!-- Main Sidebar Container -->
    @include('layout.sidebar')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('layout.breadcrumb')
      <!-- /.content-header -->
      
      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layout.footer')
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  
  @include('layout.script')
  @stack('script')
</body>
</html>