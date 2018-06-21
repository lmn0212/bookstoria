@include('layouts.head')
<body style='user-select: none;' onselectstart='return false;'>
@include('layouts.header')

@yield('content')


@include('layouts.footscripts')
@include('layouts.footer')
</body>
</html>