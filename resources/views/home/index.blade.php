@extends('template.master')
        <!-- map -->

@section('content')
    <div id="change_cities" class="ui-dialog ui-widget ui-widget-content ui-corner-all  " tabindex="-1" role="dialog"
         aria-labelledby="ui-dialog-title-list-departure"
         style=" z-index: 1029; outline: 0px; position: absolute; top: 334px; left: 372px; height: auto; width: 580px;">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title"
                                                                                                id="ui-dialog-title-list-departure">Lựa chọn thành phố hoặc sân bay xuất phát</span><a
                    href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span
                        class="ui-icon ui-icon-closethick">close</span></a></div>
        <div id="list-departure" class="dialog listCity ui-dialog-content ui-widget-content"
             style="display: block; width: auto; min-height: 93.039999961853px; height: auto;" scrolltop="0"
             scrollleft="0">
            <div class="domestic-col">
                <ul>
                    <li class="title">Miền Bắc</li>
                    <li><a airportcode="HAN" href="#"><b>Hà Nội </b><span>(HAN)</span> </a></li>
                    <li><a airportcode="HPH" href="#"><b>Hải Phòng</b> <span>(HPH)</span> </a></li>
                    <li><a airportcode="DIN" href="#"><b>Điện Biên</b> <span>(DIN)</span> </a></li>
                </ul>
                <ul>
                    <li class="title">Miền Trung</li>
                    <li><a airportcode="THD" href="#"><b>Thanh Hóa</b> <span>(THD)</span> </a></li>
                    <li><a airportcode="VII" href="#"><b>Vinh</b> <span>(VII)</span> </a></li>
                    <li><a airportcode="HUI" href="#"><b>Huế</b> <span>(HUI)</span> </a></li>
                    <li><a airportcode="VDH" href="#"><b>Đồng Hới</b> <span>(VDH)</span> </a></li>
                    <li><a airportcode="DAD" href="#"><b>Đà Nẵng</b> <span>(DAD)</span> </a></li>
                    <li><a airportcode="TMK" href="#"><b>Tam Kỳ</b> <span>(VCL)</span> </a></li>
                    <li><a airportcode="PXU" href="#"><b>Pleiku</b> <span>(PXU)</span> </a></li>
                    <li><a airportcode="TBB" href="#"><b>Tuy Hòa</b> <span>(TBB)</span> </a></li>
                </ul>
            </div>
            <div class="domestic-col">
                <ul>
                    <li class="title">Miền Nam</li>
                    <li><a airportcode="SGN" href="#"><b>Hồ Chí Minh </b><span>(SGN)</span> </a></li>
                    <li><a airportcode="CXR" href="#"><b>Nha Trang</b> <span>(CXR)</span> </a></li>
                    <li><a airportcode="DLI" href="#"><b>Đà Lạt</b> <span>(DLI)</span> </a></li>
                    <li><a airportcode="PQC" href="#"><b>Phú Quốc</b> <span>(PQC)</span> </a></li>
                    <li><a airportcode="UIH" href="#"><b>Qui Nhơn</b> <span>(UIH)</span> </a></li>
                    <li><a airportcode="VCA" href="#"><b>Cần Thơ</b> <span>(VCA)</span> </a></li>
                    <li><a airportcode="VCS" href="#"><b>Côn Đảo</b> <span>(VCS)</span> </a></li>
                    <li><a airportcode="BMV" href="#"><b>Ban Mê Thuột</b> <span>(BMV)</span> </a></li>
                    <li><a airportcode="VKG" href="#"><b>Rạch Giá</b> <span>(VKG)</span> </a></li>
                    <li><a airportcode="CAH" href="#"><b>Cà Mau</b> <span>(CAH)</span> </a></li>
                </ul>
            </div>
        </div>
        <div class="ui-resizable-handle ui-resizable-n"></div>
        <div class="ui-resizable-handle ui-resizable-e"></div>
        <div class="ui-resizable-handle ui-resizable-s"></div>
        <div class="ui-resizable-handle ui-resizable-w"></div>
        <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se ui-icon-grip-diagonal-se"
             style="z-index: 1001;"></div>
        <div class="ui-resizable-handle ui-resizable-sw" style="z-index: 1002;"></div>
        <div class="ui-resizable-handle ui-resizable-ne" style="z-index: 1003;"></div>
        <div class="ui-resizable-handle ui-resizable-nw" style="z-index: 1004;"></div>
    </div>





    <!-- content -->
    <div id="content">
        <!-- content booking -->
        <div class="row content-booking">
            <!-- row -->
            <div class="row">
                <!-- col-md-5 booking -->
                <div class="col-md-5 booking">
                    <div class="booking-header">
                        <div class="text-center color-blue">
                            {{ trans('label_fontend.dat_ve_may_bay') }}
                            <!-- </div> -->
                            <!-- <div class="text-left"> -->
                            <!-- Vé quốc tế -->
                        </div>
                    </div>
                    <div class="booking-hr">
                        <div class="booking-hr-content"></div>
                    </div>
                    <form>
                        <div class="booking-content">
                            <div class="booking-form  ">
                                <!-- <label>
                                    <input type="radio" name="loaive" value="khuhoi"/>
                                    Khứ hồi
                                </label>
                                <label>
                                    <input type="radio" name="loaive" value="motchieu"/>
                                    Một chiều
                                </label> -->
                                <div class="row">
                                    <div class="col-md-6 colum-from">
                                        <div class="row icon-up label-bold">
                                            {{ trans('label_fontend.khoi_hanh_tu') }}
                                        </div>
                                        <div class="row">
                                            <input type="text" name="arrived_place" id="arrived_place"
                                                   class="form-control none-style change_place"
                                                   placeholder="Điểm xuất phát" autocomplete="OFF">
                                            <input name="arrived_code" class="arrived_code hide" /> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 colum-from2">
                                        <div class="row icon-down label-bold">
                                            {{ trans('label_fontend.khoi_hanh_toi') }}
                                        </div>
                                        <div class="row">
                                            <input type="text" id="departure_place"
                                                   class="form-control none-style change_place" placeholder="Điểm đến"
                                                   autocomplete="OFF">
                                            <input name="departure_code" class="departure_code hide" /> 

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 colum-from ">
                                        <div class="row label-bold">
                                            {{ trans('label_fontend.arrive_date') }}
                                        </div>
                                        <div class="row">
                                            <input type="text" class="icon-date form-control none-style datepicker"
                                                   value="2015-08-11">
                                        </div>
                                    </div>
                                    <div class="col-md-6 colum-from2">
                                        <div class="row label-bold">
                                            {{ trans('label_fontend.departure_date') }}
                                        </div>
                                        <div class="row ">
                                            <input type="text" class="icon-date form-control none-style datepicker"
                                                   value="2015-08-11">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 label-form">
                                        {{ trans('label_fontend.adults') }}
                                    </div>
                                    <div class="col-md-4 label-form2 text-left">
                                        <select class="form-control none-style ">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 note-form">
                                        ({{ trans('label_fontend.tu_12_tuoi_tro_len') }})
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 label-form">
                                        {{ trans('label_fontend.children') }}
                                    </div>
                                    <div class="col-md-4 label-form2 text-left">
                                        <select class="form-control none-style ">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 note-form">
                                        ({{ trans('label_fontend.tu_2_toi_11') }})
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 label-form">
                                        {{ trans('label_fontend.tre_so_sinh') }}
                                    </div>
                                    <div class="col-md-4 label-form2 text-left">
                                        <select class="form-control none-style ">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 note-form">
                                        ({{ trans('label_fontend.duoi_2') }})
                                    </div>
                                </div>
                                <!-- <select class="nonw_style_option">
                                    <option value="0">Vé giá rẻ</option>
                                </select><br> -->
                                <button class="btn btn-warning bnt-search">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    TÌM KIẾM
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- the end col-md-5 booking  -->

                <!-- slide -->
                <div class="col-md-7 slide_wrap">
                    <div class="slide slider-pro" id="slides">
                        <div class="sp-slides">
                            @if(isset($slides))
                                @foreach($slides as $slide)
                                    <div class="sp-slide">
                                        <img class="sp-image"
                                             src="/{{ $slide['url'] }}"
                                             data-src="/{{ $slide['url'] }}"
                                             data-small="/{{ $slide['url'] }}"
                                             data-medium="/{{ $slide['url'] }}"
                                             data-large="/{{ $slide['url'] }}"
                                             data-retina="/{{ $slide['url'] }}"/>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- the end slide -->
            </div>
            <!-- the end row -->
        </div>
        <!-- the end content booking -->


        <div class="clean"></div>

        <!-- content 2 -->
        <div class="row content-session">

            <div class="col-md-6 colum-from">
                <!-- content tab -->
                <div class="content-content-session">
                    <div class="row text-center header-content-session">Các hình thức đặt vé</div>
                    <div class="row row-content-wrap">
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">1</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Trực tiếp lên website, nhanh nhất - tiện nhất</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">2</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Qua chat</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">3</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Gọi điện thoại cho Sky</strong><br>

                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HÀ NỘI</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HCM</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">4</div>
                                </div>
                                <div class="row-conetnt-right">
                                    Trực tiếp lên website, nhanh nhất tiện nhất
                                    <div id="googleMap" style="width:80%;height:200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content tab -->
            </div>

            <div class="col-md-6 colum-from">
                <!-- content tab -->
                <div class="content-content-session">
                    <div class="row text-center header-content-session">Các hình thức đặt vé</div>
                    <div class="row row-content-wrap">
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">1</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Trực tiếp lên website, nhanh nhất - tiện nhất</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">2</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Qua chat</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">3</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Gọi điện thoại cho Sky</strong><br>

                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HÀ NỘI</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HCM</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">4</div>
                                </div>
                                <div class="row-conetnt-right">
                                    Trực tiếp lên website, nhanh nhất tiện nhất
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content tab -->
            </div>


        </div>
        <!-- end content2 -->
        <div class="clean"></div>
        <!-- content 2 -->
        <div class="row content-session">

            <div class="col-md-6 colum-from">
                <!-- content tab -->
                <div class="content-content-session">
                    <div class="row text-center header-content-session">Các hình thức đặt vé</div>
                    <div class="row row-content-wrap">
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">1</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Trực tiếp lên website, nhanh nhất - tiện nhất</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">2</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Qua chat</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">3</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Gọi điện thoại cho Sky</strong><br>

                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HÀ NỘI</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HCM</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">4</div>
                                </div>
                                <div class="row-conetnt-right">
                                    Trực tiếp lên website, nhanh nhất tiện nhất
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content tab -->
            </div>


            <div class="col-md-6 colum-from">
                <!-- content tab -->
                <div class="content-content-session">
                    <div class="row text-center header-content-session">Các hình thức đặt vé</div>
                    <div class="row row-content-wrap">
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">1</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Trực tiếp lên website, nhanh nhất - tiện nhất</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">2</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Qua chat</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">3</div>
                                </div>
                                <div class="row-conetnt-right">
                                    <strong>Gọi điện thoại cho Sky</strong><br>

                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HÀ NỘI</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                    <div class="row-50">
                                        <strong class="color-blue">HOTLINE HCM</strong><br>

                                        <div>093 219 939</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-content">
                            <div class="row">
                                <div class="row-content-left">
                                    <div class="round-number">4</div>
                                </div>
                                <div class="row-conetnt-right">
                                    Trực tiếp lên website, nhanh nhất tiện nhất
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content tab -->
            </div>

        </div>
        <!-- end content2 -->


    </div>
    <!-- the end content -->

    <!-- list customer -->
    <div id="owl-demo" class="owl-carousel">
    </div>
    <!-- end list customer -->
@stop
@section('include')
    <link rel="stylesheet" type="text/css" href="css/slider-pro.min.css">
    <script type="text/javascript" src="js/jquery.sliderPro.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script src="js/jquery-ui-1.9.2.custom.js"></script>
    <link href="css/jquery-ui.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <script src="js/owl.carousel.js"></script>

    <script type="text/javascript" src="js/home.js"></script>
@stop