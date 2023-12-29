<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events project</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--Instascan-->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>


</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <!--
                        <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        -->
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <!--
                    <li class="sidebar-item active ">
                        <a href="index.html" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    -->
                    <!--
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Components</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="component-alert.html">Alert</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-badge.html">Badge</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-breadcrumb.html">Breadcrumb</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-button.html">Button</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-card.html">Card</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-carousel.html">Carousel</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-dropdown.html">Dropdown</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-list-group.html">List Group</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-modal.html">Modal</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-navs.html">Navs</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-pagination.html">Pagination</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-progress.html">Progress</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-spinner.html">Spinner</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-tooltip.html">Tooltip</a>
                            </li>
                        </ul>
                    </li>
                    -->
                    @if (Auth::user()->role == 'Administrator')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Eventos</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('events.index')}}">Ver eventos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('users.index', ['role' => 'Administrator'])}}">Administradores</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('users.index', ['role' => 'Assistant'])}}">Asistentes</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Assistant')
                        <li class="sidebar-item  ">
                            <a href="{{route('scanner.show')}}" class='sidebar-link'>
                                <i class="bi bi-upc-scan"></i>
                                <span>Escaner</span>
                            </a>
                        </li>
                    @endif

                    <li class="sidebar-item  ">
                        <a href="{{ route('logout') }}" class='sidebar-link'
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-gear"></i>
                            <span>Cerrar sesión</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <!--
                    <li class="sidebar-item  ">
                        <a href="form-layout.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Form Layout</span>
                        </a>
                    </li>
                    -->
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            @yield('content')
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">

            </div>
        </footer>
    </div>
</div>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>

<script src="/assets/js/main.js"></script>
</body>

</html>
