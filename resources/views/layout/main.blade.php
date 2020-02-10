<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
<body class="hold-transition sidebar-mini">
    @include('layout.partials.header-menu')
    @include('layout.partials.main-nav')
    @yield('content')
    @include('layout.partials.footer')
    @include('layout.partials.footer-scripts')
</body>
</html>
