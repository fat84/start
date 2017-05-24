<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>startclik</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">
    <!-- Material Design Icons  ->
    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
    <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    ->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Roboto Web Font ->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <!-- MDK ->
    <link type="text/css" href="{{asset('assets/vendor/material-design-kit.css')}}" rel="stylesheet">

    <link type="text/css" href="{{asset('assets/vendor/sidebar-collapse.min.css')}}" rel="stylesheet">

    <link type="text/css" href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">


    <!-- Required by summernote ->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
    <!-- Bootstrap Datepicker ->
    <link rel="stylesheet" href="{{asset('examples/css/bootstrap-datepicker.min.css')}}">
    <!-- Summernote WYSIWYG ->
    <link rel="stylesheet" href="{{asset('examples/css/summernote.min.css')}}">
    <!-- Nestable ->
    <link rel="stylesheet" href="{{asset('examples/css/nestable.min.css')}}">








    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

    <!-- MDK -->
    <link type="text/css" href="{{asset('assets/vendor/material-design-kit.css')}}" rel="stylesheet">

    <!-- Sidebar Collapse -->
    <link type="text/css" href="{{asset('assets/vendor/sidebar-collapse.min.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

    <!-- Required by summernote -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="{{asset('examples/css/bootstrap-datepicker.min.css')}}">
    <!-- Summernote WYSIWYG -->
    <link rel="stylesheet" href="{{asset('examples/css/summernote.min.css')}}">
    <!-- Nestable -->
    <link rel="stylesheet" href="{{asset('examples/css/nestable.min.css')}}">


    <!-- Vendor Dropzone CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('examples/css/dropzone.min.css')}}">

    <!-- Vendor FancyTree CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('examples/css/fancytree.min.css')}}">

<!-- MDK ->
    <link type="text/css" href="{{asset('public/assets/vendor/material-design-kit.css')}}" rel="stylesheet">

    <link type="text/css" href="{{asset('public/assets/vendor/sidebar-collapse.min.css')}}" rel="stylesheet">

    <link type="text/css" href="{{asset('public/assets/css/style.min.css')}}" rel="stylesheet">
    <!-- App CSS -->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>


    <style>.modal-backdrop {
            /*z-index: -1;*/
            display: none;
        }</style>
</head>
<body class="ls-top-navbar">
<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler" type="button" data-toggle="sidebar"></button>

    <!-- Brand -->
    <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('img/2starclick.png')}}" style="max-width: 200px"></a>

    <!-- Search -->
    <form class="navbar-search-form hidden-sm-down">
        <input type="text" class="form-control" placeholder="Buscar">
        <button class="btn" type="button"><i class="material-icons">search</i></button>
    </form>
    <!-- // END Search -->

    <div class="navbar-spacer"></div>

    <!-- Menu -->
    <ul class="nav navbar-nav hidden-sm-down">
        <li class="nav-item">
            <a class="nav-link" href="{{url('forums')}}">Foro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Soporte</a>
        </li>
    </ul>

    <!-- Menu -->
    <ul class="nav navbar-nav">

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="material-icons">shopping_cart</i>
            </a>
        </li>

        <!-- User dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"><img src="{{asset('img/usuario/'.Auth::user()->avatar)}}" alt="Avatar" class="rounded-circle" width="40"></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                <a class="dropdown-item" href="{{url('miperfil')}}">
                    <i class="material-icons">edit</i> Mi perfil
                </a>
                <a class="dropdown-item" href="#">
                    <i class="material-icons">card_travel</i> Mi portafolio
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="material-icons">lock</i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
        <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->

</nav>
<!-- // END Navbar -->

<div class="mdk-drawer-layout mdk-js-drawer-layout" push has-scrolling-region>
    <!--content-->
@yield('content')
<!--End Content-->
    <!-- Sidebar Menu-->
    <div class="mdk-drawer mdk-js-drawer" id="default-drawer" align="left" position="left" data-domfactory-upgraded="mdk-drawer"><div class="mdk-drawer__scrim"></div>
        <div class="mdk-drawer__content ls-top-navbar-xs-up">
            <div class="sidebar sidebar-left sidebar-light bg-white sidebar-p-y">
                <div class="sidebar-heading">MENÚ</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="{{url('/')}}">
                            <i class="sidebar-menu-icon material-icons">dashboard</i> INICIO
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">start</i> DESTACADOS
                        </a>
                    </li>

                    @if(Auth::user()->rol == 'usuario' or Auth::user()->rol == 'empresa' or Auth::user()->rol == 'instructor')

                    @elseif(Auth::user()->rol == 'administrador')
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button sidebar-js-collapse" href="#">
                                <i class="sidebar-menu-icon material-icons">face</i> CREACION DE ROLES
                            </a>
                            <ul class="sidebar-submenu sm-condensed">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('administrador')}}">ADMINISTRADORES</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('instructores')}}">INSTRUCTORES</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('empresas')}}">EMPRESAS</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('usuarios')}}">USUARIOS</a>
                                </li>
                            </ul>
                        </li>
                    @else
                    @endif

                    @if(Auth::user()->rol == 'usuario' or Auth::user()->rol == 'empresa' )
                    @else
                        <li class="sidebar-menu-item ">
                            <a class="sidebar-menu-button sidebar-js-collapse" href="#">
                                <i class="sidebar-menu-icon material-icons">school</i> DISEÑO DE CURSOS
                            </a>
                            <ul class="sidebar-submenu sm-condensed">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('curso')}}">DISEÑO DE CURSOS</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('modulo')}}">DISEÑO DE MODULOS</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('materia')}}">DISEÑO DE MATERIAS</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{url('leccion')}}">DISEÑO DE LECCIONES</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="#">DISEÑO DE EXAMENES</a>
                                </li>
                            </ul>
                        </li>
                    @endif



                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">assignment</i> MIS CURSOS
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button sidebar-js-collapse" href="#">
                            <i class="sidebar-menu-icon material-icons">assignment</i> MATERIAL DE APOYO
                        </a>
                        <ul class="sidebar-submenu sm-condensed">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{url('subirmaterialdeapoyo_curso')}}">MATERIAL PARA CURSOS</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{url('subirmaterialdeapoyo_modulo')}}">MATERIAL PARA MODULOS</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{url('subirmaterialdeapoyo')}}">MATERIAL PARA MATERIAS</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{url('subirmaterialdeapoyo_leccion')}}">MATERIAL PARA LECCIONES</a>
                            </li>
                        </ul>
                    </li>
                   <!-- <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">list</i> LISTA DE DESEADOS
                        </a>
                    </li>-->

                    @if(Auth::user()->rol == 'usuario' or Auth::user()->rol == 'empresa' or Auth::user()->rol == 'instructor')
                    @else
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{url('categorias')}}">
                                <i class="sidebar-menu-icon material-icons">reorder</i> CATEGORIAS
                            </a>
                        </li>
                    @endif



                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{url('foros')}}">
                            <i class="sidebar-menu-icon material-icons">forum</i> FOROS
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">book</i> BIBLIOTECA VIRTUAL
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{url('miperfil')}}">
                            <i class="sidebar-menu-icon material-icons">account_circle</i> MI PERFIL
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">assignment_turned_in</i> CERTIFICADOS
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">shopping_cart</i> RESTAURAR COMPRAS
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon material-icons">settings</i> SOPORTE
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- // END Sidebar -->
</div>

<!-- jQuery ->
<script src="{{asset('assets/vendor/tether.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/dom-factory.js')}}"></script>
<script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>
<script src="{{asset('assets/vendor/sidebar-collapse.js')}}"></script>
<script src="{{asset('assets/js/main.min.js')}}"></script>


<!-- Vendor JS ->
<script src="{{asset('assets/vendor/summernote.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.nestable.js')}}"></script>

<!-- Init ->
<script src="{{asset('examples/js/summernote.js')}}"></script>
<script src="{{asset('examples/js/date-time.js')}}"></script>
<script src="{{asset('examples/js/nestable.js')}}"></script>
-->

<!-- jQuery -->

<!-- Bootstrap -->
<script src="{{asset('assets/vendor/tether.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>
<!-- MDK -->
<script src="{{asset('assets/vendor/dom-factory.js')}}"></script>
<script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>
<!-- Sidebar Collapse -->
<script src="{{asset('assets/vendor/sidebar-collapse.js')}}"></script>
<!-- App JS -->
<script src="{{asset('assets/js/main.min.js')}}"></script>
<!-- Vendor JS -->
<script src="{{asset('assets/vendor/summernote.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.nestable.js')}}"></script>
<!-- Init -->
<script src="{{asset('examples/js/summernote.js')}}"></script>
<script src="{{asset('examples/js/date-time.js')}}"></script>
<script src="{{asset('examples/js/nestable.js')}}"></script>
<script src="{{asset('summernote/lang/summernote-es-ES.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>


<!-- Required by Calendar (fullcalendar) -->
<script src="{{asset('assets/vendor/dropzone.min.js')}}"></script>

<!-- TREE JS -->
<script src="https://cdn.jsdelivr.net/jquery.ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{asset('assets/vendor/jquery.fancytree-all.min.js')}}"></script>



<!-- Init -->
<script src="{{asset('examples/js/fancytree.js')}}"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "No se encuentran registros",
                "search":         "Buscar:",
                "info": "Monstrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrando enre _MAX_ registros totales)",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        } );
    } );
</script>
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<!-- jQuery -->
<!-- jQuery ->
<script src="{{asset('public/assets/vendor/jquery.min.js')}}"></script>

<script src="{{asset('public/assets/vendor/tether.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/bootstrap.min.js')}}"></script>

<script src="{{asset('public/assets/vendor/dom-factory.js')}}"></script>
<script src="{{asset('public/assets/vendor/material-design-kit.js')}}"></script>

<script src="{{asset('public/assets/vendor/sidebar-collapse.js')}}"></script>

<script src="{{asset('public/assets/js/main.min.js')}}"></script>



<!-- jQuery -->
</body>
</html>
