<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
<body class="sidebar-mini layout-fixed-footer siderbar-open sidebar-closed">

    @include('layout.partials.header-menu')
    @if(Auth::user()->role == 1)
    @include('layout.partials.main-nav')
    @yield('content')
    @elseif(Auth::user()->role == 4)
    @include('layout.partials.vendor.main-nav')
    @yield('content')
    @endif
    @include('layout.partials.footer')
    @include('layout.partials.footer-scripts')

</body>
</html>
