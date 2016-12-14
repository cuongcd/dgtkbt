<div id="product_review">
    <label class="control-label">Tự Đánh Giá</label>

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
                            <label class="col-lg-2 control-label">Họ Tên: {{$product->first_name}}</label>
                            <label class="col-lg-2 control-label">Chức
                                Danh: {{\App\Helpers\Position::getPosition($product->chucdanh_id)}}</label>
                            {{--<label class="col-lg-2 control-label">Bậc: {{\App\Helpers\Level::getLevel($product->level_id)}}</label>--}}
                        @endif
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
                        <label class="col-lg-3 control-label" style="color: red">Đánh Giá
                            : <span id="thang_danh_gia" >{{\App\Helpers\Month::getCurrentMonth()->name}} </span></label>
                        <label class="col-lg-1 control-label">Duyệt </label>
                        <input class="checkbox" name="duyet_danh_gia" id="duyet_danh_gia" type="checkbox" value="1">

                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-12">
                            <label class="col-lg-2 control-label" style="color: red">Tổng Điểm: <span id="tong_diem">0</span></label>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                </fieldset>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_tiendo" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Mới Tiến Độ</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="tiendo_id" name="tiendo_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\TienDo::getTienDo() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='td_diemtru' name="td_diemtru" min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_td' name="ghichu_td"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_tiendo" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_kyluat" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Mới Kỷ Luật</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="kyluat_id" name="kyluat_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\KyLuat::getKyLuat() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='kl_diemtru' name="kl_diemtru" min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_kl' name="ghichu_cl"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_kyluat" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_phamchat" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Mới Phẩm Chất</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="phamchat_id" name="phamchat_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\PhamChat::getPhamChat() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='pc_diemtru' name="pc_diemtru" min="0">
                        </div>
                    </div>

                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_pc' name="ghichu_pc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_phamchat" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_chatluong" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Mới Chất Lượng</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="chatluong_id" name="chatluong_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\ChatLuong::getChatLuong() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='cl_diemtru' name="cl_diemtru" min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_cl' name="ghichu_cl"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_chatluong" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="add_new_donggop" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Thêm Đóng Góp</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Chọn :</label>

                        <div class="col-lg-9">
                            <select class="form-control input-sm valid" id="donggop_id" name="donggop_id"
                                    aria-invalid="false">
                                <option value=""></option>
                                @foreach(\App\Helpers\DongGop::getDongGop() as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Cộng :</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='dg_diemtru' name="dg_diemtru" min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_dg' name="ghichu_dg"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_new_donggop" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
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
                            <p id="edit_name_chuyenmon"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='ghichu_cv' name="ghichu_cv"></textarea>
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

        <div class="modal fade bs-example-modal-lg tax" id="edit_tiendo" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Tiến Độ Công Việc</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên</label>

                        <div class="col-lg-9">
                            <p id="edit_name_tiendo"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='td_diemtru_edit' name="td_diemtru_edit"
                                   min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_ghichu_td' name="edit_ghichu_td"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_tiendo_edit' name="id_tiendo_edit" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_tiendo" class="btn btn-danger" data-dismiss="modal">Delete
                        </button>
                        <button type="button" id="update_tiendo" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="edit_chatluong" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Chất Lượng Công Việc</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên</label>

                        <div class="col-lg-9">
                            <p id="edit_name_chatluong"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='cl_diemtru_edit' name="cl_diemtru_edit"
                                   min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_ghichu_cl' name="edit_ghichu_cl"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_chatluong_edit' name="id_chatluong_edit"
                               min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_chatluong" class="btn btn-danger" data-dismiss="modal">Delete
                        </button>
                        <button type="button" id="update_chatluong" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="edit_kyluat" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Kỷ Luật Lao Động</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên</label>

                        <div class="col-lg-9">
                            <p id="edit_name_kyluat"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='kl_diemtru_edit' name="kl_diemtru_edit"
                                   min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_ghichu_kl' name="edit_ghichu_kl"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_kyluat_edit' name="id_kyluat_edit" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_kyluat" class="btn btn-danger" data-dismiss="modal">Delete
                        </button>
                        <button type="button" id="update_kyluat" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg tax" id="edit_phamchat" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Phẩm Chất Cá Nhân</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên</label>

                        <div class="col-lg-9">
                            <p id="edit_name_phamchat"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Trừ</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='pc_diemtru_edit' name="pc_diemtru_edit"
                                   min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_ghichu_pc' name="edit_ghichu_pc"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_phamchat_edit' name="id_phamchat_edit" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_phamchat" class="btn btn-danger" data-dismiss="modal">Delete
                        </button>
                        <button type="button" id="update_phamchat" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg tax" id="edit_donggop" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="overflow-y: hidden;">
            <div class="modal-dialog modal-lg tax">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Đóng Góp</h4>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Tên</label>

                        <div class="col-lg-9">
                            <p id="edit_name_donggop"></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Điểm Cộng</label>

                        <div class="col-lg-9">
                            <input type="number" class="form-control" id='dg_diemtru_edit' name="dg_diemtru_edit"
                                   min="0">
                        </div>
                    </div>
                    <div class="modal-body">
                        <label class="col-lg-3 control-label">Ghi Chú :</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" id='edit_ghichu_dg' name="edit_ghichu_dg"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id='id_donggop_edit' name="id_donggop_edit" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_donggop" class="btn btn-danger" data-dismiss="modal">Delete
                        </button>
                        <button type="button" id="update_donggop" class="btn btn-success" data-dismiss="modal">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_tiendo_cv" name="edit_tiendo_cv" data-toggle="modal"
                  data-target="#edit_tiendo">Edit</span>
        </div>

        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_chatluong_cv" name="edit_chatluong_cv" data-toggle="modal"
                  data-target="#edit_chatluong">Edit</span>
        </div>

        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_kyluat_ld" name="edit_kyluat_ld" data-toggle="modal"
                  data-target="#edit_kyluat">Edit</span>
        </div>

        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_phamchat_cn" name="edit_phamchat_cn" data-toggle="modal"
                  data-target="#edit_phamchat">Edit</span>
        </div>
        <div class="btn btn-sm btn-primary right" style="margin-left: 10px;display: none">
            <i class="fa fa-plus"></i>
            <span class="bold" id="edit_donggop_cn" name="edit_donggop_cn" data-toggle="modal"
                  data-target="#edit_donggop">Edit</span>
        </div>

        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;">  Công Việc Chuyên Môn </span>
            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="update_grid">
                <i class="fa fa-update"></i>
                <span class="bold">Cập Nhật</span>
            </div>

            <div id="reviewGrid"></div>
        </div>
        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;"> Chất Lượng Công Việc </span>

            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="add_new_key">
                <i class="fa fa-plus"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_chatluong">Thêm Chất Lượng</span>
            </div>
            <div id="chatluongGrid"></div>
        </div>
        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;"> Tiến Độ Công Việc </span>

            <div class="btn btn-sm btn-primary add_new_tiendo right" style="margin-left: 10px"
                 id="add_new_key" name="add_new_key">
                <i class="fa fa-plus"></i>
                <span class="bold" id="add_new_tiendo" name='add_new_tiendo' data-toggle="modal"
                      data-target="#add_new_tiendo">Thêm Tiến Độ</span>
            </div>
            <div id="tiendoGrid"></div>
        </div>

        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;"> Kỷ Luật Lao Động </span>

            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="add_new_key">
                <i class="fa fa-plus"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_kyluat">Thêm Kỷ Luật</span>
            </div>
            <div id="kyluatGrid"></div>
        </div>
        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;">Phẩm Chất Cá Nhân</span>

            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="add_new_key">
                <i class="fa fa-plus"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_phamchat">Thêm Phẩm Chất</span>
            </div>
            <div id="phamchatGrid"></div>
        </div>
        <div>
            <span style="font-size: large;color: #18A689;font-weight: bold;"> Đóng Góp </span>

            <div class="btn btn-sm btn-primary right" style="margin-left: 10px"
                 id="add_new_key">
                <i class="fa fa-plus"></i>
                <span class="bold" data-toggle="modal" data-target="#add_new_donggop">Thêm Đóng Góp</span>
            </div>
            <div id="donggopGrid"></div>
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
        var isdanhgia;
        var isdanhgia;
        getStatusDamhGia();
        isUpdateDanhGia();
        getTongDiem();
        LoadData();
        $('#product-review').one('click', function () {
            getGrid();
        });
        $('#add_new_key').one('click', function () {
            getGrid();
        });
        $('#month_id').change(function () {
            var thang = $('#month_id option:selected').text();
            $('#thang_danh_gia').text(thang);
            $('#ajax-loading-mask').show();
            $('#ajax-loading').show();
            getTongDiem();
            setTimeout(function(){
                getStatusDamhGia();
            }, 2000);
            setTimeout(function(){
                isUpdateDanhGia();
            }, 2000);
            setTimeout(function(){
                LoadData();
            }, 2000);

        });
        $('#duyet_danh_gia').change(function () {
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': thang_id,
                    'self' : 1
                },
                url: "/rates/updatecheckbox",
                beforeSend: function () {

                },
                success: function (response) {
                    alert("Bạn Đã Update Thành Công");
                    getStatusDamhGia();
                    isUpdateDanhGia();
                }
            });

        });
        $(document).on('click', 'table tbody [name="editdanhgia"]', function () {
            alert('abc');

        });

        $(document).on('change', 'table tbody [name="cv_tudanhgia"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var KL = $(this).val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'KL': KL,
                    'thang_id': thang_id
                },
                url: "/self-rates/congviecchuyenmon",
                beforeSend: function () {

                },
                success: function (response) {
                    getTongDiem();
                }
            });

        });
        $(document).on('click', 'table tbody [name="editChatLuong"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var tencv = ($(this).closest("tr").find('td:eq(1)').text());
            var ghichu = ($(this).closest("tr").find('td:eq(6)').text());
            $('#ghichu_cv').val(ghichu.trim());
            $('#edit_name_chuyenmon').text(tencv.trim());
            $('#id_cv_chuyenmon').val(_id);
            $('#edit_cv_chuyen_mon').click();

        });

        $('#save_new_ghichu').click(function () {
            var _id = parseInt($('#id_cv_chuyenmon').val());
            var ghichu = $('#ghichu_cv').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu
                },
                url: "/self-rates/note",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGrid();
                    getTongDiem();
                }
            });
        });
        $('#update_grid').click(function () {
            getGrid();
            getTongDiem();
        });
        $('#save_tiendo').click(function () {
            var _id = parseInt($('#tiendo_id').val());
            var ghichu = $('#ghichu_td').val();
            var diemtru = $('#td_diemtru').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru,
                    'thang_id': thang_id
                },
                url: "/self-rates/newtiendo",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridTD();
                    getTongDiem();
                }
            });
        });

        $(document).on('change', 'table tbody [name="td_tutru"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = $(this).val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatetiendo",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridTD();
                    getTongDiem();
                }
            });
        });

        $(document).on('click', 'table tbody [name="editTienDo"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var name = $(this).closest("tr").find('td:eq(1)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = parseInt($(this).closest("tr").find('td:eq(3)').text());
            $('#edit_ghichu_td').val(ghichu.trim());
            $('#edit_name_tiendo').text(name.trim());
            $('#id_tiendo_edit').val(_id);
            $('#td_diemtru_edit').val(diemtru);
            $('#edit_tiendo_cv').click();
        });
        $('#delete_tiendo').click(function () {
            var _id = $('#id_tiendo_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id
                },
                url: "/self-rates/deletetiendo",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridTD();
                    getTongDiem();
                }
            });
        });
        $('#update_tiendo').click(function () {
            var ghichu = $('#edit_ghichu_td').val();
            var _id = $('#id_tiendo_edit').val();
            var diemtru = $('#td_diemtru_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatetiendo",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridTD();
                    getTongDiem();
                }
            });
        });

        /*
         Chất Lượng
         */
        $(document).on('change', 'table tbody [name="cl_tutru"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = $(this).val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatechatluong",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridCl();
                    getTongDiem();
                }
            });
        });
        $(document).on('click', 'table tbody [name="editChatLuongCV"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var name = $(this).closest("tr").find('td:eq(1)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = parseInt($(this).closest("tr").find('td:eq(3)').text());
            $('#edit_ghichu_cl').val(ghichu.trim());
            $('#edit_name_chatluong').text(name.trim());
            $('#id_chatluong_edit').val(_id);
            $('#cl_diemtru_edit').val(diemtru);
            $('#edit_chatluong_cv').click();
        });
        $('#delete_chatluong').click(function () {
            var _id = $('#id_chatluong_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id
                },
                url: "/self-rates/deletechatluong",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridCl();
                    getTongDiem();
                }
            });
        });
        $('#update_chatluong').click(function () {
            var ghichu = $('#edit_ghichu_cl').val();
            var _id = $('#id_chatluong_edit').val();
            var diemtru = $('#cl_diemtru_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatechatluong",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridCl();
                    getTongDiem();
                }
            });
        });
        $('#save_new_chatluong').click(function () {
            var _id = parseInt($('#chatluong_id').val());
            var ghichu = $('#ghichu_cl').val();
            var diemtru = $('#cl_diemtru').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru,
                    'thang_id': thang_id
                },
                url: "/self-rates/newchatluong",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridCl();
                    getTongDiem();
                }
            });
        });
        /*
         Ky Luat
         */

        $(document).on('change', 'table tbody [name="kl_tutru"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = $(this).val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatekyluat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridKL();
                    getTongDiem();
                }
            });
        });

        $(document).on('click', 'table tbody [name="editKyLuat"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var name = $(this).closest("tr").find('td:eq(1)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = parseInt($(this).closest("tr").find('td:eq(3)').text());
            $('#edit_ghichu_kl').val(ghichu.trim());
            $('#edit_name_kyluat').text(name.trim());
            $('#id_kyluat_edit').val(_id);
            $('#kl_diemtru_edit').val(diemtru);
            $('#edit_kyluat_ld').click();
        });

        $('#delete_kyluat').click(function () {
            var _id = $('#id_kyluat_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id
                },
                url: "/self-rates/deletekyluat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridKL();
                    getTongDiem();
                }
            });
        });
        $('#update_kyluat').click(function () {
            var ghichu = $('#edit_ghichu_kl').val();
            var _id = $('#id_kyluat_edit').val();
            var diemtru = $('#kl_diemtru_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatekyluat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridKL();
                    getTongDiem();
                }
            });
        });
        $('#save_new_kyluat').click(function () {
            var _id = parseInt($('#kyluat_id').val());
            var ghichu = $('#ghichu_kl').val();
            var diemtru = $('#kl_diemtru').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru,
                    'thang_id': thang_id
                },
                url: "/self-rates/newkyluat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridKL();
                    getTongDiem();
                }
            });
        });

        /*

         Phẩm Chất Cá Nhân
         */
        $(document).on('change', 'table tbody [name="pc_tutru"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = $(this).val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatephamchat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridPC();
                    getTongDiem();
                }
            });
        });

        $(document).on('click', 'table tbody [name="editPhamChat"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var name = $(this).closest("tr").find('td:eq(1)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = parseInt($(this).closest("tr").find('td:eq(3)').text());
            $('#edit_ghichu_pc').val(ghichu.trim());
            $('#edit_name_phamchat').text(name.trim());
            $('#id_phamchat_edit').val(_id);
            $('#pc_diemtru_edit').val(diemtru);
            $('#edit_phamchat_cn').click();
        });
        $('#delete_phamchat').click(function () {
            var _id = $('#id_phamchat_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id
                },
                url: "/self-rates/deletephamchat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridPC();
                    getTongDiem();
                }
            });
        });
        $('#update_phamchat').click(function () {
            var ghichu = $('#edit_ghichu_pc').val();
            var _id = $('#id_phamchat_edit').val();
            var diemtru = $('#pc_diemtru_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatephamchat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridPC();
                    getTongDiem();
                }
            });
        });
        $('#save_new_phamchat').click(function () {
            var _id = parseInt($('#phamchat_id').val());
            var ghichu = $('#ghichu_pc').val();
            var diemtru = $('#pc_diemtru').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru,
                    'thang_id': thang_id
                },
                url: "/self-rates/newphamchat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridPC();
                    getTongDiem();
                }
            });
        });

        /*
         Đóng Ghóp
         */

        $(document).on('change', 'table tbody [name="dg_tucong"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = $(this).val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatedonggop",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridDG();
                    getTongDiem();
                }
            });
        });
        $(document).on('click', 'table tbody [name="editDongGop"]', function () {
            var _id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            var name = $(this).closest("tr").find('td:eq(1)').text().trim();
            var ghichu = $(this).closest("tr").find('td:eq(6)').text().trim();
            var diemtru = parseInt($(this).closest("tr").find('td:eq(3)').text());
            $('#edit_ghichu_dg').val(ghichu.trim());
            $('#edit_name_donggop').text(name.trim());
            $('#id_donggop_edit').val(_id);
            $('#dg_diemtru_edit').val(diemtru);
            $('#edit_donggop_cn').click();
        });
        $('#delete_donggop').click(function () {
            var _id = $('#id_donggop_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id
                },
                url: "/self-rates/deletedonggop",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridDG();
                    getTongDiem();
                }
            });
        });
        $('#update_donggop').click(function () {
            var ghichu = $('#edit_ghichu_dg').val();
            var _id = $('#id_donggop_edit').val();
            var diemtru = $('#dg_diemtru_edit').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru
                },
                url: "/self-rates/updatedonggop",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridDG();
                    getTongDiem();
                }
            });
        });

        $('#save_new_donggop').click(function () {
            var _id = parseInt($('#donggop_id').val());
            var ghichu = $('#ghichu_dg').val();
            var diemtru = $('#dg_diemtru').val();
            var thang_id = $('#month_id').val();
            if (isdanhgia) {
                alert('Bạn Không Có Quyền Đánh Giá, Đánh Giá Đã Được Duyệt!!!');
                return;
            }
            $.ajax({
                data: {
                    '_id': _id,
                    'ghichu': ghichu,
                    'diemtru': diemtru,
                    'thang_id': thang_id
                },
                url: "/self-rates/newdonggop",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    getGridDG();
                    getTongDiem();
                }
            });
        });

        function getTongDiem(){
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': thang_id
                },
                url: "/self-rates/getdiem",
                beforeSend: function () {
//                    $('#ajax-loading-mask').show();
//                    $('#ajax-loading').show();
                },
                success: function (response) {
//                    $('#ajax-loading-mask').hide();
//                    $('#ajax-loading').hide();
                    $('#tong_diem').text(response);
                }
            });
        }


        function getGrid() {
            var thang_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': thang_id
                },
                url: "/self-rates/job",
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


        function getGridKL() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/self-rates/kyluat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#kyluatGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }

        function getGridTD() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/self-rates/tiendo",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#tiendoGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }

        function getGridPC() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/self-rates/phamchat",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#phamchatGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }

        function getGridCl() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/self-rates/chatluong",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#chatluongGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }

        function getGridDG() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id
                },
                url: "/self-rates/donggop",
                beforeSend: function () {
                    $('#ajax-loading-mask').show();
                    $('#ajax-loading').show();
                },
                success: function (response) {
                    $('#ajax-loading-mask').hide();
                    $('#ajax-loading').hide();
                    $('#donggopGrid').html(response);
                }
            });
            $("#contentReview").css("display", "block");
            $("#staffs-grid-content").css("display", "block");
        }

        function getStatusDamhGia() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id,
                    'self' : 1,
                },
                url: "/rates/getstatus",
                beforeSend: function () {
                },
                success: function (response) {
                    if (response == 0)
                        $("#duyet_danh_gia").prop("checked", false);
                    if (response == 1)
                        $("#duyet_danh_gia").prop("checked", true);
                }
            });

        }

        function isUpdateDanhGia() {
            var month_id = $('#month_id').val();
            $.ajax({
                data: {
                    'thang_id': month_id,
                    'self' : 1,
                },
                url: "/rates/isupdate",
                beforeSend: function () {
                },
                success: function (response) {
                    if (response == 0) {
                        isdanhgia = false;
                    }
                    if (response == 1) {
                        isdanhgia = true;
                    }
                }
            });

        }

        function LoadData() {
            getGrid();
            getGridKL();
            getGridDG();
            getGridPC();
            getGridCl();
            getGridTD();
        }


    });
</script>
<style>
    .checkbox {
        display: inline-block;
        width: 19px;
        height: 19px;
        margin: -1px 4px 0 0;
        vertical-align: middle;
    }
</style>