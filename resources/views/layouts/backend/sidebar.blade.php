<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="{{ route('admin.index') }}" class="brand-link">
    <img src="{{ asset('img/icons') }}/ecoll.png" alt="laravel Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/icons') }}/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Session::get('username')}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.users') }}" class="nav-link {{ Request::segment(2) == 'artikel' ? '' : '' }}">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Manajemen User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pintransaksi') }}" class="nav-link {{ Request::segment(2) == 'artikel' ? '' : '' }}">
            <i class="nav-icon fa fa-spinner"></i>
            <p>
              PIN Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          {{-- <a class="nav-link" data-toggle="dropdown" href="#"> --}}
          <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="nav-icon fa fa-credit-card"></i> Transaksi
          </a>
          {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
            {{-- <a href="{{ route('admin.data_transaksi')}}" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}" class="dropdown-item"> --}}
            <div class="dropdown-menu dropdown-menu-right bg-secondary text-dark">
            <a class="dropdown-item" href="{{ route('admin.data_transaksi')}}"><i class="nav-icon fa fa-credit-card"></i>Data Transaksi</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('admin.rekap')}}"><i class="nav-icon fa fa-credit-card"></i>Rekap Transaksi</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('admin.validasi')}}"><i class="nav-icon fa fa-credit-card"></i>Cek Validasi</a>
            </div>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.setting') }}" class="nav-link {{ Request::segment(2) == 'artikel' ? '' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Setting
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.board') }}" class="nav-link {{ Request::is('admin') ? '' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="nav-icon fa fa-qrcode"></i> QR Nasabah
          </a>
          <div class="dropdown-menu dropdown-menu-right bg-secondary text-dark">
          
            <a href="{{ route('admin.tabungan')}}" class="dropdown-item">
              <i class="nav-icon fa fa-qrcode"></i> Tabungan
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.kredit')}}" class="dropdown-item">
              <i class="nav-icon fa fa-qrcode"></i> Kredit
            </a>
          </div>
        </li>
{{--         <li class="nav-item">
          <a href="{{ route('admin.tracking-user') }}" class="nav-link {{ Request::segment(2) == 'tracking-user' ? '' : '' }}">
            <i class="nav-icon fas fa-map"></i>
            <p>
              Tracking User
            </p>
          </a>
        </li>
 --}}      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>