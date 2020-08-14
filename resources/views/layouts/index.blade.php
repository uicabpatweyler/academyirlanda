<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }} | MP&A</title>

  <!--================================-->
  <!-- CSS-->
  <!--================================-->
  <link href="{{asset('lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/sweetalert/sweetalert2.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/dashforge.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/skin.cool.css')}}" rel="stylesheet">
  <!--================================-->
  <!-- Pace progress indicator-->
  <!--================================-->
  <script src="{{asset('lib/pace/pace.min.js')}}"></script>
  <link href="{{asset('assets/css/themepace.css')}}" rel="stylesheet">
  <!--================================-->
  <!-- Custom styles-->
  <!--================================-->
  <style>
    .card-accent-indigo-700 {
      border-top-color: #303F9F!important;
      border-top-width: 2px!important;
    }
    .card-accent-indigo-800 {
      border-top-color: #283593!important;
      border-top-width: 2px!important;
    }
    .card-accent-blue-700 {
      border-top-color: #1976D2!important;
      border-top-width: 2px!important;
    }
    .card-accent-blue-800 {
      border-top-color: #1565C0!important;
      border-top-width: 2px!important;
    }
    .card-accent-green-700 {
      border-top-color: #388E3C!important;
      border-top-width: 2px!important;
    }
    .card-accent-green-800 {
      border-top-color: #2E7D32!important;
      border-top-width: 2px!important;
    }
  </style>

</head>
<body>
  <!--====================================-->
  <!-- Sidebar Start. Navigation Vertical -->
  <!--====================================-->
  <aside class="aside aside-fixed">
    <!-- begin aside-header -->
    <div class="aside-header">
      <a href="" class="aside-logo">MP<span>&</span>A</a>
      <a href="" class="aside-menu-link">
        <i data-feather="menu"></i>
        <i data-feather="x"></i>
      </a>

    </div>
    <!-- end aside-header -->

    <!--================================-->
    <!-- Sidebar Body Start -->
    <!--================================-->
    <div class="aside-body">

      <!-- begin aside-loggedin -->
      <div class="aside-loggedin">

        <div class="d-flex align-items-center justify-content-start">
          <!-- avatar user loggedin -->
          <a href="" class="avatar">
            <img src="{{asset('assets/avatars/undraw_male_avatar_323b_1_blue.svg')}}" class="rounded-circle" alt="">
          </a>
          <!-- icon sign out -->
          <div class="aside-alert-link">
            <a href="{{ route('logout') }}" data-toggle="tooltip" title="Desconectarse"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i data-feather="log-out"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style=" display: none;">
              @csrf
            </form>
          </div>
        </div>

        <!-- begin aside-loggedin-user -->
        <div class="aside-loggedin-user">
          <!-- name user loggedin -->
          <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
            <h6 class="tx-semibold mg-b-0">{{ Auth::user()->full_name }}</h6>
            <i data-feather="chevron-down"></i>
          </a>
          <!-- role user loggedin -->
          <p class="tx-color-03 tx-12 mg-b-0">{{ Auth::user()->email }}</p>
        </div> <!-- end aside-loggedin-user -->

        <!-- begin menu collapse loggedin -->
        <div class="collapse" id="loggedinMenu">
          <ul class="nav nav-aside mg-b-0">
            <li class="nav-item">
              <a href="{{route('userprofile.edit',['userprofile' => Auth::user()])}}" class="nav-link">
                <i data-feather="edit"></i> <span>Editar Perfil</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i> <span>Desconectarse</span>
              </a>
            </li>
          </ul>
        </div><!-- end menu collapse loggedin -->

      </div><!-- end aside-loggedin -->

      <!--================================-->
      <!-- Sidebar Menu Start -->
      <!--================================-->
      <ul class="nav nav-aside">
        <li class="nav-label"></li>
        <li class="nav-item {{ Str::contains(url()->current(), ['home']) ? 'active' : '' }}">
          <a href="{{route('home')}}" class="nav-link">
            <i data-feather="home"></i> <span>Inicio</span>
          </a>
        </li>
        <li class="nav-label"></li>
        @if(Auth::user()->can('*.*') || Auth::user()->can('access.administration.module'))
          <li class="nav-item with-sub {{ Str::contains(url()->current(), ['admin']) ? 'active show' : '' }}">
            <a href="" class="nav-link">
              <i data-feather="globe"></i> <span>Administración</span>
            </a>
            <ul>
              @if(Auth::user()->can('*.*') || Auth::user()->can('roles'))
              <li class="{{ Str::contains(url()->current(), ['roles']) ? 'active' : '' }}">
                <a href="{{route('roles.index')}}">
                  Roles
                </a>
              </li>
              @endif
              @if(Auth::user()->can('*.*') || Auth::user()->can('users'))
              <li class="{{ Str::contains(url()->current(), ['users']) ? 'active' : '' }}">
                <a href="{{route('users.index')}}">
                  Usuarios
                </a>
              </li>
              @endif
            </ul>
          </li>
        @endif
        <li class="nav-label"></li>
        @if(Auth::user()->can('*.*') || Auth::user()->can('access.setting.module'))
          <li class="nav-item with-sub {{ Str::contains(url()->current(), ['setting']) ? 'active show' : '' }}">
            <a href="" class="nav-link">
              <i data-feather="settings"></i> <span>Configuración</span>
            </a>
            <ul>
              @if(Auth::user()->can('*.*') || Auth::user()->can('schools'))
              <li class="{{ Str::contains(url()->current(), ['schools']) ? 'active' : '' }}">
                <a href="{{route('schools.index')}}">Escuelas</a>
              </li>
              @endif
              @if(Auth::user()->can('*.*') || Auth::user()->can('school_cycles'))
                <li class="{{ Str::contains(url()->current(), ['school_cycles']) ? 'active' : '' }}">
                  <a href="{{route('school_cycles.index')}}">Ciclos Escolares</a>
                </li>
              @endif
                @if(Auth::user()->can('*.*') || Auth::user()->can('school_grades'))
                  <li class="{{ Str::contains(url()->current(), ['school_grades']) ? 'active' : '' }}">
                    <a href="{{route('school_grades.index')}}">Grados Escolares</a>
                  </li>
                @endif
            </ul>
          </li>
        @endif

      </ul><!-- End Sidebar Menu End -->

    </div><!-- end aside-body -->
  </aside><!-- End Sidebar. Navigation Vertical -->

  <!--================================-->
  <!-- Start Page Content -->
  <!--================================-->
  <div class="content ht-100v pd-0">
    <!-- Begin content-header -->
    <div class="content-header">
      <h4 class="tx-inverse mg-t-15">Academia de Inglés: Irlanda</h4>
    </div><!-- End content-header -->

    <!--================================-->
    <!-- Start Page Content Body -->
    <!--================================-->
    <div class="content-body">
      <!-- Start Container Body -->
      <div class="container pd-x-0">
        @yield('content')
      </div><!-- End Container Body -->

    </div> <!-- End Page Content Body -->
  </div> <!-- /content ht-100v pd-0 -->

<!-- JavaScript -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('lib/sweetalert/sweetalert2.all.js')}}"></script>
<script src="{{asset('commonFunctions.js')}}"></script>


<script src="{{asset('assets/js/dashforge.js')}}"></script>
<script src="{{asset('assets/js/dashforge.aside.js')}}"></script>
  @stack('scripts')
</body>
</html>
