<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grocery Admin Dashboard</title>
        @include('backend.includes.style')
        </head>
    <body class="sb-nav-fixed">
        @include('backend.includes.header')
        <div id="layoutSidenav">
           @include('backend.includes.sidebar')
            <div id="layoutSidenav_content">
               @yield('content')
                <footer class="py-4 bg-light mt-auto">
                   @include('backend.includes.footer')
                </footer>
            </div>
        </div>
        @include('backend.includes.scripte')
    </body>
</html>
