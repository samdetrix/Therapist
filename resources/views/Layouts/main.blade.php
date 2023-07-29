<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Physiotherapy Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Samuel Ochieng" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap select styling -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- Begin page -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-light.sv') }}g" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="30">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>


                </div>

                <div class="d-flex">
                    <!-- small search -->
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                    

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/doctor.png"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"
                                key="t-henry">{{ Session::get('username') }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout.user') }}"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title d-none" key="t-menu">Physiotherapy Clinic</li>

                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('therapists.list') }}" class="waves-effect">
                                <i class="mdi mdi-shield-home"></i><span>Therapists</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clients.index') }}" class="waves-effect">
                                <i class="mdi mdi-shield-home"></i><span>Clients</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('appointments.index')}}" class="waves-effect">
                                <i class="mdi mdi-shield-home"></i><span>Apointments</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rooms.index') }}" class="waves-effect">
                                <i class="mdi mdi-shield-home"></i><span>Rooms</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        @yield('content')
        <div>
            <footer class="footer ">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-sm-6 ">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Physiotherapy Clinic
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class="rightbar-overlay "></div>
        @yield('scripts');

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }} "></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js')}} "
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 ')}}" crossorigin="anonymous ">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js')}} "
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy " crossorigin="anonymous ">
        </script>

        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }} "></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }} "></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js ') }}"></script>

        <!-- Bootstrap select -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js "></script>

        <!-- numerals number formater -->
        <script src="{{ asset('assets/libs/numeral/numeral.js ') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js ') }}"></script>


        <!-- dashboard init -->
        <script src="{{ asset('assets/js/pages/index-dashboard.init.js') }} "></script>

        <!-- Saas dashboard init -->
        <script src="{{ asset('assets/js/pages/saas-dashboard.init.js') }}"></script>



        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }} "></script>
        <script src="{{ asset('assets/js/custom.js') }} "></script>




</body>

</html>
