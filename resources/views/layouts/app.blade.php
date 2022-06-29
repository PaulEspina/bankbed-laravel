<html>
    <head>
        <title>Banking System - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    </head>
    <body>
        <div>
            <p>Hi, {{ Auth::user()->first_name.(Auth::user()->middle_name ?? "")." ".Auth::user()->last_name }}!</p>
            <form method="GET" action="/logout"><input type="submit" value="Logout"></form>
        </div>
 
        <div class="container">
            @yield('content')
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>