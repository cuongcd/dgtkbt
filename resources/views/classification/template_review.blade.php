<div id="product_review">
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
                    </div>
                    <div class="hr-line-dashed"></div>
                </fieldset>
            </div>
        </div>

        <div>
            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                 id="export_execel" name="export_execel">
                <i class="fa fa-download"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_tiendo">Xuất File</span>
            </div>
            <div class="btn btn-sm btn-info download-button right" style="margin-left: 10px"
                 id="export_all_execel" name="export_all_execel">
                <i class="fa fa-download"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_tiendo">In Tất Cả</span>
            </div>
            <div id="reviewGrid"></div>
        </div>
    </div>
</div>
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
        $('#export_execel').click(function() {
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();
            window.location.assign("/classification/export?room_id=" +room_id +  "&thang_id=" + thang_id);
        });
        $('#export_all_execel').click(function(){
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();
            window.location.assign("/classification/export-all?room_id=" +room_id +  "&thang_id=" + thang_id);
        })
        $(document).on('change', 'table tbody [name="banxeploai"]', function () {
            var xeploai =$(this).val();
            var month_id = $('#month_id').val();
            var email = ($(this).closest("tr").find('td:eq(0)').text().trim());
            $.ajax({
                data: {
                    'xeploai': xeploai,
                    'thang_id' : month_id,
                    'email' : email
                },
                url: "/classification/update",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    getGrid();
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");

        });
        function getGrid() {
            var room_id = $('#room_id').val();
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'room_id': room_id,
                    'thang_id' : thang_id
                },
                url: "/classification/reviews",
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