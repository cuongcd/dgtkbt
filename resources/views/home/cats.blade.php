@extends('template.master')
@section('content')

    <div class="row">
        <div class="col-md-9">
            <h2>{{$posts['cat_name']['name']}}</h2>
            <hr>
            @include('template.layouts.cats')
        </div>
        <div class="col-md-3 none_padding-right">
            @include('template.wedget.booking')
            @include('template.wedget.quangcao1')
        </div>
    </div>
@stop


@section('include')
    <link href="/css/contact.css" rel="stylesheet">
    <link href="/css/cats.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/ticket.css">
    <link rel="stylesheet" type="text/css" href="/css/news.css">
    <script src="/js/jquery-ui-1.9.2.custom.js"></script>
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var OPCHECKED = null;
            var OPROWCHECK = null;
            jQuery(".sky_ticket_parent td").click(function () {
                if (jQuery(this).hasClass("detail")) {
                    var idm = jQuery(this).parent().attr("id").replace("parent-", "");
                    if (jQuery(this).parent().hasClass("selected")) {
                        jQuery(this).parent().removeClass("selected");
                        jQuery("#children-" + idm).css("display", "none");
                        jQuery(this).parent().find(".box-detail").find("span").attr("class", "glyphicon glyphicon-plus");
                    } else {
                        jQuery(this).parent().addClass("selected");
                        jQuery("#children-" + idm).css("display", "table-row");
                        jQuery(this).parent().find(".box-detail").find("span").attr("class", "glyphicon glyphicon-minus");
                    }
                } else {
                    if (OPCHECKED != null) {
                        OPCHECKED.removeAttr("checked");
                    }
                    if (OPROWCHECK != null) {
                        OPROWCHECK.removeClass("selectedrow");
                    }
                    OPROWCHECK = jQuery(this).parent();
                    OPCHECKED = OPROWCHECK.find(".skyticketradio");
                    OPCHECKED.attr("checked", "checked");
                    OPROWCHECK.addClass("selectedrow");
                }
            });

            var text = null;
            jQuery(".skybooked").click(function () {
                if (text == null) {
                    text = jQuery(this).html();
                }
                if (jQuery(this).hasClass('btn-primary')) {
                    jQuery(this).removeClass('btn-primary').addClass('btn-success').html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
                } else {
                    jQuery(this).removeClass('btn-success').addClass('btn-primary').html(text);
                }
            });

            jQuery.datepicker.setDefaults({
                dateFormat: 'dd/mm/yy',
                minDate: new Date()
            });
            jQuery(".datepicker").datepicker({
                // showOn: "button",
                // buttonImage: "img/calendar.png",
                showAnim: 'drop',
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 2/*,
                 showButtonPanel: true*/
            });
        });
    </script>
@stop