{{-- Layout base admin panel --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">


    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/baselayout.css') }}
    {{ HTML::style('assets/css/fonts.css') }}
    {{ HTML::style('assets/css/font-awesome.min.css') }}


    {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    @yield('head_css')
    {{-- End head css --}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <body>
        {{-- navbar --}}
        @include('admin.layouts.navbar')

        {{-- content --}}
        <div class="container-fluid">
            @yield('container')
        </div>

        {{-- Start footer scripts --}}
        @yield('before_footer_scripts')


        @yield('footer_scripts')
        {{-- End footer scripts --}}
    </body>
</html>