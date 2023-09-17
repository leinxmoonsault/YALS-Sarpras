<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('back/images/logo.png') }}" rel="shortcut icon">
        <meta name="author" content="Lein@SMAYAPPENDA">
        <title>Admin - Sarpras - SMA YAPPENDA</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('back/css/app.css') }}" />
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
            <div class="mobile-menu md:hidden">
                <div class="mobile-menu-bar">
                    <a href="" class="flex mr-auto">
                        <img alt="SMA YAPPENDA" class="w-6" src="{{ asset('back/images/logo.png') }}">
                    </a>
                    <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                </div>
                <ul class="border-t border-theme-2 py-5 hidden">
                    <li>
                        <a href="javascript:;.html" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Dashboard <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="menu__sub-open">
                            <li>
                        <a href="{{ route('home') }}" class="top-menu top-menu--active">
                            <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="top-menu__title"> Home </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="top-menu__title"> Menu Data <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('homeruangan') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Ruangan </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homekelas') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Kelas </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="top-menu__title"> Menu Sarpras <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('homesarprasruangan') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Sarpras Ruangan </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homesarpraskelas') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Sarpras Kelas </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homereqsarpras') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Request Sarpras </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="top-menu__title"> Menu Laporan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Inventory Kelas <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('homelaporansarpraskelas') }}" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Sarana Kelas</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Inventory Ruangan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('homelaporansarprasruangan') }}" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Sarana Ruangan</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Laporan Kebersihan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Kebersihan Sarpras</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Kebersihan Lantai</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Laporan Annual <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Harian</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Mingguan</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Bulanan</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
            <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
                <div class="h-full flex items-center">
                    <!-- BEGIN: Logo -->
                        <a href="{{ route('home') }}" class="-intro-x hidden md:flex">
                            <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="{{ asset('back/images/logo.png') }}">
                            <span class="text-white text-lg ml-3"> SMA<span class="font-medium">Yappenda</span> </span>
                        </a>
                    <!-- END: Logo -->
                    <!-- BEGIN: Breadcrumb -->
                        <div class="-intro-x breadcrumb mr-auto"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false">
                            <img alt="Icewall Tailwind HTML Admin Template" src="{{ asset('back/images/admin.png') }}">
                        </div>
                        <div class="dropdown-menu w-56">
                            <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                                    <div class="font-medium">{{auth()->user()->nama}}</div>
                                    <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">{{auth()->user()->role}}</div>
                                </div>
                                <div class="p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    {{-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a> --}}
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </div>
                                <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                                    <a href="{{ route('pagelogoutadmin') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <form action="{{ route('pagelogoutadmin') }}" id="logout-form"  method="post">
                                            @csrf
                                        </form>
                                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
            </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
            <nav class="top-nav">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="top-menu top-menu--active">
                            <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="top-menu__title"> Home </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="top-menu__title"> Menu Data <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('homeruangan') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Ruangan </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homekelas') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Kelas </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="top-menu__title"> Menu Sarpras <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('homesarprasruangan') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Sarpras Ruangan </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homesarpraskelas') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Data Sarpras Kelas </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('homereqsarpras') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="top-menu__title"> Request Sarpras </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="top-menu__title"> Menu Laporan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Inventory Kelas <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('homelaporansarpraskelas') }}" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Sarana Kelas</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Inventory Ruangan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('homelaporansarprasruangan') }}" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Sarana Ruangan</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Laporan Kebersihan <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Kebersihan Sarpras</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Kebersihan Lantai</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="top-menu__title"> Laporan Annual <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Harian</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Mingguan</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="top-menu">
                                            <div class="top-menu__icon"> <i data-feather="file-plus"></i> </div>
                                            <div class="top-menu__title">Laporan Bulanan</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <!-- END: Top Menu -->
        @yield('content')
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('back/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>.
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        @stack('scripts')
        <!-- END: JS Assets-->
    </body>
</html>