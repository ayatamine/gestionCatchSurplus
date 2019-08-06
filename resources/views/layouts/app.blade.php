<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/custom-style.css')}}">
    <!-- added style by me -->
    <style>
     #app{
       background: #eeedef;    padding-bottom: 65px;
     }
     .cb{background:#fff}
    </style>
    @yield('style')
</head>
<body>
    <div id="app">
            @guest
            <nav class="main-header mr-0 navbar navbar-expand bg-white navbar-light border-bottom">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                      
                      <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('login')}}" class="nav-link">تسجيل الدخول</a>
                      </li>
                      <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('register')}}" class="nav-link">تسجيل</a>
                      </li>
                    </ul>
                
                    <!-- SEARCH FORM -->
                    
                
                    <!-- Right navbar links -->
                    <ul class="navbar-nav mr-auto">
                      
                      
                      
                      
                      <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"></a>
                      </li>
                    </ul>
            </nav>
            @else
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                      
                            <li class="nav-item d-none d-sm-inline-block">
                                    <a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                     class="nav-link"> تسجيل الخروج</a>
                            </li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </ul>
                
                    <!-- SEARCH FORM -->
                    
                
                    <!-- Right navbar links -->
                    <ul class="navbar-nav mr-auto">
                      
                      
                      
                      
                      <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"></a>
                      </li>
                    </ul>
            </nav>
            @endguest

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
