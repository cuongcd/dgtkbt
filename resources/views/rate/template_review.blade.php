<div id="product_review">
    <label class="control-label">Danh Sách Nhân Viên</label>

    <div class="ibox float-e-margins" id="productReviews">
        <div class="ibox-title">
            <div class="ibox-tools">
                <a class="collapse-link" id="product-review"><i class="fa fa-chevron-down"></i></a>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-lg-12">
                <fieldset>
                    <div class="form-group locale-element">
                        <label class="col-lg-1 control-label">Phòng</label>

                        <div class="col-lg-2">
                            <select class="form-control input-sm valid" id="room_id" name="room_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\Room::getRoomPhuTrach() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-1 control-label">Tháng</label>

                        <div class="col-lg-2">
                            <div class='input-group date jsDatetimePicker'>
                                <input type='text' class="form-control" id="month_id" name="month_id" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                            </div>
                        </div>
                        @if(\App\Helpers\VaiTro::getEditPhong() || \App\Helpers\VaiTro::getEditBan())
                            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                                 id="un_apply" name="un_apply">
                                <i class="fa-yoast"></i>
                                <span class="bold" data-toggle="modal" data-target="#apply">Bỏ Duyệt</span>
                            </div>
                            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                                 id="apply" name="apply">
                                <i class="fa-yoast"></i>
                                <span class="bold" data-toggle="modal" data-target="#apply">Duyệt</span>
                            </div>
                        @endif
                    </div>
                    <div class="hr-line-dashed"></div>
                </fieldset>
            </div>
        </div>

        <div>
            <div id="reviewGrid"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".jsDatetimePicker").datepicker({
            autoclose:true
        });

        var room_id = getUrlParameter('room_id');
        if(room_id > 0) {
            $("#room_id option[value=" + room_id +"]").attr("selected","selected");
        }

        $(".jsDatetimePicker").datepicker("setDate",getUrlParameter('date_param'));
        $("#contentReview").css("display", "block");
        $("#staffs-grid-content").css("display", "block");
        getGrid();
        $('#product-review').one('click', function () {
            getGrid();
        });
        $('#room_id').change(function () {
            getGrid();
        });
        $('#month_id').change(function(){
            getGrid()
        });

        $('#un_apply').click(function () {
            var thang_id = $('#month_id').val();
            var room_id = parseInt($('#room_id').val());
            var thang_name = thang_id;

            if (isNaN(room_id)){
                alert('bạn chưa chọn  phòng để duyệt đánh giá');
                return
            }

            $.ajax({
                data: {
                    'room_id': room_id,
                    'thang_id': thang_id,
                    'un_apply' : 1,
                },
                url: "/result/apply",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    alert('Đã bỏ duyệt thành công  đánh giá cho ' + thang_name);
                    getGrid();
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        });
        $('#apply').click(function () {
            var thang_id = $('#month_id').val();
            var room_id = parseInt($('#room_id').val());
            var thang_name = thang_id;
            if (isNaN(room_id)){
                alert('bạn chưa chọn  phòng để duyệt đánh giá');
                return
            }

            $.ajax({
                data: {
                    'room_id': room_id,
                    'thang_id': thang_id
                },
                url: "/result/apply",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    alert('Đã duyệt thành công  đánh giá cho ' + thang_name);
                    getGrid()
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        });
        function getGrid() {
            var room_id = parseInt($('#room_id').val());
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'room_id': room_id,
                    'thang_id' : month_id
                },
                url: "/rates/reviews",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#reviewGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }
        $(document).on('click', 'table tbody [name="editdanhgia"]', function () {
            alert('abc');

        });
        function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
    });
</script>