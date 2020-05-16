<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
  
  <title>@yield('title')</title>
  
  <!--================================-->
  <!-- CSS-->
  <!--================================-->
  <!-- vendor css -->
  <link href="{{asset('lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/dashforge.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/dashforge.auth.css')}}" rel="stylesheet">
  <!--================================-->
  <!-- Pace progress indicator-->
  <!--================================-->
  <script src="{{asset('lib/pace/pace.min.js')}}"></script>
  <link href="{{asset('assets/css/themepace.css')}}" rel="stylesheet">
  
</head>
<body>

<div class="content content-fixed content-auth-alt">
  <div class="container ht-100p tx-center">
    <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
      <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15">
        <img src="{{asset('assets/img/img22.png')}}" class="img-fluid" alt="">
      </div>
      <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">@yield('code')</h1>
      <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">@yield('message')</h5>
      <p class="tx-color-03 mg-b-30">
      
      </p>
      <div class="mg-b-40">
        <a class="btn btn-white bd-2 pd-x-30" href="{{route('home')}}" role="button">
          Regresar
        </a>
      </div>
      <span class="tx-12 tx-color-03">Contacte al administrador del sistema</span>
    
    </div>
  </div><!-- container -->
</div><!-- content -->

<!-- JavaScript -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/dashforge.js')}}"></script>

</body>
</html>
