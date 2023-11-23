<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ config ('app.name') }} </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href=" {{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/patien.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('styles')
    
</head>
<body>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{('home')}}"><img src="{{ asset('images/logo.Png') }}" class="text-center" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{('home')}}"><img src="{{ asset('images/logo.Png') }}"  alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="fa-solid fa-bell me-lg-2 text-info"></i>
                            <span class="d-none d-lg-inline-flex">Notificaciones</span>
                        </a> 
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <span class="dropdown-header" >Notificaciones no leídas</span>
                                <div class="preview-item-content dropdown-header-overflow">
                                        @forelse (auth()->user()->unreadNotifications as $notification)
                                        <a href="{{ url('doctors.viewNotification') }}" class="dropdown-item">
                                        <i class="fas fa-envelope mr-2"></i>Asunto: <br> {{ $notification->data['affair'] }}
                                        <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                        </a>
                                        @empty
                                        <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>  
                                        @endforelse
                                </div>
                                <span class="dropdown-header">Notificaciones leidas</span>
                            <div class="dropdown-header-overflow">
                                @forelse (auth()->user()->readNotifications as $notification)
                                <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> {{ $notification->data['affair'] }}
                                <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                </a>
                                @empty
                                <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones leidas                      </span>
                                @endforelse
                            </div>
                            <div class="dropdown-divider"></div> 
                            <a href="{{ route('markAsRead') }}" class="dropdown-item dropdown-footer" style="background: rgba(92, 89, 89, 0.568); color:white;">Marcar todo como leido</a>
                        </div>
                    </li>   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('images/faces/face28.jpg') }}" alt="" style="width: 40px; height: 40px;"/>
                            <span class="d-none d-lg-inline-flex"> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('profile')}}">
                                <i class="fa-solid fa-user text-info"></i>
                                Mi perfil
                            </a>
                                <ul class="dropdown-item">
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                                        <i class="ti-power-off text-danger"></i>
                                        Cerrar Sesion
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                        </div>
                    </li>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger">
                    <i class="ti-settings"></i>
                </div>
                    <div id="theme-settings" class="settings-panel">
                        <i class="settings-close ti-close"></i>
                        <p class="settings-heading">Temas</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                            <div class="img-ss rounded-circle bg-light border mr-3">
                            </div>
                            Claro
                        </div>
                        <div class="sidebar-bg-options" id="sidebar-dark-theme">
                            <div class="img-ss rounded-circle bg-dark border mr-3">
                            </div>
                            Oscuro
                        </div>
                            <p class="settings-heading mt-2">Paleta de colores</p>
                        <div class="color-tiles mx-0 px-4">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                        </div>
                    </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section" aria-expanded="true">Conversaciones</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <ul class="chat-list">
                                <li class="list active">
                                    <div class="profile"><img src="{{ asset('images/faces/face2.jpg') }}" alt="image"><span class="online"></span></div>
                                        <div class="info">
                                            <p>¡Has recibido un mensaje!</p>
                                            <p>Justo Ahora</p>
                                        </div>
                                    <small class="text-muted my-auto">1 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="{{ asset('images/faces/face1.jpg') }}" alt="image"><span class="offline"></span></div>
                                        <div class="info">
                                            <div class="wrapper d-flex"><p> ¡Perfil Actualizado!</p></div>
                                            <p>Hace 5 minutos</p>
                                        </div>
                                    <small class="text-muted my-auto">10 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="{{ asset('images/faces/face3.jpg') }}" alt="image"><span class="online"></span></div>
                                        <div class="info">
                                            <p>¡Nueva cita agendada!</p>
                                            <p>hace 10 minutos</p>
                                        </div>
                                    <small class="text-muted my-auto">14 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="{{ asset('images/faces/face4.jpg') }}" alt="image"><span class="offline"></span></div>
                                        <div class="info">
                                            <p>¡Ha ocurrido un error inesperado!</p>
                                            <p>Hola</p>
                                        </div>
                                    <small class="text-muted my-auto">18 min</small>
                                </li>
                        </ul>
                    </div>
                <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <ul class="chat-list">
                                    <li class="list active">
                                        <div class="profile"><img src="{{ asset('images/faces/face1.jpg') }}" alt="image"><span class="online"></span></div>
                                            <div class="info">
                                            <p>Laura Paramo</p>
                                            <p>¿Está bien?</p>
                                            </div>
                                        <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                        <small class="text-muted my-auto">1 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{ asset('images/faces/face2.jpg') }}" alt="image"><span class="offline"></span></div>
                                            <div class="info">
                                            <div class="wrapper d-flex"><p>Marlon Flores</p></div>
                                            <p>Hola</p>
                                            </div>
                                        <small class="text-muted my-auto">10 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{ asset('images/faces/face3.jpg') }}" alt="image"><span class="online"></span></div>
                                            <div class="info">
                                            <p>Elmer Ugalde</p>
                                            <p>Hola</p>
                                            </div>
                                        <div class="badge badge-success badge-pill my-auto mx-2">1</div>
                                        <small class="text-muted my-auto">14 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{ asset('images/faces/face4.jpg') }}" alt="image"><span class="offline"></span></div>
                                            <div class="info">
                                            <p>James Humprey</p>
                                            <p>Hola</p>
                                            </div>
                                        <div class="badge badge-success badge-pill my-auto mx-2">1</div>
                                        <small class="text-muted my-auto">18 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{ asset('images/faces/face5.jpg') }}" alt="image"><span class="online"></span></div>
                                            <div class="info">
                                            <p>Carlos Aguilar</p>
                                            <p>¿Ok?</p>
                                            </div>
                                        <div class="badge badge-success badge-pill my-auto mx-2">2</div>
                                        <small class="text-muted my-auto">25 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{ asset('images/faces/face6.jpg') }}" alt="image"><span class="online"></span></div>
                                            <div class="info">
                                            <p>Gerald Lanuza</p>
                                            <p>Hola</p>
                                            </div>
                                        <div class="badge badge-success badge-pill my-auto mx-2">1</div>
                                        <small class="text-muted my-auto">47 min</small>
                                    </li>
                                </ul>
                    </div>
                <!-- chat tab ends -->
                </div>
            </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    @include('includes.panel.menu')
    <!-- partial -->ñ
        <div class="main-panel">
            <div class="header bg-primary pb-8 pt-5 pt-md-8" id="header"></div>
                <div class="content-wrapper">   
                    @yield('content')
                    
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-sm-left d-block d-sm-inline-block">Copyright © 2023. <a>{{ config ('app.name') }}</a>. Todos los derechos resevados.</span>
                    </div>
                </footer> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
                
        <!-- partial -->
        </div>
        
    <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
</div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        @yield('js')
    </body>
</html>
