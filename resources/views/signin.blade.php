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
  
  <title>MP&A Iniciar sesión</title>
  
  <!--================================-->
  <!-- CSS-->
  <!--================================-->
  <link href="{{asset('assets/css/dashforge.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/skin.cool.css')}}" rel="stylesheet">
  <!--================================-->
  <!-- Pace progress indicator-->
  <!--================================-->
  <script src="{{asset('lib/pace/pace.min.js')}}"></script>
  <link href="{{asset('assets/css/themepace.css')}}" rel="stylesheet">
  <!--================================-->
  <!-- Custom styles for login page-->
  <!--================================-->
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .card-accent-red-800 {
      border-top-color: #c62828!important;
      border-top-width: 3px!important;
    }
    
    .card-accent-blue-800 {
      border-top-color: #1565C0!important;
      border-top-width: 3px!important;
    }
   

  </style>
  <link href="{{asset('assets/css/floating-labels.css')}}" rel="stylesheet">
</head>
<body>
  <form name="form_login" id="form_login" class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    
    <div class="card shadow @if($errors->any()) card-accent-red-800 @else card-accent-blue-800 @endif">
      <div class="card-body">
        <div class="text-center mb-4">
          <img class="mb-4" src="{{asset('assets/img/undraw_sign_in_e6hj.svg')}}" alt="" width="240" height="180">
          <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
        </div>
        <div class="form-label-group">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email') }}"
                 data-parsley-trigger="change" placeholder="Correo Electrónico"
                 required autocomplete="email" autofocus>
          <label for="email">Correo Electrónico</label>
        </div>
        <div class="form-label-group">
          <input type="password" id="password" name="password"
                 class="form-control @error('password') is-invalid @enderror"
                 data-parsley-trigger="change" placeholder="Contraseña"
                 required autocomplete="current-password">
          <label for="password">Contraseña</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><i data-feather="log-in" class="wd-10 mg-r-10"></i>Acceder</button>
        <div class="mt-3 mb-3 text-capitalize divider-text">&copy; 2020 / Management Platform & Administration</div>
      </div>
    </div>
  </form>
  
  <!-- JavaScript -->
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('lib/parsley/parsley.js')}}"></script>
  <script src="{{asset('lib/parsley/es.js')}}"></script>

  <script>
    $().ready( function () {
      @error('email')
      $('#email').parsley().addError('errorServer', {message: '{{$message}}', updateClass: false});
      @enderror
      @error('password')
      $('#password').parsley().addError('errorServer', {message: '{{$message}}', updateClass: false});
      @enderror

      Parsley.setLocale('es');

      $('#form_login').parsley({
        errorClass: 'is-invalid',
        successClass: 'is-valid',
        errorsWrapper: '<span class="invalid-feedback"></span>',
        errorTemplate: '<div></div>'
      }).on('form:validate', function (formInstance) {
      }).on('form:submit', function() {
        return true;
      });
      $('#email').parsley().on('field:validate', function() {
        $(this.$element).parsley().removeError('errorServer', {updateClass: true});
      });
      $('#password').parsley().on('field:validate', function() {
        $(this.$element).parsley().removeError('errorServer', {updateClass: true});
      });
      
    });
  </script>
  
</body>
</html>
