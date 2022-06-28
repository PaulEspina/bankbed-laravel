<html>
    <head>
        <title>Banking System - @yield('title')</title>
    </head>
    <body>
        <div>
            <form method="GET" action="/logout"><input type="submit" value="Logout"></form>
        </div>
 
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>