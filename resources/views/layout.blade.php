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
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color-text--grey-600">
            <div class="container">
                <div class="page-content">@yield('content')</div>
            </div>
        </div>
        <script src="//cdn-ck.gedrix.net/assets/js/jquery.js"></script>
        <script src="//cdn-ck.gedrix.net/assets/js/bootstrap.min.js"></script>
        @yield('bottom_js')
    </body>
</html>
