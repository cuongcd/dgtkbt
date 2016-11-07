{!! HTML::style('css/pages/page.css')!!}
<div class="col-lg-12">
    <div class="hr-line-dashed hidden-lg hidden-lg"></div>
    <div class="form-group">
        <div class="col-lg-12" style="float: right">
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">{{Lang::get('general.name')}} <span
                            class="required">*</span></label>

                <div class="col-lg-10">
                    <input type="text" class="form-control" id="name" name="name" required=true
                           value="{{isset($roles['name'])?$roles['name']:''}}"/>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">{{Lang::get('general.description')}} <span
                            class="required">*</span></label>

                <div class="col-lg-10">
                    <input type="text" class="form-control" id="description" name="description" required=true
                           value="{{isset($roles['description'])?$roles['description']:''}}"/>
                </div>
            </div>

            <div class="hr-line-dashed"></div>

        </div>
    </div>
</div>

<script>
    {{--if ('{!! $pages[$lang]['url'] !!}' + ' ' == ' ') {--}}
        {{--$('#blah-' + '{!! $lang !!}').hide();--}}
    {{--}--}}

//    function readURL(input, lang) {
//        if (input.files && input.files[0]) {
//            var reader = new FileReader();
//
//            reader.onload = function (e) {
//                $('#blah-' + lang)
//                        .attr('src', e.target.result)
//                        .width(200)
//                        .height(150)
//                        .show();
//            };
//            reader.readAsDataURL(input.files[0]);
//        }
//    }

//    $(document).ready(function () {
//        // summer note
//        $('.summernote').summernote({
//            height: 300,
//            minHeight: null,             // set minimum height of editor
//            maxHeight: null,             // set maximum height of editor
//            focus: true
//        });
//    });
</script>

<style>
    .note-editor.fullscreen {
        top: 14% !important;
    }
</style>



