
<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
        {!! HTML::style('font-awesome/css/font-awesome.min.css')!!}

        {!! HTML::style('css/inventory/smartadmin-production.min.css')!!}
        {!! HTML::style('css/inventory/smartadmin-skins.min.css')!!}

        {!! HTML::style('css/inventory/demo.min.css')!!}
        {!! HTML::style('css/login.css') !!}
    
        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="/favicon2.ico" type="image/x-icon">
        <link rel="icon" href="/favicon2.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

    </head>

    <body class="animated fadeInDown">

        <header id="header">

            <div id="logo-group">
                <span id="logo">  </span>
            </div>

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-4 hidden-xs hidden-sm">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                        <div class="well no-padding">
                            {!!$content!!}
                        </div>
                        
                        @if (isset($footer))
                            {!! $footer !!}
                        @endif
                        
                        @if (0)

                        <h5 class="text-center"> - {{Lang::get('general.or_sign_in_using')}} -</h5>

                        <ul class="list-inline text-center">
                            <li>
                                <a href="#" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                        
                        @endif

                    </div>
                </div>
            </div>

        </div>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

        <!-- IMPORTANT: APP CONFIG -->
        {!! HTML::script('js/inventory/app.config.js')!!}

        <!-- BOOTSTRAP JS -->
        {!! HTML::script('bootstrap/js/bootstrap.min.js')!!}

        <!-- MAIN APP JS FILE -->
        {!! HTML::script('js/inventory/app.min.js')!!}

    </body>
</html>