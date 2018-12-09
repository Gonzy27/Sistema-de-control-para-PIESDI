<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Sistema PIESI</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;amp;subset=cyrillic') }}" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/waves.min.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select.dataTables.min.css') }}" rel="stylesheet" />
  <!--  
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/buttons.bootstrap.min.css') }}" rel="stylesheet" /> -->


      <!-- Bootstrap Select Css -->
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />

     <!-- Sweetalert Css -->
     <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" />
      
    <!-- FullCalendar -->
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/all-themes.min.css')}}" rel="stylesheet" />

    <link href="{{ asset('//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css') }}" rel="stylesheet" />
    
    <!-- Jquery Core Js cargado antes para permitir que funcione FullCalendar-->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/moment.min.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js')}}"></script>
    <!-- Rut Js cargado para formatear Rut-->
    <script src="{{ asset('js/jquery.Rut.js')}}"></script>

    <!-- ColorPicker Spectrum -->
    <script src="{{ asset('js/spectrum.js') }}"></script>

    <!-- ColorPicker Spectrum -->
    <link href="{{ asset('css/spectrum.css') }}" rel="stylesheet">
    

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
               </div>
             <p>Cargando</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('home')}}"><img class="media-object" src="{{ asset('images/logo.png') }}" width="200" height="40"> </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <!-- <img src="images/user.png" width="48" height="48" alt="User" /> -->
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nombre}} {{Auth::user()->apellidoPaterno}}</div>
                    <div class="email">{{Auth::user()->correo}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ url('profesionales/reset') }}"><i class="material-icons">person</i>Cambio Pass</a></li>
                            <li role="seperator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menú de Opciones</li>
                    <li class="active">
                        <a href="{{ url('home') }}">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    @if(Auth::user()->tipoCuenta == 1)
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Gestión de usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ url('profesionales/create') }}">Agregar nuevo usuario</a>
                            </li>
                            <li>
                                <a href="{{ url('profesionales') }}">Listar usuarios</a>
                            </li>
                        </ul>
                    </li>                   
                    @endif
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Gestión de alumnos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ url('alumnos/create') }}">Agregar nuevo alumno</a>
                            </li>
                            <li>
                                <a href="{{ url('alumnos') }}">Listar alumnos</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Gestión de participantes externos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ url('externos/create') }}">Agregar nuevo participante</a>
                            </li>
                            <li>
                                <a href="{{ url('externos') }}">Listar participantes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">event</i>
                            <span>Gestión de Eventos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ url('evento') }}">Ver calendario</a>
                            </li>
                            <li>
                                <a href="{{ url('evento/listar') }}">Listar eventos</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">description</i>
                            <span>Gestión de solicitudes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ url('solicitudes') }}">Ver solicitudes recibidas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">edit</i>
                                <span>Listado de Noticias</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ url('noticias') }}">Ver noticias enviadas</a>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">Sistema PIESDI</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

     <!-- seccion info -->
    <!-- Contenido -->
    @include('inc.messages')
    @yield('content')

    {{--  Script de páginas cargadas en content    --}}
    @yield('page-script')
      

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('js/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/waves.min.js')}}"></script>

    <!-- FullCalendar -->
    <script src="{{ asset('js/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('js/es.js')}}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('js/bootstrap-material-datetimepicker.js')}}"></script>

     <!-- SweetAlert Plugin Js -->
     <script src="{{ asset('js/sweetalert.min.js')}}"></script>

    <!-- DataTable -->
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{ asset('//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js') }}"></script>

    <!-- DataTable extensiones-->
    <script src="{{ asset('js/extensions/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('js/extensions/dataTables.buttons.min.js')}}"></script>

    <!--<script src="{{ asset('js/extensions/buttons.bootstrap.min.js')}}"></script>-->

    <script src="{{ asset('js/extensions/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('js/extensions/jszip.min.js')}}"></script>
    <script src="{{ asset('js/extensions/pdfmake.min.js')}}"></script>
    <script src="{{ asset('js/extensions/vfs_fonts.js')}}"></script>
    <script src="{{ asset('js/extensions/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('js/extensions/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js')}}"></script>

    @yield('script')
</body>

</html>