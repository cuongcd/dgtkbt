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
    {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css')!!}
    {!! HTML::style('css/animate.css')!!}
    {!! HTML::style('css/style.css')!!}
    {!! HTML::style('css/plugins/dataTables/dataTables.tableTools.min.css') !!}
    {!! HTML::style('css/plugins/iCheck/custom.css')  !!}
    {!! HTML::style('css/search-dropdown.css')!!}
    {!! HTML::style('css/plugins/datapicker/datepicker3.css')!!}

    {!! HTML::style('css/product/edit.style.css')!!}
    {!! HTML::script('js/product.js') !!}
    
    {!! HTML::style('css/plugins/dropzone/basic.css')!!}
    {!! HTML::style('css/plugins/switchery/switchery.css') !!}
	{!! HTML::style('css/plugins/summernote/summernote.css') !!}
	{!! HTML::style('css/plugins/summernote/summernote-bs3.css') !!}
	{!! HTML::style('css/plugins/chosen/chosen.css') !!}
	{!! HTML::style('css/plugins/pgwmodal/pgwmodal.min.css') !!}
	{!! HTML::style('css/plugins/jsTree/style.min.css')!!}
	{!! HTML::style('css/plugins/jasny/jasny-bootstrap.min.css')!!}
    
    <!-- Mainly scripts -->
    {!! HTML::script('js/jquery-1.11.1.min.js')!!}
    {!! HTML::script('js/bootstrap.min.js')!!}
    {!! HTML::script('js/plugins/metisMenu/jquery.metisMenu.js')!!}
    {!! HTML::script('js/plugins/slimscroll/jquery.slimscroll.min.js')!!}
    
    <!-- Custom and plugin javascript -->
    {!! HTML::script('js/inspinia.js')!!}
    {!! HTML::script('js/plugins/datepicker/bootstrap-datepicker.js')!!}
    {!! HTML::script('js/plugins/pace/pace.min.js')!!}
    {!! HTML::script('js/plugins/validate/jquery.validate.min.js')!!}
    
    {!! HTML::script('js/plugins/dropzone/dropzone.js') !!}
	{!! HTML::script('js/plugins/switchery/switchery.js') !!}
	{!! HTML::script('js/plugins/summernote/summernote.min.js') !!}
	{!! HTML::script('js/plugins/sortable/Sortable.min.js') !!}
	{!! HTML::script('js/plugins/chosen/chosen.jquery.js') !!}
	{!! HTML::script('js/plugins/iCheck/icheck.min.js') !!}
	{!! HTML::script('js/plugins/pgwmodal/pgwmodal.min.js') !!}
	{!! HTML::script('js/plugins/jsTree/jstree.min.js')!!}
	{!! HTML::script('js/plugins/jasny/jasny-bootstrap.min.js')!!}
	{!! HTML::script('js/grid.js')!!}
	{!! HTML::script('js/jquery.base64.min.js') !!}
	{!! HTML::script('js/mix.js') !!}
	{!! HTML::script('js/product-custom-option.js') !!}
    {!! HTML::script('js/alert-jquery.js')!!}
    {!! HTML::style('css/alert-jquery.css') !!}
    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	
</head>

<body>
<div id="wrapper">
	{!! Widget::get('menu') !!}
	<div id="page-wrapper" class="white-bg">
       @include('layouts._header')
       @include('layouts._messages')
       @yield('content')
       @include('layouts._footer')
	</div>
</div>
</body>
</html>
