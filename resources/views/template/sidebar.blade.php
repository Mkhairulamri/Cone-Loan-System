@include('template/header');

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Peminjaman Cone Dishub</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><img src="{{asset('img/icon.png')}}" style="width:40%; height:40%"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item
              <?php
              if($menu ==1 ){
                  echo "active";
              }?>
              ">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt-slow"></i></i><span>Dashboard</span></a>
              </li>
              <li class="nav item
              <?php
              if($menu ==2 ){
                  echo "active";
              }?>
              "><a class="nav-link" href="{{ route('profil') }}"><i class="fas fa-user"></i></i><span>Profil</span></a></li>
              <li class="menu-header">Logistik Cone</li>
              <li class="nav-item dropdown
              <?php
                if($menu == 3 || $menu == 4 ){
                    echo "active";
                }?>
              ">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-road"></i><span>Logistik Cone</span></a>
                <ul class="dropdown-menu">
                  <li class = "
                  <?php
                    if($menu == 3 ){
                        echo "active";
                    }?>
                  "><a class="nav-link" href="{{ route('data_cone') }}">Data Cone</a></li>
                  <li class ="
                  <?php
                    if($menu == 4 ){
                        echo "active";
                    }?>
                  "><a class="nav-link" href="{{ route('pengadaan_cone') }}">Pengadaan Cone</a></li>
                </ul>
              </li>
              <li class="menu-header">Peminjaman Cone</li>
              <li class="
              <?php
                    if($menu == 5 ){
                        echo "active";
                    }?>
              "><a class="nav-link" href="{{ route('daftar_peminjaman') }}"><i class="fas fa-list"></i><span>Daftar Peminjaman</span></a></li>
              <li class="
              <?php
                    if($menu == 6 ){
                        echo "active";
                    }?>
              "><a class="nav-link" href="{{ route('riwayat_peminjaman') }}"><i class="fas fa-file-alt"></i><span>Riwayat Peminjaman</span></a></li>
            </ul>
        </aside>
      </div>
      <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/icon.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ $user = Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="{{ route('profil') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>