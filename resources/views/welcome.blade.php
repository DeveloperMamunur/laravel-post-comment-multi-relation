<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <title>Post Comment</title>

    <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    </head>
    <body class="antialiased">
        <div class="grid-container">

            <!-- Header -->
            <header class="header">
                <nav>
                    <div class="menu-icon" onclick="openSidebar()">
                        <span class="material-icons-outlined">menu</span>
                      </div>
                      <ul>

                          <li>
                            <a href="{{url('/')}}">Home</a>
                          </li>
                          <li>
                            <a href="{{url('/post')}}">Posts</a>
                          </li>
                          @if (Route::has('login'))

                                @auth
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                    </li>
                                    <li>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        @endif
                                    </li>
                                @endauth
                            @endif

                      </ul>
                      <div class="header-right">
                        <span class="material-icons-outlined">search</span>
                        <span class="material-icons-outlined">notifications</span>
                        <span class="material-icons-outlined">email</span>
                        <span class="material-icons-outlined">account_circle</span>
                      </div>
                </nav>
            </header>
            <!-- End Header -->
            <!-- Main -->
            <main class="main-container">
                @yield('body')
            </main>
            <!-- End Main -->
             <!-- Sidebar -->

            <!-- Scripts -->
            <!-- ApexCharts -->
            <!-- Custom JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="{{asset('assets/js/scripts.js')}}"></script>
    </body>
</html>

