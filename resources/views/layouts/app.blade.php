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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmDeletewithrelations() {
            if(confirm('Are you sure you want to delete this record,There can be links between it and other recordings and this will lead to its deletion?')) {
                return true;
            }
            return false;
        }
        function confirmDelete() {
            if(confirm('Are you sure you want to delete this record?')) {
                return true;
            }
            return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            $(".close").click(function(){
                $(".alert").fadeOut();
            });
        });
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="margin-left: -9%;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <a href="{{route('all_employee')}}" class="btn btn-secondary">Employees</a>
                                <a href="{{route('all_client')}}" class="btn btn-secondary">Clients</a>
                                <a href="{{route('all_partner')}}" class="btn btn-secondary">Partners</a>
                                <a href="{{route('all_tech')}}" class="btn btn-secondary">Technologies</a>
                                <a href="{{route('all_service')}}" class="btn btn-secondary">Services</a>
                                <a href="{{route('all_project')}}" class="btn btn-secondary">Projects</a>
                                <a href="{{route('all_product')}}" class="btn btn-secondary">Products</a>
                                <a href="{{route('all_text')}}" class="btn btn-secondary">Texts</a>
                                <a href="{{route('all_image')}}" class="btn btn-secondary">Images</a>
                                <a href="{{route('all_vacancy')}}" class="btn btn-secondary">Vacancies</a>
                                <a href="{{route('all_guestmessage')}}" class="btn btn-secondary">Messages</a>
                                <a href="{{route('all_askforservices')}}" class="btn btn-secondary">Ask For Service Messages</a>
                                <a href="{{route('all_image_config')}}" class="btn btn-secondary">Image Configs</a>
                                <a href="{{route('all_config')}}" class="btn btn-secondary">Configs</a>
                                <a href="{{route('all_user')}}" class="btn btn-secondary">Users</a>


                            </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-left: -295%;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('password') }}">
                                        {{ __('Change Password') }}
                                    </a>     
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        @include('flash-message')

            @yield('content')
        </main>
    </div>
</body>
</html>
