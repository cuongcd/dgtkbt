<div id="product_review">
    <label class="control-label">Giao Việc</label>
    <div class="btn btn-sm btn-default right" style="margin-left: 10px"
         id="back_page">
        <i class="fa fa-step-backward"></i>
        <span class="bold">Back</span>
    </div>

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
                        @if(isset($product))
                            <label class="col-lg-3 control-label">Họ Tên: {{$product->first_name}}</label>
                            <label class="col-lg-3 control-label">Chức
                                Danh: {{\App\Helpers\Position::getPosition($product->chucdanh_id)}}</label>
                            {{--<label class="col-lg-2 control-label">Bậc: {{\App\Helpers\Level::getLevel($product->level_id)}}</label>--}}
                        @endif
                        <label class="col-lg-2 control-label">Chọn Tháng</label>

                        <div class="col-lg-2">
                            <div class='input-group date jsDatetimePicker'>
                                <input type='text' class="form-control" id="month_id" name="month_id" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                            </div>
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>
                </fieldset>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg tax" id="edit_chuyen_mon" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Công Việc Chuyên Môn</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên Công Việc</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_name_chuyenmon' name="edit_name_chuyenmon"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Hệ Số:</label>

                        <div class="col-lg-9">
                            <input type="number" name="heso" id = "heso">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Khối Lượng:</label>

                        <div class="col-lg-9">
                            <input type="number" name="khoiluon" id = "khoiluong">
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_cv_chuyenmon' name="id_cv_chuyenmon" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_ghichu" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_cv_chuyen_mon" name="edit_cv_chuyen_mon" data-toggle="modal"
                  data-target="#edit_chuyen_mon">Edit</span>
        </div>


        <div>
            <div class="col-lg-12">
                <span class="help-block m-b-none">
                                <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                                     id="add_new_key">
                                    <i class="fa fa-plus"></i>
                                    <span class="bold" data-toggle="modal" data-target="#add_new_language">Thêm Công Việc</span>
                                </div>
                    <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                         id="add_new_key">
                        <i class="fa fa-plus"></i>
                        <span class="bold" data-toggle="modal" data-target="#add_new_dotxuat">Thêm Việc Đột Xuất</span>
                    </div>
                     <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                          id="add_new_key">
                         <i class="fa fa-plus"></i>
                         <span class="bold" data-toggle="modal" data-target="#apply_month">Áp Dụng Tháng</span>
                     </div>
                     <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                          id="addBydictionary">
                         <i class="fa fa-plus"></i>
                         <span class="bold">Áp Dụng Từ Điển</span>
                     </div>
                </span>
            </div>
            <div class="btn btn-sm btn-primary right" style="margin-left: 10px;"
                 id="delete_grid">
                <i class="fa fa-update"></i>
                <span class="bold">Xóa Việc Đã Chọn</span>
            </div>
            <div id="reviewGrid"></div>
            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="update_grid">
                <i class="fa fa-update"></i>
                <span class="bold">Cập Nhật</span>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg tax" id="add_new_language" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Mới Công Việc</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="congviec_id" name="congviec_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\Job::getAllJob() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Khối Lượng :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='KhoiLuongThem' name="KhoiLuongThem" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_congviec" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="apply_month" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Áp Dụng Tháng</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn Tháng:</label>

                        <div class="col-lg-6">
                            <div class='input-group date jsDatetimePicker'>
                                <input type='text' class="form-control" id="month_apply" name="month_apply" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="apply_month_save" class="btn btn-success" data-dismiss="modal">Áp Dụng
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_dotxuat" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Việc Đột Xuất</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <label class="col-lg-4 control-label">Tên Công Việc :</label>
                            <div class="col-lg-8">
                                <input type="textarea" class="form-control" id='tendotxuat' name="tendotxuat">
                            </div>
                        </div>
                        <div class="modal-body">
                            <label class="col-lg-4 control-label">Hệ Số :</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id='hesodoxuat' name="hesodoxuat" min="0">
                            </div>
                        </div>
                        <div class="modal-body">
                            <label class="col-lg-4 control-label">Khối Lượng :</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id='khoiLuongdotxuat' name="khoiLuongdotxuat"
                                       min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_dotxuat" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
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

        $(".jsDatetimePicker").datepicker("setDate",getUrlParameter('date_param'));

        var bandanhgia;
        $("#contentReview").css("display", "block");
        $("#staffs-grid-content").css("display", "block");
        getGrid();
        $('#product-review').one('click', function () {
            getGrid();
        });
        $('#month_id').change(function () {
            getGrid();
            setTimeout(function(){
                getBanDanhGia();
            }, 2000);
        });
        $('#update_grid').click(function () {
            getGrid();
        });
        function getGrid() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/staffs/job",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#reviewGrid').html(response);
                    $('#staffJobMonth-massaction-form').hide();
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }
        $('#delete_grid').click(function() {
            var ids = '';
            if(bandanhgia==0) {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            $('table tbody [name="massaction"]').each(function(){
                if(this.checked) {
                    if(ids == '')
                        ids = $(this).val();
                    else
                        ids = ids + ',' + $(this).val();

                }
            });
            if(ids.length <= 0) {
                alert('Bạn chưa chọn công việc để xóa');
                return
            } else {
                $.ajax({
                    data: {
                        'ids': ids
                    },
                    url: "/staffs/mass-delete-job",
                    beforeSend: function () {
                        $('#ajax-loading-mask').show();
                        $('#ajax-loading').show();
                    },
                    success: function (response) {
                        alert('Bạn Đã xóa thành công ' + response + ' Công việc');
                        getGrid();
                    }
                });
            }
        })

        $(document).on('keyup, change', 'table tbody [name="khoiluong"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(1)').text());
            var KL = $(this).val();
            if(bandanhgia == 0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
           $.ajax({
                data: {
                    'congviec_id': _id,
                    'khoiluong': KL
                },
                url: "/staffs/updatejob",
                beforeSend: function () {
                },
                success: function (response) {
//                    getGrid()
                }
            });
        });
        $(document).on('click', 'table tbody [name="delete_CV"]', function () {
            if(bandanhgia == 0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            if (confirm("Bạn Chắc Chắn Xóa?")) {
                var _id = parseInt($(this).closest("tr").find('td:eq(1)').text());
                $.ajax({
                    data: {
                        'congviec_id': _id
                    },
                    url: "/staffs/deletejob",
                    beforeSend: function () {
                        $('#ajax-loading-mask').show();
                        $('#ajax-loading').show();
                    },
                    success: function (response) {
                        getGrid()
                    }
                });
            }
        });
        $(document).on('click', 'table tbody [name="Edit_CV"]', function () {

                var _id = parseInt($(this).closest("tr").find('td:eq(1)').text());
                var name = $(this).closest("tr").find('td:eq(2)').text().trim();
                var khoiluong = parseInt($(this).closest("tr").find('td:eq(5)').text());
                var heso = parseInt($(this).closest("tr").find('td:eq(3)').text());


            $('#khoiluong').val(khoiluong);
            $('#heso').val(heso);
            $('#edit_name_chuyenmon').val(name);
            $('#id_cv_chuyenmon').val(_id);
            $('#edit_cv_chuyen_mon').click();
        });

        $('#save_new_ghichu').click(function () {
            var _id = parseInt($('#id_cv_chuyenmon').val());
            var khoiluong = $('#khoiluong').val();
            var heso = $('#heso').val();
            var name =  $('#edit_name_chuyenmon').val();
            $('#edit_name_chuyenmon').val('');

            if (bandanhgia==0) {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'khoiluong': khoiluong,
                    'heso': heso,
                    'name' : name,
                },
                url: "/staffs/updatejobname",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid();
                }
            });
        });

        $('#save_new_congviec').click(function () {
            if(bandanhgia==0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            var congviec_id = $('#congviec_id').val();
            var khoiLuong = $('#KhoiLuongThem').val();
            var thang_id = $('#month_id').val();
            if (congviec_id <= 0) {
                alert('bạn chưa chọn công việc');
                return;
            }
            if (khoiLuong <= 0) {
                alert('bạn chưa chọn khối lượng để giao');
                return;
            }
            $.ajax({
                data: {
                    'congviec_id': congviec_id,
                    'khoiluong': khoiLuong,
                    'thang_id': thang_id
                },
                url: "/staffs/addnewjob",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid()
                }

            });
        });

        $('#save_dotxuat').click(function () {
            if(bandanhgia==0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            var jobname = $('#tendotxuat').val();
            var khoiLuong = $('#khoiLuongdotxuat').val();
            var thang_id = $('#month_id').val();
            var heso = $('#hesodoxuat').val();

            if (congviec_id <= 0) {
                alert('bạn chưa chọn công việc');
                return;
            }
            if (khoiLuong <= 0) {
                alert('bạn chưa chọn khối lượng để giao');
                return;
            }
            $.ajax({
                data: {
                    'jobname': jobname,
                    'khoiluong': khoiLuong,
                    'thang_id': thang_id,
                    'heso': heso
                },
                url: "/staffs/unexpected",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid()
                }

            });
        });
        $('#back_page').click(function () {
            var url = document.referrer;
            if(url.indexOf('?') > 0) {
              url =  url.substr(0, url.indexOf('?'));
            }

            url = url + '?date_param=' + $('#month_id').val() + '&room_id=' + getUrlParameter('room_id');
            window.location.replace(url);
        });

        $('#addBydictionary').click(function () {
            if(bandanhgia==0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            var thang_id = $('#month_id').val();

            $.ajax({
                data: {
                    'thang_id': thang_id
                },
                url: "/staffs/dictionary",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid()
                }

            });
        });

        $('#apply_month_save').click(function () {
            if(bandanhgia==0)
            {
                alert('ban đã duyệt đánh giá cho tháng này, bạn không được update');
                return;
            }
            var thang_id = $('#month_id').val();
            var month_apply = $('#month_apply').val();

            if (month_apply <= 0) {
                alert('bạn chưa chọn tháng để ap dụng');
                return;
            }
            $.ajax({
                data: {
                    'thang_id': thang_id,
                    'month_apply': month_apply
                },
                url: "/staffs/month",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid()
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                }

            });
        });

        function getBanDanhGia() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id,
                },
                url: "/staffs/getbandanhgia",
                beforeSend: function () {
                },
                success: function (response) {
                    if (response == 1)
                        bandanhgia = 1;
                    else
                        bandanhgia = 0;
                }



        });
        }
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

<style>
    .modal {
        margin-top: 10%
    }

    .modal-content {
        /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
        width: inherit;
        height: inherit;
        /* To center horizontally */
        margin: 0 auto;
    }
</style>