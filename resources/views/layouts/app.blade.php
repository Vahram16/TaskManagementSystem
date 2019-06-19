<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/all.min.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div>
    @include('layouts.navbar')
</div>

<div class="container">
    @yield('content')
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.dataTables.js"></script>
<script src="/js/jquery.easing.min.js"></script>

@stack('scripts')
</body>
</html>