<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <title>Agenda</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/template.css')}}"/>
</head>
<body>
    @include('layouts.partials.header')
        <main>
            @yield('content')
        </main>
    @include('layouts.partials.footer')
</body>
</html>