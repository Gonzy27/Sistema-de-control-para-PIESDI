<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/waves.min.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- Jquery Core Js -->
   <script src="{{ asset('js/jquery.min.js')}}"></script>

    <!-- Rut Js cargado para formatear Rut-->
    <script src="{{ asset('js/jquery.Rut.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js')}}"></script>

    <style>
            .navbar {
                background-color: transparent;
                background: transparent;
                border:none;
                border-color: transparent;
                box-shadow: 0 0px 0px -0px #999;
                -webkit-box-shadow: 0 0px 0px -0px #999;
                -moz-box-shadow: 0 0px 0px -0px #999;

             }

             .login-page {
                background-color: #f44336;
            }
            
            .signup-page {
                background-color: #f44336;
            }

            a {
                color: #ddd;
            }

            a:hover, a:focus {
                color: #000;
            }
    </style>

</head>
        <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <!-- Notifications -->
                            <li class="dropdown">
                                <li><a href="{{ url('contacto') }}">Contacto</span></a></li>
                                <li><a href="{{ url('login') }}">Inicio Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    <!-- #Top Bar -->
    @yield('content')

      <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
 
     <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/waves.min.js')}}"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
  
   <!-- Custom Js -->
    <script src="{{ asset('js/admin.js')}}"></script>

    @yield('script')
</body>

</html>