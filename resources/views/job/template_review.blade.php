<div id="product_review">
    <label class="control-label">Danh Sách Công Việc Được Giao</label>

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
                        <label class="col-lg-3 control-label" style="color: red">Tháng Hiện Tại: {{\App\Helpers\Month::getCurrentMonth()->name}} </label>
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
                        <h4 class="modal-title">Chi Tiết Công Việc </h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên Công Việc</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_name_chuyenmon' disabled name="edit_name_chuyenmon"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                    </div>

                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú:</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_chuyenmon' name="ghichu_chuyenmon" disabled ></textarea>
                        </div>

                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <button style="margin-top: 10px" type="button" id="save_new_ghichu" class="btn btn-success" data-dismiss="modal">Close
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
        $('#month_id').change(function(){
            getGrid()
        });
        function getGrid() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id' : month_id
                },
                url: "/job/job",
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

        $(document).on('click', 'table tbody [name="view_cv"]', function () {

            var name = $(this).closest("tr").find('td:eq(0)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(3)').text();

            $('#edit_name_chuyenmon').val(name);
            $('#ghichu_chuyenmon').val(ghichu);

            $('#edit_cv_chuyen_mon').click();
        });
    });
</script>