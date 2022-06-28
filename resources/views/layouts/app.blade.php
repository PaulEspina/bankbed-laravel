<html>
    <head>
        <title>Banking System - @yield('title')</title>
    </head>
    <body>
        <div>
            <p>Welcome, {{ Auth::user()->first_name.(Auth::user()->middle_name ?? "")." ".Auth::user()->last_name }}!</p>
            <form method="GET" action="/logout"><input type="submit" value="Logout"></form>
        </div>
 
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>