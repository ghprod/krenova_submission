<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="gedrixCreative">

        <title>Krenova - @yield('title')</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" type="text/css">
        <link href="//cdn-ck.gedrix.net/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//assets.gedrix.net/gedrixcom/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="page-content">@yield('content')</div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="text-muted">Aplikasi dikembangkan oleh <a href="http://www.gedrix.com" target="_blank">gedrixCreative</a>.</p>
            </div>
        </footer>
        <script src="//cdn-ck.gedrix.net/assets/js/jquery.js"></script>
        <script src="//cdn-ck.gedrix.net/assets/js/bootstrap.min.js"></script>
        @yield('bottom_js')
    </body>
</html>
