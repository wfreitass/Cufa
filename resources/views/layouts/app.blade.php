<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/layout/cufa.css') }} ">

    {{-- elegant CSS --}}
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/Logo.svg') }} " type="image/x-icon">
    <!-- Custom styles -->
    @yield('css')
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="{{ route('home') }}" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <span class="icon logo" aria-hidden="true"></span>
                        <div class="logo-text">
                            <span class="logo-title">Elegant</span>
                            <span class="logo-subtitle">Dashboard</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>

                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="@if (request()->is('home')) active @endif" href="{{ route('home') }}"><span
                                    class="icon home" aria-hidden="true"></span>Inicio</a>
                        </li>
                        <li>

                            <a class="show-cat-btn @if (request()->is('admin/people*')) active @endif" href="##">
                                <span class="icon" aria-hidden="true"><i
                                        data-feather="user"></i></span><span>Pessoas</span>
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="{{ route('peoples') }}">Todas</a>
                                </li>
                                <li>
                                    <a href="{{ route('createpeople') }}">Adicionar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @can('is_admin', Auth::user())
                        <span class="system-menu__title">Sistema</span>
                        <ul class="sidebar-body-menu">
                            <li>
                                <a class="show-cat-btn @if (request()->is('admin/users*')) active @endif" href="##">
                                    <span class="icon user-3" aria-hidden="true"></span><span>Usuários</span>
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon arrow-down" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">
                                    <li>
                                        <a href="{{ route('users') }}">Todos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('createuser') }}">Criar Usuário</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-body-menu">
                            <li>
                                <a class="show-cat-btn @if (request()->is('admin/region*')) active @endif" href="##">
                                    <span class="icon" aria-hidden="true"><i
                                            data-feather="map-pin"></i></span><span>Regiões</span>
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon arrow-down" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">
                                    <li>
                                        <a href="{{ route('regions') }}">Todas</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('createregion') }}">Adicionar Região</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endcan
                </div>
            </div>
            {{-- <div class="sidebar-footer">
                <a href="##" class="sidebar-user">
                    <span class="sidebar-user-img">
                        <picture>
                            <source srcset=" {{ asset('image/elegant/avatar/avatar-2.svg') }} " type="image/webp">
                            <img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                        </picture>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">Nafisa Sh.</span>
                        <span class="sidebar-user__subtitle">Support manager</span>
                    </div>
                </a>
            </div> --}}
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        {{-- <div class="search-wrapper">
                            <i data-feather="search" aria-hidden="true"></i>
                            <input type="text" placeholder="Enter keywords ..." required>
                        </div> --}}
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>

                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        {{-- <div class="lang-switcher-wrapper">
                            <button class="lang-switcher transparent-btn" type="button">
                                EN
                                <i data-feather="chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul class="lang-menu dropdown">
                                <li><a href="##">English</a></li>
                                <li><a href="##">French</a></li>
                                <li><a href="##">Uzbek</a></li>
                            </ul>
                        </div> --}}
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        {{-- <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="users-item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">System just updated</span>
                                            <span class="notification-dropdown__subtitle">The system has been
                                                successfully upgraded. Read more
                                                here.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon danger">
                                            <i data-feather="info" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">The cache is full!</span>
                                            <span class="notification-dropdown__subtitle">Unnecessary caches take up a
                                                lot of memory space and
                                                interfere ...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">New Subscriber here!</span>
                                            <span class="notification-dropdown__subtitle">A new subscriber has
                                                subscribed.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="link-to-page" href="##">Go to Notifications page</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn"
                                title="{{ Auth::user()->name }}" type="button">
                                <span class="sr-only">{{ Auth::user()->name }}</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source
                                            srcset="{{ asset('image/elegant/avatar/avatar-illustrated-02.webp') }}"
                                            type="image/webp"><img
                                            src="{{ asset('image/elegant/avatar/avatar-illustrated-02.png') }}"
                                            alt="User name">
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href=""><span>{{ Auth::user()->name }}</span></a></li>
                                <li><a href="{{ route('edituser', ['id' => Auth::user()->id]) }}">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Perfil</span>
                                    </a></li>
                                {{-- <li><a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li> --}}
                                <li><a class="danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Sair</span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container ">
                    {{-- <h2 class="main-title">Dashboard</h2>
                    <div class="row stat-cards">
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon primary">
                                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon warning">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon purple">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit danger">
                                            <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon success">
                                    <i data-feather="feather" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit warning">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div> --}}
                    <div class="row">
                        @include('flash::message')
                        @yield('content')
                    </div>
                </div>
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
                                rel="noopener noreferrer">elegant-dashboard.com</a></p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="##">About</a></li>
                        <li><a href="##">Support</a></li>
                        <li><a href="##">Puchase</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
    <!-- Chart library -->
    <script src="{{ asset('js/layout/chart.min.js') }}"></script>
    {{-- <script src="./plugins/chart.min.js"></script> --}}
    <!-- Icons library -->
    <script src="{{ asset('js/layout/feather.min.js') }}"></script>
    {{-- <script src="plugins/feather.min.js"></script> --}}
    <!-- Custom scripts -->
    <script src="{{ asset('js/layout/script.js') }}"></script>
    {{-- <script src="js/script.js"></script> --}}
    @yield('script')


    {{-- <script src="{{ asset('js/darkModeBootstrap.js') }}" defer></script> --}}
    <script>
        // var themeDark = localStorage.getItem('darkMode');

        // var darkThemeToggle = document.querySelector('.theme-switcher');

        // darkThemeToggle.addEventListener("click", function(){
        // 	let tables = window.document.getElementsByTagName("table") ;

        // 	if(tables.length && themeDark === 'enabled'){
        // 		for(let tb in tables){
        // 			console.log(tables[tb]);
        // 			tables[tb].classList.remove('table-primary');
        // 			tables[tb].classList.add('table-dark');
        // 		}
        // 	}else{
        // 		for(let tb in tables){
        // 			console.log(tables[tb]);
        // 			tables[tb].classList.remove('table-dark');
        // 			tables[tb].classList.add('table-primary');
        // 		}
        // 	}

        // });
    </script>

    <script></script>
</body>

</html>
