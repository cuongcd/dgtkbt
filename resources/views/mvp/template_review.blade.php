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
                    <h4 class="modal-title">Đề Xuất Nhân Vật Tiêu Biểu</h4>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 control-label">Tên Nhân Viên :</label>
                    <div class="col-lg-9">
                        <select class="form-control input-sm valid limitedNumbChosen" id="user_id" name="user_id" multiple="true"
                                aria-invalid="false">
                            <option value=""></option>
                            @foreach(\App\Helpers\User::getAllUser() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 control-label">Lý Do :</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" id='ghichu' name="ghichu" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_cv" class="btn btn-success" data-dismiss="modal">Thêm
                    </button>
                </div>
            </div>
        </div>
    </div>


    <label class="control-label">Danh Sách Đề Xuất Nhân Vật Tiêu Biểu</label>
    <div class="ibox float-e-margins" id="productReviews">

        <div class="ibox-title">
                <div class="ibox-tools">
                <a class="collapse-link" id="product-review"><i class="fa fa-chevron-down"></i></a>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <fieldset>

                <div class="col-lg-12">
                    <label class="col-lg-1 control-label">Tháng</label>
                    <div class="col-lg-2">
                        <input type="date" id="month_id" name="month_id" >
                    </div>
                    {{--@if(\App\Helpers\User::isPermissionAddMvp())--}}
                    <div class="col-lg-2">
                        <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                             id="add_new_key">
                            <i class="fa fa-plus"></i>
                            <span class="bold" data-toggle="modal" data-target="#add_new_cv">Thêm </span>
                        </div>
                    </div>
                    {{--@endif--}}
                </div>
            </fieldset>
        </div>
        <div>
            <div id="reviewGrid"></div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#contentReview").css("display", "block");
        $("#works-grid-content").css("display", "block");
        getGrid();
        $('#product-review').one('click', function () {
            getGrid();
        });
        $('#level_id').change(function(){
            getGrid();
        });
        $('#month_id').change(function(){
            getGrid();
        })
        $('#save_cv').click(function(){
            var user_id = parseInt($('#user_id').val());
            var month_id = $('#month_id').val();
            var ghichu = $('#ghichu').val();

            if(user_id <= 0 || isNaN(user_id)) {
                alert('bạn chưa chọn tên nhân viên!!!');
                return;
            }
            if(isNaN(parseInt(month_id))) {
                alert('bạn chưa chọn tháng!!!');
                return;
            }
            if(ghichu.length <= 0){
                alert('bạn chưa nêu rõ thành tích!!!');
                return;
            }

            $.ajax({
                data: {
                    'user_id' :user_id,
                    'thang_id' :month_id,
                    'ghichu' :ghichu

                },
                url: "/mvps/addnew",
                beforeSend: function () {

                },
                success: function (response) {
                    alert('Thêm thành công');
                }
            });
            getGrid();

        });
        function getGrid(){
            if(typeof($('#month_id').val()) === "null" )
                return;
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/mvps/reviews",
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
            $("#works-grid-content").css("display", "block");
        }
        $(".limitedNumbChosen").chosen({
            max_selected_options: 1,
            placeholder_text_multiple: "Nhập Tên"
        })
        .bind("chosen:maxselected", function (){
            window.alert("Bạn chỉ có thể thêm tối đa 1 nhân viên trong 1 lần!");
        })
    });
</script>