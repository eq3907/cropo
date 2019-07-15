@include('web_global.header')
@include('web_global.head')
@include('web_global.menu')
@include('web_global.breadcrumbs')
@include('web_global.script')
<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
</head>
<body class="skin-default">
    <header class="header">
        @yield('header')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @yield('menu')
        <aside class="right-side">
            @yield('breadcrumbs')
            @yield('main')
        </aside>
    </div>
  @yield('script')
  @yield('page_js')
</body>
</html>


