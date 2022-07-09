<html>
    <head>
        <title>Banking System - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		@stack('head')
    </head>
    <body>
        <div>
            @yield('content')
        </div>
        <div>
            @if(Session::has('message'))
            {{Session::get('message')}}
            @endif
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>

        @stack('scripts')
    </body>
</html>