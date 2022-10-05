<div class="clever-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="cleverNav">

            <!-- Logo -->
            <a class="nav-brand" href="/"><img src="{{ asset('img/icons') }}/ecoll.png" width="150" alt=""></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">

                <!-- Close Button -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="/" class="{{ Request::is('/') || Request::is('home') ? 'text-primary' : '' }}">Home</a></li>
                        <li><a href="{{ route('about') }}" class="{{ Request::is('about') ? 'text-primary' : '' }}">About</a></li>
                        <li><a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'text-primary' : '' }}">Contact</a></li>
                        <li><a href="{{ route('login') }}" class="fa fa-sign-in" aria-hidden="true"> Login</a></li>
                        {{-- <li><a href="{{ route('artikel') }}" class="{{ Request::segment(1) == 'artikel' ? 'text-primary' : '' }}">Artikel</a></li>
                        <li><a href="{{ route('pengumuman') }}" class="{{ Request::segment(1) == 'pengumuman' ? 'text-primary' : '' }}">Pengumuman</a></li>
                        <li><a href="" class="{{ Request::is('agenda') ? 'text-primary' : '' }}">Agenda</a></li> --}}
                        {{-- <li><a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'text-primary' : '' }}">Dashboard</a></li> --}}
                        {{-- <li><a href="{{ route('kategoriartikel') }}" class="{{ Request::is('kategoriartikel') ? 'text-primary' : '' }}">Kategori Artikel</a></li> --}}
                        {{-- <li><a href="{{ route('pintransaksi') }}" class="{{ Request::is('pintransksi') ? 'text-primary' : '' }}">Pin Transaksi</a></li> --}}
                        {{-- <li><a href="{{ route('profile') }}" class="{{ Request::is('profile') ? 'text-primary' : '' }}">Profile</a></li> --}}
                        {{-- <li><a href="{{ route('qrnasabah') }}" class="{{ Request::is('qrnasabah') ? 'text-primary' : '' }}">QR Nasabah</a></li> --}}
                        {{-- <li><a href="{{ route('setting') }}" class="{{ Request::is('setting') ? 'text-primary' : '' }}">Setting</a></li> --}}
                        {{-- <li><a href="{{ route('trackinguser') }}" class="{{ Request::is('trackinguser') ? 'text-primary' : '' }}">Tracking User</a></li> --}}
                        {{-- <li><a href="{{ route('transaksi') }}" class="{{ Request::is('transaksi') ? 'text-primary' : '' }}">Transaksi</a></li> --}}
                        {{-- <li><a href="{{ route('user') }}" class="{{ Request::is('user') ? 'text-primary' : '' }}">User</a></li> --}}
                    </ul>

                    <!-- Search Button -->
                    <div class="search-area">
                        <form action="{{ route('artikel.search') }}" method="GET">
                            <input name="keyword" id="search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    {{-- @auth
                    <div class="login-state d-flex align-items-center">
                        <div class="user-name mr-30">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endauth --}}

                </div>
                <!-- Nav End -->
            </div>
        </nav>
    </div>
</div>