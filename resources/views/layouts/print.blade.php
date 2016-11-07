<!DOCTYPE html>
<html lang="vi-vn">
<head>
    @include('layouts._resources')
    <style>
        body {
            background: white;
        }
        .order-comments {
            display: none;
        }
        .ibox-tools {
            display: none;
        }
        .float-e-margins {
            display: none;
        }
        .panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-color: #ddd;
        }
        .panel-default {
            border-color: #ddd;
            border: 1px solid transparent;
        }
        .col-xs-12 {
            width: 100% !important;
            margin: 0px !important;
            padding: 2% !important;
            float: left;
        } 
        .col-xs-8 {
            width: 62% !important;
            margin: 0px !important;
            padding: 0 2% !important;
            float: left;
        }
        .col-xs-6 {
            width: 46% !important;
            margin: 0px !important;
            padding: 0 2% !important;
            float: left;
        }
        .col-xs-4 {
            width: 33% !important;
            margin: 0px !important;
            padding: 0 2% !important;
            float: left;
        }
        .control-label {
            text-align: right;
            font-weight: bold;
            padding: 7px 0 !important;
        }
        .form-control-static {
            padding: 7px 0 !important;
        }
        .table {
            margin: 15px 0 !important;
        }
        th {
            border-color: #ddd;
            border-bottom: 1px solid transparent;
            box-shadow: none;
            padding: 15px !important;
        }
        td {
            padding: 15px !important;
            border-color: #ddd;
            border-top: 1px solid transparent;
        }
        .m-t {
            margin: 0px !important;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="white-bg" style="padding: 15px 10px 15px 15px;">
        {!! $general_info !!}
        {!! $content !!}
    </div>  
</body>
</html>