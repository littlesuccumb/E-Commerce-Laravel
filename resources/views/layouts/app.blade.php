<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
  <link rel="stylesheet" href="{{ asset('css/costum.css') }}">

  <title>  @yield('title')  </title>
</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="#">Kelompok 1</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            <img class="img-responsive img-rounded" src="{{ asset($user->photo) }}" alt="{{$user->photo}}">
          </div>
          <div class="user-info">
            <span class="user-name">
              <strong>{{$user->name}}</strong>
            </span>
            <span class="user-role">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span>
          </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-search">
          <div>
            <div class="input-group">
              <input type="text" class="form-control search-menu" placeholder="Search...">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
                <span class="badge badge-pill badge-warning">New</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ route('dashboard')}}">View Dashboard
                      <span class="badge badge-pill badge-success">Pro</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>E-commerce</span>
                <span class="badge badge-pill badge-danger">3</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ route('product.index')}}">Products</a>
                  </li>
                  <li>
                    <a href="{{ route('product.create')}}">Input Product</a>
                  </li>
                  <li>
                    <a href="{{ route('transaksi.create')}}">Orders</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fas fa-dollar-sign"></i>
                <span>Transaksi</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ route('transaksi.index')}}">Data Transaksi</a>
                  </li>
                  <li>
                    <a href="{{ route('transaksi.laporan')}}">Nota Transaksi</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="{{ route('product.catalog') }}">
                <i class="fas fa-shopping-bag"></i>
                <span>Catalog</span>
              </a>
            </li>
            <li class="header-menu">
              <span>Account</span>
            </li>
            <li>
              <a href="{{ route('user.index')}}">
                <i class="fas fa-user-alt"></i>
                <span>Details User</span>
                <span class="badge badge-pill badge-success">Online</span>
              </a>
            </li>
            <li>
              <a href="{{ route('user.edit',['id' => Auth::user()->id]) }}">
                <i class="fas fa-user-cog"></i>
                <span>Settings</span>
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin Logout ?')">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="{{ route('user.edit',['id' => Auth::user()->id]) }}">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin Logout ?')">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </main>
    <!-- page-content" -->
  </div>
  <!-- page-wrapper -->
  @yield('scripts')

  <script>
    $(".sidebar-dropdown > a").click(function() {
      $(".sidebar-submenu").slideUp(200);
      if (
        $(this)
          .parent()
          .hasClass("active")
      ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
          .parent()
          .removeClass("active");
      } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
          .next(".sidebar-submenu")
          .slideDown(200);
        $(this)
          .parent()
          .addClass("active");
      }
    });

    $("#close-sidebar").click(function() {
      $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
      $(".page-wrapper").addClass("toggled");
    });
  </script>
</body>
</html>
