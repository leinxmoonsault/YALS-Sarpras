@extends('layouts.LayoutBE')
 
@section('content')
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                    <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset('front/images/logo/logo-simple.png') }}">
                </div> 
                <div class="dropdown-menu w-56">
                    <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                            {{-- <div class="font-medium">{{Auth::user()->name}}</div> --}}
                            {{-- <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{Auth::user()->username}}</div> --}}
                        </div>
                        <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                            <a href="{{ route('pagelogoutadmin') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                                <form action="{{ route('pagelogoutadmin') }}" id="logout-form" method="post">
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
        <!-- END: Top Bar -->
        <img src="{{ asset('front/images/logo/logo.png') }}" alt="Images">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <!-- <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i> 
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">4.710</div>
                                        <div class="text-base text-gray-600 mt-1">Item Sales</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> 
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">3.721</div>
                                        <div class="text-base text-gray-600 mt-1">New Orders</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="monitor" class="report-box__icon text-theme-12"></i> 
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">2.149</div>
                                        <div class="text-base text-gray-600 mt-1">Total Products</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">152.040</div>
                                        <div class="text-base text-gray-600 mt-1">Unique Visitor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- END: General Report -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection