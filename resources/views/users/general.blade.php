{!! HTML::style('css/pages/page.css')!!}
<div class="col-lg-12">
    <div class="hr-line-dashed hidden-lg hidden-lg"></div>
    <div class="form-group">
        <div class="col-lg-12">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-lg-2 control-label">
                    {{Lang::get('general.permission')}}
                    <span class="required">*</span></label>

                <div class="col-lg-10" id="select_category" data-toggle="modal" data-target="#category_model">
                    <input type="text" class="form-control categories_id" id="category"
                           name="roles"/>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>
    </div>

    <div class="modal fade" id="category_model" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="#">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title center">Select Permission</h4>
                    </div>
                    <div class="modal-body">
                        <div id="jtree">okkk</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        var data = {!! ($permissions) !!}
$('.categories_id').tagsinput({
                    allowDuplicates: false,
                    itemValue: 'id',  // this will be used to set id of tag
                    itemText: 'label' // this will be used to set text of tag
                });

        $('#jtree').jstree({
            "check_callback": true,
            'checkbox': {'keep_selected_style': false, 'three_state': false},
            'plugins': ['checkbox', 'types'],
            'types': {'default': {'icon': 'fa fa-folder'}},
            'core': {
                'data': data,
                "open_parents": true,
                "initially_open": ["menu_2", "menu_8"]
            }
        }).on('select_node.jstree', function (e, data) {
            var ids = data.node.id;
            var name = data.node.text;
            $('.categories_id').tagsinput('add', {id: ids, label: name});
        }).on('deselect_node.jstree', function (e, data) {
            var ids = data.node.id;
            var name = data.node.text;
            $('.categories_id').tagsinput('remove', {id: ids, label: name});
        });

        @if(isset($pages['permissions']) && !empty($pages['permissions']))
            @foreach($pages['permissions'] as $cat)
                $('.categories_id').tagsinput('add', {
                    id: '{!! $cat['_id'] !!}',
                    label: '{!! $cat['name'] !!}'
                });
        @endforeach
    @endif
     // summer note
        $('.summernote').summernote({
            height: 300,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });
    });

</script>


<style>
    .note-editor.fullscreen {
        top: 14% !important;
    }
</style>





