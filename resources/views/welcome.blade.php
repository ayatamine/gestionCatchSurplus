<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>الاستعلام</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                @if (Route::has('login'))
                <div class="top-right links text-right">
                    @auth
                            @if(Auth::user()->admin)
                            <a href="{{ url('/admin-cpx') }}">لوحة التحكم</a>  
                            <a href="{{ url('/logout') }}">تسجيل الخروج</a>
                            @endif
                        <a href="{{ route('front.benificier') }}">صفحة الاستعلام</a>
                    @else
                        <a href="{{ route('login') }}"> تسجيل الدخول</a>
                        
                        <a href="{{ route('front.benificier') }}">صفحة الاستعلام </a>
                       
                    @endauth
                </div>
            @endif 
            </div>
        </div>
    </body>
</html>
