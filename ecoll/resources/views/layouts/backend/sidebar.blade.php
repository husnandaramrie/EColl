<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('img/icons') }}/laravel.jpg" alt="laravel Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">ECollection</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/icons') }}/codeigniter4.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Session::get('data')}}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link {{ Request::segment(2) == 'artikel' ? '' : '' }}">
              <i class="nav-icon fa fa-barcode"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::segment(2) == 'artikel' ? '' : '' }}">
            <i class="nav-icon fa fa-barcode"></i>
            <p>
              PIN Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-question"></i>Transaksi</a>
          <ul class="nav-dropdown-items">
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-info-circle"></i> <span>Data Transaksi</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-pastafarianism"></i> <span>Rekap Transaksi</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-list-alt"></i> <span>Cek Validasi</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-poo"></i> <span>Cek Transaksi Ganda</span></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Setting
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? '' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-question"></i>QR Nasabah</a>
          <ul class="nav-dropdown-items">
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-info-circle"></i> <span>Tabungan</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#" class="nav-link {{ Request::segment(2) == 'users' ? '' : '' }}"><i class="nav-icon la la-pastafarianism"></i> <span>Kredit</span></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::segment(2) == 'tracking-user' ? '' : '' }}">
            <i class="nav-icon fas fa-map"></i>
            <p>
              Tracking User
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
