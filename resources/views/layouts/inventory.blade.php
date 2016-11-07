<!DOCTYPE html>
<html lang="vi-vn">
<head>
    <meta charset="UTF-8">
    <title> {{$pageTitle or null}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @include('layouts._resources')
</head>

<body>
<div id="wrapper">
    {!! Widget::get('menu') !!}
    <div id="page-wrapper" class="white-bg">
        <div id="ajax-loading-mask" class="loading-mask"></div>
        <div id="ajax-loading" class="loading">
            <img src="{{URL::to('images/loading.gif')}}" alt="{{Lang::get('general.loading...')}}"/>

            <p>{{Lang::get('general.please_wait')}}</p>
        </div>
        @include('layouts._header')

        <div class="wrapper wrapper-content animated fadeInRight">
            @include('layouts._messages')
            {!! $content !!}
        </div>
        @include('layouts._footer')
    </div>
</div>
</body>
</html>