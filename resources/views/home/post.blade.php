@extends('template.master')
@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1 style="text-align: left;">{{isset($posts)?$posts['title']:''}}</h1>
            <hr>
            @include('template.layouts.post')
            <div id="fb-root"></div>
            <div class="fb-like" data-href="" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="col-md-3 none_padding-right">
            @include('template.wedget.booking')
            @include('template.wedget.quangcao1')
            @include('template.wedget.tinlienquan')
        </div>
    </div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@stop


@section('include')
    {!! HTML::style('css/contact.css')!!}
    {!! HTML::style('css/cats.css')!!}
    {!! HTML::style('css/ticket.css')!!}
    {!! HTML::style('css/news.css')!!}
    {!! HTML::style('css/jquery-ui.css')!!}
    {!! HTML::script('js/jquery-ui-1.9.2.custom.js')!!}
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".fb-like").attr("data-href",window.location.href);
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