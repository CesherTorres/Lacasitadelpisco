<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Casita del pisco | @yield('title')</title>
    <link rel="icon" href="/../images/KAITA 3.png">
    <link rel="stylesheet" href="/css/generalkaitastyle.css">
    <link rel="stylesheet" href="/css/templategeneral.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/select.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/responsive.bootstrap.min.css">
    @yield('css')
</head>
<body class="bg-light">

    <!-- sidebar -->      
    <div class="offcanvas offcanvas-start  sidebar-nav border-0 shadow" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-white">
                <ul class="navbar-nav">
                    <li>
                        <div class="user-info border-0 mb-3">
                            <div class="text-center">
                                <img src="/images/logo-kaita2-white.png" class=" mx-auto" style="width: 100px"; height="70px"  alt="">
                            </div>
                            <div class=" py-2 text-center">
                                <img src="/images/{{Auth()->user()->avatar}}" class="rounded-circle border text-center mx-auto border-2 border-white shadow" style="width: 60px;" alt="">
                            </div>
                            <div class="text-center">
                                <span class="fw-light d-inline-block text-white text-truncate">
                                    {{Auth()->user()->name}}
                                </span>
                            </div>
                        </div>
                    </li>

                    <div class="scroll py-0 my-0">
                        <li class="mx-2 my-1">
                            <a href="{{url('/dashboard')}}" class="nav-link px-3 text-dark {{ request()->is('dashboard', 'adminlte')? 'active-item' : null}} menu">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-pie-chart-fill me-2"></i>
                                </span>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 my-1">
                            <a class="nav-link px-3 sidebar-link  menu text-dark" data-bs-toggle="collapse" href="#collapsemenu0" role="button" aria-expanded="false" aria-controls="collapsemenu0">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                </span>
                                <span>
                                    Información
                                </span>
                                <span class="right-icon ms-auto">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </span>
                            </a>
                            <div class="collapse" id="collapsemenu0">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="" class="nav-link mt-2 px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Gráficos
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Reportes
                                                </span>
                                            </a>
                                        </li>                                    
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="mx-2 my-1">
                            <a class="nav-link px-3 sidebar-link {{ request()->is('configuracion-de-almacen', ['almacen*'], 'areas', 'categorias', ['productos*'], ['inventario*'], ['ingresos*'], ['salidas*'], 'medidas', 'etiquetas', 'marcas')? 'active-item' : null}} menu text-dark" data-bs-toggle="collapse" href="#collapsemenu1" role="button" aria-expanded="false" aria-controls="collapsemenu1">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-box-seam me-2"></i>
                                </span>
                                <span>
                                    Almacén
                                </span>
                                <span class="right-icon ms-auto">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </span>
                            </a>
                            <div class="collapse" id="collapsemenu1">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="" class="nav-link mt-2 px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Configuración
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Materia Prima
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Productos
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Activos
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Movimientos
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('inventario')}}" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Inventario
                                                </span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="mx-2 my-1">
                            <a class="nav-link px-3 sidebar-link  menu text-dark" data-bs-toggle="collapse" href="#collapsemenu2" role="button" aria-expanded="false" aria-controls="collapsemenu2">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-graph-up-arrow me-2"></i>
                                </span>
                                <span>
                                    Ingresos
                                </span>
                                <span class="right-icon ms-auto">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </span>
                            </a>
                            <div class="collapse" id="collapsemenu2">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="" class="nav-link mt-2 px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Pedidos
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Ventas
                                                </span>
                                            </a>
                                        </li>                                    
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="mx-2 my-1">
                            <a class="nav-link px-3 sidebar-link  menu text-dark" data-bs-toggle="collapse" href="#collapsemenu5" role="button" aria-expanded="false" aria-controls="collapsemenu5">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-basket2 me-2"></i>
                                </span>
                                <span>
                                    Compras
                                </span>
                                <span class="right-icon ms-auto">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </span>
                            </a>
                            <div class="collapse" id="collapsemenu5">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="" class="nav-link mt-2 px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Proveedores
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Solicitud de compra
                                                </span>
                                            </a>
                                        </li>         
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Costos
                                                </span>
                                            </a>
                                        </li>  
    
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="mx-2 my-1">
                            <a class="nav-link px-3 sidebar-link  menu text-dark" data-bs-toggle="collapse" href="#collapsemenu6" role="button" aria-expanded="false" aria-controls="collapsemenu6">
                                <span class="text-primary fw-bold">
                                    <i class="bi bi-building me-2"></i>
                                </span>
                                <span>
                                    Producción
                                </span>
                                <span class="right-icon ms-auto">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </span>
                            </a>
                            <div class="collapse" id="collapsemenu6">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="" class="nav-link mt-2 px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Solicitud de fabricación
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="nav-link px-3 menu">
                                                <span>
                                                    <i class="bi bi-circle me-2"></i>
                                                </span>
                                                <span>
                                                    Fabricación
                                                </span>
                                            </a>
                                        </li>                                    
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="mx-2 my-1">
                            <a href="" class="nav-link px-3 {{ request()->is('acerca-de')? 'active-item' : null}} menu">
                                <span>
                                    <i class="bi bi-circle text-info me-2"></i>
                                </span>
                                <span>
                                    Acerca de
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 my-1">
                            <a href="" class="nav-link px-3 {{ request()->is('ayuda')? 'active-item' : null}} menu">
                                <span>
                                    <i class="bi bi-circle text-danger me-2"></i>
                                </span>
                                <span>
                                    Ayuda
                                </span>
                            </a>
                        </li>
                    </div> 
                </ul>
            </nav>
        </div>
    </div>
    <!-- fin sidebar -->
    
    <!-- contenido -->
    <main>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-sm fixed-top mb-5">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="ms-auto d-flex">
                    {{-- <div class="nav-item dropdown me-2">
                        <a class=" btn btn-success btn-sm nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill me-2"></i>Notificaciones
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                        </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> --}}
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>  {{Auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-4 borde-bottom-primary shadow" aria-labelledby="navbarDropdown">
                            <li class="border-bottom pb-3">
                                <div class=" py-2 mx-3 text-center">
                                    <img src="/images/{{Auth()->user()->avatar}}" class="rounded-circle border text-center mx-auto border-2 border-white shadow-sm" style="width: 80px;" alt="">
                                </div>
                                <span class="text-muted px-5">{{Auth()->user()->email}}</span>
                            </li>
                           
                            <li class="border-bottom">
                                <a class="dropdown-item py-2 my-2 menu" href="#">
                                    <i class="bi bi-person-badge me-2"></i>
                                    Mi Perfil
                                </a>
                            </li>
                          
                            <li class="border-bottom">
                                <a class="dropdown-item py-2 my-2 menu" href="#">
                                    <i class="bi bi-gear-fill me-2"></i>
                                    Configuración
                                </a>
                            </li>
                           
                            <li >
                                <a class="dropdown-item py-2 mt-2 menu" href="/logout">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <!-- fin navbar -->

        <!-- principal -->
            <div class="container-fluid mb-5 py-5">
               @yield('content')
            </div>
        <!-- fin principal -->

        <!-- footer  -->
        <footer class="footer pb-0 fixed-bottom bg-white shadow-lg mt-5 pt-3 border-top">
            <div class="container-fluid">
                <div class="row pb-2">
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <small class="text-muted text-uppercase">Desarrado Por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-cuantica" target="bank">Cuantica <span class="text-group text-capitalize">Group</span></a></small>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <span class="float-end">Copyright © <?php echo date("Y");?>  <a href="https://kaita.com/" class="text-decoration-none text-primary fw-bold" target="bank">Kaita</a> - Todos los derechos Reservados - <small class="text-muted">version 1.0</small></span>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- fin footer -->
    </main>
    <!-- fin contenido -->
        
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/chart.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/js/datatables/dataTables.responsive.min.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

    <script>
        $(document).ready(function() {
            $('table.display').DataTable( {
                responsive: true,
                fixedHeader: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "next": "&raquo;",
                        "previous": "&laquo;"
                    } 
                }
            } );
        new $.fn.dataTable.FixedHeader( table );
        } );
    </script>

    @yield('js')
    @stack('scripts')
</body>
</html>
