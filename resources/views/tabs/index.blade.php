<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$tabs->getTitle()}}</h5>
                <div class="ibox-tools">
                    @foreach ($tabs->getButtons() as $buttonName => $button)
                        <button class="btn btn-sm @if($buttonName == 'back') btn-default @elseif($buttonName == 'delete') btn-danger @else btn-primary @endif" type="button" onclick="{{$button->getOnclick()}}">
                            <i class="fa {{$button->getIcon()}}"></i>
                            <span class="bold">{{$button->getLabel()}}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            {!! Form::open(array('url' => $tabs->getAction(), 'id'=> $tabs->getId(), 'method'=> $tabs->getMethod(),'enctype' => 'multipart/form-data', 'class'=>'form-horizontal')) !!}

            <div class="panel">
                    <div class="panel-heading row">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <?php $i = 0?>
                                @foreach($tabs->getTabs() as $name => $tab)
                                    <li class="{{$name}} @if($i==0) active @endif">
                                        <a data-toggle="tab" href="#tab-{{$i++}}" data-url="@if(isset($tab['url'])){{$tab['url']}}@endif">{{$tab['label']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body row">
                        <div class="tab-content">
                            <?php $i = 0?>
                            @foreach($tabs->getTabs() as $name => $tab)
                                <div class="{{$name}} tab-pane @if($i==0) active @endif" id="tab-{{$i++}}">
                                    @if(isset($tab['content']))
                                        <div class="row">
                                            @foreach($tab['content'] as $form)
                                                @if(isset($form['hidden']))
                                                    {!!$form['content']!!}
                                                @else
                                                    <div class="col-lg-{{$form['width']}}">
                                                        <div class="ibox panel panel-default">
                                                            <div class="panel-heading font-bold">
                                                                {{$form['title']}}
                                                                @if(isset($form['collapse']) && $form['collapse'])
                                                                <div class="ibox-tools">
                                                                    <a class="collapse-link">
                                                                        <i class="fa fa-chevron-up"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="ibox-content panel-body">
                                                                @if(isset($form['content'])) {!! $form['content']->html() !!} @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                {{$tab['title']}}
                                            </div>
                                            <div class="panel-body"></div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
    var countrystates = {!! json_encode($tabs->getCountryStates()) !!};
    var {{$tabs->getId()}} = new form('{{$tabs->getId()}}', countrystates);
    var {{$tabs->getId()}}tabs = new tabs('{{$tabs->getId()}}');
    function deleteItem(url){
        if (confirm('{{Lang::get('general.are_you_sure')}}')) {
            window.location = url;
        }
    }
</script>
@if($tabs->getJs())
    @if(count($tabs->getJsParams()))
        <script type="text/javascript">
            @foreach($tabs->getJsParams() as $key => $value)
            var {{$key}} = '{{$value}}';
            @endforeach
        </script>
    @endif
    <script type="text/javascript" src="{{$tabs->getJsPath()}}"></script>
@endif