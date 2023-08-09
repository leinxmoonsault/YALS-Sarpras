<!DOCTYPE html>

<html lang="en" class="">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('front/images/logo/logo-simple.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Lein">
        <title>Administrator SMK BIT BINA AULIA</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('back/css/app.css') }}"/>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div class="my-auto">
                        <img alt="Logo Sekolah" class="-intro-x w-1/2 -mt-16" src="{{ asset('front/images/logo/logo-simple.png') }}">
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Login.
                        </h2>
                        <form action="{{ route('prosesloginadmin') }}" method="post">
                            @csrf
                            <div class="intro-x mt-8">
                                <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Email" name="username">
                                <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" name="password">
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="btn btn-pOrimary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{asset('back/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>