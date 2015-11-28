<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="gedrixCreative">

        <title>Krenova - @yield('title')</title>

        <!-- Material Design -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="//assets.gedrix.net/gedrixcom/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}" type="text/css">
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color-text--grey-600">
            <main class="mdl-layout__content">
                <div class="page-content">@yield('content')</div>
            </main>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Copyright @ 2015 gedrixCreative</div>
              </div>
            </footer>
        </div>
        <script src="//cdn-ck.gedrix.net/assets/js/jquery.js"></script>
        @yield('bottom_js')
    </body>
</html>
