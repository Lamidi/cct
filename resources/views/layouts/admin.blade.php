<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CTC | PASURUAN</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <script src="https://kit.fontawesome.com/50c6f555d8.js" crossorigin="anonymous"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"></span>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Notifications</span>
              <div class="dropdown-divider"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CTC PASURUAN</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/uploads/profile/{{auth()->user()->image}}" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="{{url ('myprofiles')}}" class="d-block">{{auth()->user()->name}}</a>
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
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="{{url('home')}}" class="nav-link {{request()->is('home')?'active':''}}">
                <i class="nav-icon fas fa-house"></i>
                <p>
                  Home
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(auth()->user()->role=='admin')
                <li class="nav-item">
                  <a href="{{url('users')}}" class="nav-link {{request()->is('users')?'active':''}}">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                      USER
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('ros')}}" class="nav-link {{request()->is('ros')?'active':''}}">
                    <i class="nav-icon fa-solid fa-house-flag"></i>
                    <p>
                      RO
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('stos')}}" class="nav-link {{request()->is('stos')?'active':''}}">
                    <i class="nav-icon fa-solid fa-house-user"></i>
                    <p>
                      STO
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('ofis')}}" class="nav-link {{request()->is('ofis')?'active':''}}">
                    <i class="nav-icon fa-solid fa-folder"></i>
                    <p>
                      OFI
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('afis')}}" class="nav-link {{request()->is('afis')?'active':''}}">
                    <i class="nav-icon fa-solid fa-folder-open"></i>
                    <p>
                      AFI
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('daproses')}}" class="nav-link {{request()->is('daproses')?'active':''}}">
                    <i class="nav-icon fa-solid fa-box"></i>
                    <p>
                      DAPROS
                    </p>
                  </a>
                </li>
                @endif
              </ul>
              <ul class="nav nav-treeview">
                @if(auth()->user()->role=='agent')
                <li class="nav-item">
                  <a href="{{url('agents')}}" class="nav-link {{request()->is('agents')?'active':''}}">
                    <i class="nav-icon fa-solid fa-box"></i>
                    <p>
                      AGENTS PAGE
                    </p>
                  </a>
                </li>
                @endif
              </ul>
              <ul class="nav nav-treeview">
                @if(auth()->user()->role=='hero')
                <li class="nav-item">
                  <a href="{{url('heros')}}" class="nav-link {{request()->is('heros')?'active':''}}">
                    <i class="nav-icon fa-solid fa-box"></i>
                    <p>
                      HEROS PAGE
                    </p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">@yield('header')</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.card-header -->
        <div class="card-body pt-0">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <!-- Data Table Plugin -->
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  @yield('js')
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>