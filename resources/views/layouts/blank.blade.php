<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@stack('style')
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Wrapper start -->
<div class="wrapper">
    <div id="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- Wrapper end -->
</body>

</html>
