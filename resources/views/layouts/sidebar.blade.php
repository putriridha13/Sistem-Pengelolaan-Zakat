<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-1">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Zakat</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/' . auth()->user()->picture) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->username }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Starter Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Active Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>
        </li> --}}
        @if (auth()->user()->roles == "amil")
        <li class="nav-item">
          <a href="/amil" class="nav-link {{ request()->is('amil') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/profile" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="/datamuzakki" class="nav-link {{ request()->is('datamuzakki*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Muzakki
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/mustahik" class="nav-link {{ request()->is('mustahik*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Mustahik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/datasugestion" class="nav-link {{ request()->is('datasugestion*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-envelope-open"></i>
            <p>
              Data Kritik & saran
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/article" class="nav-link {{ request()->is('article*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Data artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/reception" class="nav-link {{ request()->is('reception*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Penerimaan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/distribution" class="nav-link {{ request()->is('distribution*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Penyaluran
            </p>
          </a>
        </li>
        @elseif (auth()->user()->roles == "admin")
        <li class="nav-item">
          <a href="/amil" class="nav-link {{ request()->is('amil') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/datamuzakki" class="nav-link {{ request()->is('datamuzakki*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Muzakki
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dataamil" class="nav-link {{ request()->is('dataamil*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Amil
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/mustahik" class="nav-link {{ request()->is('mustahik*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Mustahik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/datasugestion" class="nav-link {{ request()->is('suggestion*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-envelope-open"></i>
            <p>
              Data Kritik & saran
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/article" class="nav-link {{ request()->is('article*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Data artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/reception" class="nav-link {{ request()->is('reception*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Penerimaan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/distribution" class="nav-link {{ request()->is('distribution*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Penyaluran
            </p>
          </a>
        </li>
        @else
          <li class="nav-item">
            <a href="/muzakki" class="nav-link {{ request()->is('muzakki') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="/profile" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/payment" class="nav-link {{ request()->is('payment') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Informasi Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/berita" class="nav-link {{ request()->is('berita*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/sugestion" class="nav-link {{ request()->is('sugestion') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Kritik & saran
              </p>
            </a>
          </li><li class="nav-item">
        @endif
        <li class="nav-item">
          <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
            <i class="nav-icon fas fa-info"></i>
            <p>
              About
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>