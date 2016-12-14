<div id="product_review">

    <div class="modal fade bs-example-modal-lg tax" id="add_new_cv" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
        <div class="modal-dialog modal-lg tax">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">In Báo Cáo Theo Thời Gian</h4>
                </div>
                <div class="modal-body">
                    <label class="col-lg-4 control-label">Tháng Bắt Đầu</label>

                    <div class="col-lg-6">
                        <div class='input-group date jsDatetimePicker'>
                            <input type='text' class="form-control" id="start_month" name="start_month" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                        </div>

                    </div>
                </div>
                <div class="modal-body">
                    <label class="col-lg-4 control-label">Tháng Kết Thúc</label>

                    <div class="col-lg-6">
                        <div class='input-group date jsDatetimePicker'>

                        <input type='text' class="form-control" id="end_month" name="end_month" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" id="xuat_bao_cao" class="btn btn-success" data-dismiss="modal">Xuất Báo Cáo
                    </button>
                </div>
            </div>
        </div>
    </div>



    <label class="control-label">Kết Quả Đánh Giá Lao Động</label>

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
                                @foreach(\App\Helpers\Room::getListRoom() as $key => $value)
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
                        @if(\App\Helpers\VaiTro::getEditBan())
                            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                                 id="un_apply_all" name="un_apply_all">
                                <i class="fa-yoast"></i>
                                <span class="bold" data-toggle="modal" data-target="#apply_all">Bỏ Duyệt Toàn Đơn Vị</span>
                            </div>
                            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                                 id="apply_all" name="apply_all">
                                <i class="fa-yoast"></i>
                                <span class="bold" data-toggle="modal" data-target="#apply_all">Duyệt Toàn Đơn Vị</span>
                            </div>
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
            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                 id="export_execel" name="export_execel">
                <i class="fa fa-download"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_tiendo">In</span>
            </div>
            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                 id="export_all_execel" name="export_all_execel">
                <i class="fa fa-download"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_tiendo">In Cả Đơn Vị</span>
            </div>

            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                 id="print_report" name="print_report">
                <i class="fa fa-download"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_cv">In Theo Thời Gian</span>
            </div>

            <div id="reviewGrid"></div>
        </div>
    </div>
</div>

<style>
    .datepicker{z-index:1151 !important;}
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $(".jsDatetimePicker").datepicker({
            autoclose:true
        });
        $("#contentReview").css("display", "block");
        $("#staffs-grid-content").css("display", "block");
        getGrid();
        $('#product-review').one('click', function () {
            getGrid();
        });
        $('#room_id').change(function () {
            getGrid();
        });
        $('#month_id').change(function () {
            getGrid();
        });
        $('#export_execel').click(function () {
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();
            window.location.assign("/result/export?room_id=" + room_id + "&thang_id=" + thang_id);
        });
        $('#export_all_execel').click(function () {
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();

            window.location.assign("/result/printketqua?room_id=" + room_id + "&thang_id=" + thang_id);
        });
        $('#apply').click(function () {
            var thang_id = $('#month_id').val();
            var room_id = parseInt($('#room_id').val());
            if (isNaN(parseInt(thang_id)) || isNaN(room_id)){
                alert('bạn chưa chọn tháng hoặc phòng để duyệt đánh giá');
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
                    alert('Đã duyệt thành công  đánh giá cho ' + thang_id);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        });
        $('#apply_all').click(function () {
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': thang_id
                },
                url: "/result/apply-all",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    alert('Đã duyệt thành công đánh giá toàn đơn vị cho ' + thang_id);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");

        })


        $('#un_apply').click(function () {
            var thang_id = $('#month_id').val();
            var room_id = parseInt($('#room_id').val());

            if (isNaN(parseInt(thang_id)) || isNaN(room_id)){
                alert('bạn chưa chọn tháng hoặc phòng để duyệt đánh giá');
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
                    alert('Đã bỏ duyệt thành công  đánh giá cho ' + thang_id);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        });
        $('#un_apply_all').click(function () {
            var thang_id = $('#month_id').val();
            if (isNaN(parseInt(thang_id))) {
                alert('bạn chưa chọn tháng để duyệt đánh giá');
                return;
            }
            $.ajax({
                data: {
                    'thang_id': thang_id,
                    'un_apply' : 1
                },
                url: "/result/apply-all",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    alert('Đã bỏ duyệt thành công đánh giá toàn đơn vị cho ' + thang_id);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");

        });
        $('#xuat_bao_cao').click(function () {
                var start_month = $('#start_month').val(),
                    end_month = $('#end_month').val();
            if (isNaN(parseInt(start_month))){
                alert('Bạn chưa chọn tháng bắt đầu');
                return;

            }
            if (isNaN(parseInt(end_month))){
                alert('Bạn chưa chọn tháng kết thúc');
                return;

            }

            window.location.assign("/result/print-report?start_month=" + start_month + "&end_month=" + end_month);

        })

        function getGrid() {
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'room_id': room_id,
                    'thang_id': thang_id
                },
                url: "/result/reviews",
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
    });
</script>