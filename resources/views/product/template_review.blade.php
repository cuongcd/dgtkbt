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
                    <h4 class="modal-title">Thêm Mới Công Việc</h4>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 control-label">Tên Công Việc :</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" id='ten_congviec' name="ten_congviec">
                    </div>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 control-label">Hệ Số :</label>

                    <div class="col-lg-9">
                        <input type="number" class="form-control" id='heso_cv' name="heso_cv" min="0">
                    </div>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 control-label">Mặc Định :</label>

                    <div class="col-lg-9">
                        <input type="number" min="0" class="form-control" id='kl_macdinh' name="kl_macdinh" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_cv" class="btn btn-success" data-dismiss="modal">Save
                    </button>
                </div>
            </div>
        </div>
    </div>


    <label class="control-label">Công Việc Chuyên Môn</label>
    <div class="ibox float-e-margins" id="productReviews">

        <div class="ibox-title">
                <div class="ibox-tools">
                <a class="collapse-link" id="product-review"><i class="fa fa-chevron-down"></i></a>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <fieldset>
            <div class="col-lg-12">
                    <div class="form-group locale-element">
                        <label class="col-lg-1 control-label">Phòng</label>

                        <div class="col-lg-2">
                            <select class="form-control input-sm valid" id="room_id" name="room_id" aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\Room::getListRoom() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-1 control-label">Chức Danh</label>

                        <div class="col-lg-2">
                            <select class="form-control input-sm valid" id="position_id" name="position_id" aria-invalid="false">

                            </select>
                        </div>
                        <label class="col-lg-1 control-label">Vị Trí </label>

                        <div class="col-lg-2">
                            <select class="form-control input-sm valid" id="mission_id" name="mission_id" aria-invalid="false">

                            </select>
                        </div>
                        <label class="col-lg-1 control-label">Bậc</label>

                        <div class="col-lg-2">
                            <select class="form-control input-sm valid" id="level_id" name="level_id" aria-invalid="false">
                                @foreach(\App\Helpers\Level::getListLevel() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                <div class="col-lg-12">
                    <div class="col-lg-8">
                    </div>
                    <div class="right">
                        <button class="btn btn-sm btn-info import-button" type="button" id="uploadfile">
                            <i class="fa fa-upload"></i>
                            <span class="bold">Import File</span>
                        </button>
                    </div>

                    <div class="right">
                        <input type="file" id="basicModuleImage"  name="basicModuleImage" />
                    </div>

                    <div class="col-lg-2">
                        <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                             id="add_new_key">
                            <i class="fa fa-plus"></i>
                            <span class="bold" data-toggle="modal" data-target="#add_new_cv">Thêm Mới</span>
                        </div>
                    </div>
                </div>
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
        $('#room_id').change(function(){

            $("#ajax-loading-mask").show();
            $("#ajax-loading").show();
            $.ajax({
                type: "GET",
                data: {'_id': $('#room_id').val()},
                url: 'positions/getlist',
                success: function (response) {
                    $('#position_id').html(response);
                    $("#position_id").val($("#position_id option:first").val());

                }, error: function (response) {

                }
            });
            $.ajax({
                type: "GET",
                data: {'_id': $('#room_id').val()},
                url: 'missions/getlist',
                success: function (response) {
                    $('#mission_id').html(response);
                    $("#mission_id").val($("#position_id option:first").val());
                    $("#ajax-loading-mask").hide();
                    $("#ajax-loading").hide();
                }, error: function (response) {
                    $("#ajax-loading-mask").hide();
                    $("#ajax-loading").hide();
                }
            });
            getGrid();
        });
        $('#position_id').change(function(){
            getGrid();
        });
        $('#level_id').change(function(){
            getGrid();
        });
        $('#mission_id').change(function(){
            getGrid();
        })
        $('#save_cv').click(function(){
            var room_id = parseInt($('#room_id').val());
            var level_id = parseInt($('#level_id').val());
            var position_id = parseInt($('#position_id').val());
            var mission_id = parseInt($('#mission_id').val());

            var name = $('#ten_congviec').val();
            var heso = parseInt($('#heso_cv').val());
            var macdinh =parseInt($('#kl_macdinh').val());
            if(room_id <= 0 || isNaN(room_id)) {
                alert('bạn chưa chọn phòng!!!');
                return;
            }
            if(level_id <= 0 || isNaN(level_id)) {
                alert('bạn chưa chọn bậc!!!');
                return;
            }
            if(position_id <= 0 || isNaN(position_id)){
                alert('bạn chưa chọn chức danh!!!');
                return;
            }
            if(mission_id <= 0 || isNaN(mission_id)){
                alert('bạn chưa chọn vị trí làm việc!!!');
                return;
            }
            if(heso <= 0 || isNaN(heso))
            {
                alert('bạn chứa điền hệ số !!!');
                return;
            }
            if(macdinh <= 0 ||isNaN(macdinh))
                macdinh = 0
            if(name.length < 3)
            {
                alert('bạn chưa điền tên công việc');
                return;
            }

            $.ajax({
                data: {
                    'room_id': room_id,
                    'level_id': level_id,
                    'chucdanh_id': position_id,
                    'mission_id' : mission_id,
                    'name' : name,
                    'heso' : heso,
                    'macdinh' : macdinh,
                },
                url: "/works/addnew",
                beforeSend: function () {

                },
                success: function (response) {
                    alert('Thêm thành công');
                }
            });
            getGrid();

        });
        function getGrid(){
            if(typeof($('#position_id').val()) === "null" )
                return;
            var room_id = $('#room_id').val();
            var level_id = $('#level_id').val();
            var position_id = $('#position_id').val();
            var mission_id = parseInt($('#mission_id').val());
            $.ajax({
                data: {'room_id': room_id,
                    'level_id': level_id,
                    'position_id': position_id,
                    'mission_id':mission_id,
                },
                url: "/works/reviews",
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

        $('#uploadfile').click(function () {
            var room_id = parseInt($('#room_id').val());
            var level_id = parseInt($('#level_id').val());
            var position_id = parseInt($('#position_id').val());
            var mission_id = parseInt($('#mission_id').val());
            var file_data = $("#basicModuleImage").prop("files")[0];

            if(room_id <= 0 || isNaN(room_id)) {
                alert('bạn chưa chọn phòng!!!');
                return;
            }
            if(level_id <= 0 || isNaN(level_id)) {
                alert('bạn chưa chọn bậc!!!');
                return;
            }
            if(position_id <= 0 || isNaN(position_id)){
                alert('bạn chưa chọn chức danh!!!');
                return;
            }
            if(mission_id <= 0 || isNaN(mission_id)){
                alert('bạn chưa chọn vị trí làm việc!!!');
                return;
            }
            if(!file_data) {
                alert('bạn chưa chọn file!!!');
                return;
            }

            var form_data = new FormData();
            form_data.append("room_id", room_id)
            form_data.append("level_id", level_id)
            form_data.append("position_id", position_id)
            form_data.append("mission_id", mission_id)
            form_data.append("file", file_data)



            $.ajax({
                url: 'works/import',
                type: 'post',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,

                data: form_data,

                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    alert(response);
                    getGrid();
                }
            });

        });

    });
</script>