<!DOCTYPE html>
<html lang="vi-vn">
<head>
	<meta charset="utf-8">
	<title> {{$pageTitle or null}} </title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	{!! HTML::style('css/bootstrap.css')!!}
    {!! HTML::style('font-awesome/css/font-awesome.css')!!}
    {!! HTML::style('css/animate.css')!!}
    {!! HTML::style('css/style.css')!!}
    {!! HTML::style('css/plugins/dataTables/dataTables.tableTools.min.css') !!}
    
    <!-- Mainly scripts -->
    {!! HTML::script('js/jquery-1.11.1.min.js')!!}
    {!! HTML::script('js/bootstrap.min.js')!!}
    {!! HTML::script('js/plugins/metisMenu/jquery.metisMenu.js')!!}
    {!! HTML::script('js/plugins/slimscroll/jquery.slimscroll.min.js')!!}
    {!! HTML::script('js/plugins/jquery-ui/jquery-ui.min.js')!!}
    
    <!-- Custom and plugin javascript -->
    {!! HTML::script('js/inspinia.js')!!}
    
    <!--  Sync JS -->
    {!! HTML::script('js/sync.js') !!}
    
    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	
</head>

<body>
<div id="wrapper">
	<div id="page-wrapper" class="white-bg" style="margin: 0;">
        <div class="wrapper wrapper-content">
		    {!! $content !!}
		</div>
    </div>
</div>
</body>
</html>
