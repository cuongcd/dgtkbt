@extends('template.master')
@section('include')
    <link href="/css/contact.css" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <script src="/js/owl.carousel.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            function initialize() {
                var styles = [
                    {
                        featureType: "all",
                        stylers: [
                            {saturation: -80}
                        ]
                    }, {
                        featureType: "road.arterial",
                        elementType: "geometry",
                        stylers: [
                            {hue: "#00ffee"},
                            {saturation: 50}
                        ]
                    }, {
                        featureType: "poi.business",
                        elementType: "labels",
                        stylers: [
                            {visibility: "off"}
                        ]
                    }
                ];

                var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});


                var myLatLng = {lat: 21.0460109, lng: 105.7949882};
                var mapProp = {
                    center: new google.maps.LatLng(21.0460109, 105.7949882),
                    zoom: 17,
                    mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                    }/*,
                     mapTypeId:google.maps.MapTypeId.ROADMAP*/
                };

                var map = new google.maps.Map(document.getElementById("address_company"), mapProp);

                map.mapTypes.set('address_company', styledMap);
                map.setMapTypeId('address_company');
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: mapProp,
                    animation: google.maps.Animation.DROP,
                    icon: 'img/marker.png',
                    title: 'Đại lý vé máy bay Sky'
                });
                marker.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);


            jQuery("#owl-demo").owlCarousel({
                jsonPath: 'data/imagevanphongs.json',
                items: 4,
                lazyLoad: true,
                jsonSuccess: customDataSuccess/*,
                 navigation : true*/
            });
            function customDataSuccess(data) {
                var content = "";
                for (var i in data["items"]) {

                    var img = data["items"][i].img;
                    var alt = data["items"][i].alt;

                    content += "<img src=\"" + img + "\" alt=\"" + alt + "\">"
                }
                jQuery("#owl-demo").html(content);
            }
        });
    </script>
@stop


@section('content')
    <div class="row">
        <div class="col-md-5">
            <!-- content -->
            <div class="row">
                <h1 class="none_top header-h">CÔNG TY TNHH VÉ MÁY BAY TRỰC TUYẾN SKY </h1>

                <h3><strong>Địa chỉ văn phòng tại Hà Nội</strong></h3>

                <div class="row">
                    24 Chợ nghĩa tân, Thanh Xuân Hà Nội
                </div>
                <div class="row">
                    <div class="row-40 label-contact">Điện thoại</div>
                    <div class="row-60">01900 1919 192</div>
                </div>
                <div class="row">
                    <div class="row-40 label-contact">Fax</div>
                    <div class="row-60">01900 1919 192</div>
                </div>
                <div class="row">
                    <div class="row-40 label-contact">Email</div>
                    <div class="row-60">salse@sky.vn</div>
                </div>
                <div class="row">
                    <div id="address_company"></div>
                </div>
            </div>
            <!-- end content -->
        </div>

        <form method="post" action="{{URL::route('contact')}}">
            <div class="col-md-4">
                <!-- form contant -->
                <div class="row">
                    <div class="row">
                        <div class="row-50">
                            <div class="row">
                                {{ trans('label_fontend.ten_nguoi_gui') }} (*)
                            </div>
                            <div class="row">
                                <input type="text" class="form-control none-style change_place none_border_right"
                                       name="name" autocomplete="OFF" required>
                            </div>
                        </div>
                        <div class="row-50">
                            <div class="row">
                                {{ trans('label_fontend.email') }} (*)
                            </div>
                            <div class="row">
                                <input type="email" class="form-control none-style change_place" autocomplete="OFF"
                                       name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-50">
                            <div class="row">
                                {{ trans('label_fontend.so_dien_thoai') }} (*)
                            </div>
                            <div class="row">
                                <input type="text" class="form-control none-style change_place" autocomplete="OFF"
                                       name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-100">
                            <div class="row">
                                {{ trans('label_fontend.noi_dung_gui') }} (*)
                            </div>
                            <div class="row">
                                <textarea type="text" class="form-control  change_place" rows="5" required
                                          name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-100" style="margin-top: 2%">
                            <button class="btn  btn-success">{{ trans('label_fontend.gui') }}</button>
                        </div>
                    </div>
                </div>
                <!-- end form contact -->
            </div>
        </form>

        <div class="col-md-3 none_padding-right">
            @include('template.wedget.booking')
            @include('template.wedget.quangcao1')
        </div>
    </div>
    <!-- list customer -->
    <div id="owl-demo" class="owl-carousel">
    </div>
    <!-- end list customer -->
@stop

<script>
    @if(Session::has('mes'))
            alert('Thank for your contact!');
    @endif
</script>
 