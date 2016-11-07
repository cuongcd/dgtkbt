<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <fieldset>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.template_file')}}
                    </label>

                    <div class="col-lg-10">
                        <select class="form-control input-sm valid templatefile" id="templatefile" name="templatefile"
                                aria-required="true" aria-invalid="false">
                            <option value=""></option>
                            @foreach($listTemplate as $key=>$val)
                                <option value="{{$val}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.name')}}
                        <span class="required" aria-required="true">*</span>
                    </label>

                    <div class="col-lg-10">
                        <input class="form-control input-sm valid" required="required" id="name" name="name"
                               value="{{isset($template['name'])?$template['name']:''}}" type="text"
                               aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.key')}}
                        <span class="required" aria-required="true">*</span>
                    </label>

                    <div class="col-lg-10">
                        {{--<input class="form-control input-sm valid" required="required" id="key" name="key" value="{{isset($template['key'])?$template['key']:''}}" type="text" aria-required="true" aria-invalid="false">--}}
                        <select class="form-control input-sm valid" id="key" name="key" aria-required="true"
                                aria-invalid="false">
                            @foreach(Config::get('constant.mail_template') as $key=>$val)
                                <option value='{{$key}}'>{{$val}} @if(isset($template['key']) && $template['key'] ==$key) {{'selected'}}  @endif</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.subject')}}
                        <span class="required" aria-required="true">*</span>
                    </label>

                    <div class="col-lg-10">
                        <input class="form-control input-sm valid" required="required" id="subject" name="subject"
                               value="{{isset($template['subject'])?$template['subject']:''}}" type="text"
                               aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.sender_name')}}
                        <span class="required" aria-required="true">*</span>
                    </label>

                    <div class="col-lg-10">
                        <input class="form-control input-sm valid" required="required" id="sender_name"
                               name="sender_name"
                               value="{{isset($template['sender_name'])?$template['sender_name']:''}}" type="text"
                               aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">
                        {{Lang::get('labels.sender_email')}}
                        <span class="required" aria-required="true">*</span>
                    </label>

                    <div class="col-lg-10">
                        <input class="form-control input-sm valid" required="required" id="sender_email"
                               name="sender_email"
                               value="{{isset($template['sender_email'])?$template['sender_email']:''}}" type="text"
                               aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group" id="emails-pages" style="border: 1px solid #272727">
                    <textarea id="content" class="content" name="content">
                        {{isset($template['content'])?$template['content']:''}}
                    </textarea>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.template').change(function () {
            var template_id = $(this).val();
            var url = window.location.hostname;

            if (template_id != '') {
                $.ajax({
                    type: "get",
                    url: "/emails/template",
                    data: "id=" + template_id,
                    beforeSend: function () {
                        $('#ajax-loading-mask').show();
                        $('#ajax-loading').show();
                    },
                    success: function (response) {
                        if (response != 'errors') {
                            //obj = $.parseJSON(response);
                            $('#ajax-loading-mask').hide();
                            $('#ajax-loading').hide();
                            $('.templatefile').val('');
                            $('.note-editable').html(response);
                            $('#content').val(response);
//                                $('.summernote').append(response);
                        } else {
                            alert("error, please try again");
                        }
                    },
                    error: function (response) {
                        alert("server not response, please try again!");
                    }
                });
            } else {
                $('#name').val('');
                $('#subject').val('');
                $('#sender_name').val('');
                $('#sender_email').val('');
                $('#status').val('');
                $('#content').val('');
            }

        });
        $('.templatefile').change(function () {
            var templatename = $(this).val();
            var url = window.location.hostname;

            if (templatename != '') {
                $.ajax({
                    type: "get",
                    url: "/emails/templateFile",
                    data: "file=" + templatename,
                    beforeSend: function () {
                        $('#ajax-loading-mask').show();
                        $('#ajax-loading').show();
                    },
                    success: function (response) {
                        if (response != 'errors') {
                            $('#ajax-loading-mask').hide();
                            $('#ajax-loading').hide();
                            $('.template').val('');
                            $('.note-editable').html(response);
                            $('#content').val(response);
//                                $('.summernote').append(response);
                        } else {
                            alert("error, please try again");
                        }
                    },
                    error: function (response) {
                        alert("server not response, please try again!");
                    }
                });
            } else {
                $('#name').val('');
                $('#subject').val('');
                $('#sender_name').val('');
                $('#sender_email').val('');
                $('#status').val('');
                $('#content').val('');
            }

        });
        $('.note-editable').focusout(function () {
            var content = $(this).html();
            $('#content').val(content);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pagesImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo-icon").change(function () {
            $('#pagesImage').css("display", "block");
            $('#pagesImageShow').css("display", "none");
            readURL(this);
        });
        $("#content").summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });
    });

</script>

<style>
    .note-resizebar {
        display: none;
    }

    .modal-backdrop {
        display: none;
    }

    .note-editor.fullscreen {
        top: 19% !important;
    }
</style>
