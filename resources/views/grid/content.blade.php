<?php try{?>
<div class="top-grid">
    <div class="left pagination-block">
        <?php $params = $grid->getParams();?>
        <?php $page = (isset($params['page']))?$params['page']:1 ?>
        <span>
            {{Lang::get('general.page')}}
            <button class="btn btn-xs  btn-info" @if($page == 1)disabled @endif title="{{Lang::get('general.previous_page')}}" type="button" onclick="{{$grid->getGridId()}}Grid.loadPage({{$page-1}});return false;">
                <i class="fa fa-caret-left"></i>
            </button>
            <input name="page" value="{{$page}}" class="form-control inline input-s-xxs input-sm input-page">
             <button class="btn btn-xs  btn-info" @if($page == $grid->getLastPage() || $grid->getLastPage() == 0)disabled @endif title="{{Lang::get('general.next_page')}}" type="button" onclick="{{$grid->getGridId()}}Grid.loadPage({{$page+1}});return false;">
                 <i class="fa fa-caret-right"></i>
             </button>
            {{Lang::get('general.of_number_pages', ['number' => $grid->getLastPage()])}}
        </span>

        <span class="separator">|</span>

        <span class="">{{Lang::get('general.total_number_records_found', ['number' => $grid->getItemTotal()])}}</span>
    </div>
    <div class="right">
        @foreach ($grid->getGridButtons() as $buttonName => $button)
            <button class="btn btn-sm btn-info {{$buttonName}}-button" type="button"
                    @if(isset($button['onclick']))
                    onclick="{{$button['onclick']}}"
                    @elseif(isset($button['url']))
                    onclick="window.location='{{$button['url']}}'"
                    @endif>
                <i class="fa fa-{{$button['type'] or $buttonName}}"></i>
                <span class="bold">{{$button['label']}}</span>
            </button>
        @endforeach
    </div>
</div>
@if(count($grid->getMassActions()))
    <table class="table table-striped table-bordered dataTable dtr-inline mass-action">
        <tbody>
        <tr role="row massaction">
            <td class="no-right-border">
                <a href="#" onclick="return {{$grid->getGridId()}}Massaction.selectAll()">{{Lang::get('general.select_all')}}</a><span class="separator">|</span>
                <a href="#" onclick="return {{$grid->getGridId()}}Massaction.unselectAll()">{{Lang::get('general.unselect_all')}}</a><span class="separator">|</span>
                {{--<a href="#" onclick="return {{$grid->getGridId()}}Massaction.selectVisible()">{{Lang::get('general.select_visible')}}</a><span class="separator">|</span>--}}
                {{--<a href="#" onclick="return {{$grid->getGridId()}}Massaction.unselectVisible()">{{Lang::get('general.unselect_visible')}}</a><span class="separator">|</span>--}}
                <strong id="{{$grid->getGridId()}}-massaction-total">0</strong> {{Lang::get('general.items_selected')}}
                <input type="hidden" id="{{$grid->getGridId()}}-massaction-selected-ids">
            </td>
            <td class="a-right no-left-border">
                {!!Form::open(array('id' => $grid->getGridId().'-massaction-form'))!!}
                {!!Form::label('actions', Lang::get('general.actions'))!!}
                <select id="{{$grid->getGridId()}}-massaction-select" required class="form-control inline input-s-sm input-sm">
                    <option value=""></option>
                    @foreach($grid->getMassActions() as $actionName => $action)
                        <option value="{{$actionName}}">{{$action['label']}}</option>
                    @endforeach
                </select>

                @foreach($grid->getMassActions() as $actionName => $action)
                    @if(isset($action['value']))
                        <span id="{{$grid->getGridId()}}-massaction-{{$actionName}}-block" class="{{$grid->getGridId()}}-massaction-block no-display">
                        {!!Form::label('actions', $action['value']['label'])!!}
                            @if($action['value']['type'] == 'text')
                                {!!Form::text('massaction-'.$actionName, null, array('id' => $grid->getGridId().'-massaction-'.$actionName, 'required', 'class' => 'form-control inline input-s-sm input-sm'))!!}
                            @elseif($action['value']['type'] == 'number')
                                <input id="{{$grid->getGridId()}}-massaction-{{$actionName}}" required="required" type="number" class="form-control inline input-s-sm input-sm" name="massaction-{{$actionName}}">
                            @elseif($action['value']['type'] == 'select')
                                {!!Form::select('massaction-'.$actionName, array_replace(array('' => ''), $action['value']['options']), null,
                                    array('id' => $grid->getGridId().'-massaction-'.$actionName, 'required', 'class' => 'form-control inline input-s-sm input-sm'))!!}
                            @endif
                        </span>
                    @endif

                @endforeach

                <button class="btn btn-sm btn-primary" type="button" onclick="return {{$grid->getGridId()}}Massaction.apply()">
                    <i class="fa fa-check"></i>
                    <span class="bold">{{Lang::get('general.submit')}}</span>
                </button>
                {!!Form::close()!!}
            </td>
        </tr>
        </tbody>
    </table>
@endif
<table class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" >
    <thead>
    <?php $filterParams = isset($params['filter'])?$params['filter']:[]?>
    <tr class="headings">
        @if(count($grid->getMassActions()))
            <td style="width: 60px"></td>
        @endif
        @foreach ($grid->getColumns() as $columnName => $column)

            @if($column->getType() == 'radio'))
            <th>
            @elseif($column->getType() == 'checkbox')
                <th class="a-center">{!!Form::checkbox('', '',
                        (isset($filterParams[$columnName]) && $filterParams[$columnName] == 1)?true:false,
                        array('title' => Lang::get('general.select_all'), 'onclick' => $grid->getGridId().'Grid.checkCheckboxes(this)'))!!}
            @elseif($column->isSort())
                @if(isset($params['dir']) && isset($params['order']) && $params['order'] == $columnName)
                    <th class="sorting_{{$params['dir']}}" data-name="{{$columnName}}" data-dir="{{($params['dir'] == 'asc')?'desc':'asc'}}" title="{{($params['dir'] == 'asc')?Lang::get('general.desc'):Lang::get('general.asc')}}">
                @else
                    <th class="sorting" data-name="{{$columnName}}" data-dir="{{($params['dir'] == 'asc')?'desc':'asc'}}" title="{{Lang::get('general.asc')}}">
                @endif
            @else
                <th>
                    @endif
                    {{$column->getLabel()}}

                </th>
                @endforeach
    </tr>
    <tr class="filter">
        @if(count($grid->getMassActions()))
            <td>{!!Form::select('massaction', $grid->getYesNoSelect(), isset($filterParams['massaction'])?$filterParams['massaction']:'',
                array('class'=>'form-control m-b input-sm'))!!}</td>
        @endif

        @foreach ($grid->getColumns() as $columnName => $column)
            <td style="{{($column->getWidth())?'width:'.$column->getWidth():''}}">
                @if($column->isFilter())
                    @if($column->getType() == 'text')
                        {!!Form::text($columnName, isset($filterParams[$columnName]['like'])?$filterParams[$columnName]['like']:'',
                                    array('class'=>'grid-filter form-control input-sm' ))!!}
                    @elseif($column->getType() == 'select')
                        {!!Form::select($columnName, array_replace(array('' => ''), $column->getOptions()),
                            isset($filterParams[$columnName])?$filterParams[$columnName]:'', array('class'=>'grid-filter form-control input-sm'))!!}
                    @elseif($column->getType() == 'date')
                        {!!Form::input('date', $columnName.'[from]', isset($filterParams[$columnName]['from'])?$filterParams[$columnName]['from']:'',
                            array('class' => 'grid-filter form-control input-from input-sm datepicker','placeholder' => Lang::get('general.from'))) !!}
                        {!!Form::input('date', $columnName.'[to]', isset($filterParams[$columnName]['to'])?$filterParams[$columnName]['to']:'',
                            array('class' => 'grid-filter form-control input-sm datepicker','placeholder' => Lang::get('general.to'))) !!}
                    @elseif($column->getType() == 'number' || $column->getType() == 'currency')

                        {!!Form::input('number', $columnName.'[from]', isset($filterParams[$columnName]['from'])?$filterParams[$columnName]['from']:'',
                            array('class' => 'grid-filter form-control input-from input-sm','placeholder' => Lang::get('general.from'), 'min' => $column->getMin(), 'max' => $column->getMax()))!!}
                        {!!Form::input('number', $columnName.'[to]', isset($filterParams[$columnName]['to'])?$filterParams[$columnName]['to']:'',
                            array('class' => 'grid-filter form-control input-sm','placeholder' => Lang::get('general.to'), 'min' => $column->getMin(), 'max' => $column->getMax()))!!}
                    @elseif($column->getType() == 'checkbox' || $column->getType() == 'radio')
                        {!!Form::select($columnName, $grid->getYesNoSelect(), isset($filterParams[$columnName])?$filterParams[$columnName]:'',
                           array('class'=>'grid-filter form-control input-sm', 'onclick' => '' ))!!}
                    @endif
                @endif
            </td>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @if($grid->getItemTotal() <= 0)
        <tr><td colspan="{{count($grid->getMassActions())?count($grid->getColumns())+1: count($grid->getColumns())}}" class="a-center">{{$grid->getNoRecordsText()}}</td></tr>
    @else
        @foreach($grid->getCollection() as $row)
            <tr @if($grid->getRowUrl($row)) title="{!! $grid->getRowUrl($row) !!}" class="pointer" @endif >
                @if(count($grid->getMassActions()))
                    <td class="a-center">
                        {!!Form::checkbox('massaction', $grid->getColumnDataToShow($row, '_id'), false,array('class' => 'massaction-checkbox'))!!}
                    </td>
                @endif

                @foreach ($grid->getColumns() as $columnName => $column)

                    <td class="{{$columnName}}@if($column->isEditable()) form-inline @endif @if($column->getAlign())a-{{$column->getAlign()}} @endif">
                        @if($columnName == 'action' && $column->getType() == 'action')
                            @if($column->getRender())
                                {!!$grid->getColumnDataToShow($row, $columnName)!!}
                            @else
                                <?php $links = []?>
                                @foreach($column->getLinks() as $link)
                                    <?php $j = 0; $params = array()?>
                                    @foreach($link['fields'] as $field)
                                        @if(isset($row->$link['getters'][$j]))
                                            <?php $params[$field] = $row->$link['getters'][$j++]?>
                                            <?php $link['params'] = $params?>
                                            <?php $links[] = $link ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <?php $i = 0?>
                                @foreach($links as $link)
                                    <a href="{{URL::route($link['route'], $link['params'])}}"
                                    @foreach($link['options'] as $key => $value)
                                        {{$key}}="{{$value}}"
                                    @endforeach
                                    >
                                    <i class="fa fa-{{$icons[$link['type']] or $link['type']}}"></i>{{isset($link['type'])?'':$link['label']}}
                                    </a>
                                    @if(++$i < count($links))
                                        <span>|</span>
                                    @endif
                                @endforeach
                            @endif
                        @elseif($column->getType() == 'text' || $column->getType() == 'number')
                            {!!$grid->getColumnDataToShow($row, $columnName)!!}
                        @elseif($column->getType() == 'select')
                            {!!$column->getOptions()[$grid->getColumnDataToShow($row, $columnName)] or null!!}
                        @elseif($column->getType() == 'date')
                            @if($grid->getColumnDataToShow($row, $columnName))
                                {!!$column->formatDatetime($grid->getColumnDataToShow($row, $columnName)) !!}
                            @endif
                        @elseif($column->getType() == 'currency')
                            @if(is_numeric($grid->getColumnDataToShow($row, $columnName)))
                                {!!$column->formatCurrency($grid->getColumnDataToShow($row, $columnName));!!}
                            @endif
                        @elseif($column->getType() == 'checkbox')
                            @if(in_array($grid->getColumnDataToShow($row, '_id'), $column->getValues()))
                                {!!Form::checkbox('', $grid->getColumnDataToShow($row, '_id'), true, array('class' => 'element-checkbox')) !!}
                            @else
                                {!!Form::checkbox('', $grid->getColumnDataToShow($row, '_id'), false, array('class' => 'element-checkbox')) !!}
                            @endif
                        @elseif($column->getType() == 'radio')
                            {!!Form::radio($columnName, $grid->getColumnDataToShow($row, '_id'))!!}
                        @endif

                        @if($column->isEditable())
                            @if($column->isReadonly())
                                {!! Form::hidden($columnName, $grid->getColumnData($row, $columnName))!!}
                            @else
                                @if($column->getType() == 'number' || $column->getType() == 'currency')
                                    <?php $options = ['class' => 'form-control input-s-xs input-sm', 'min' => $column->getMin(), 'max' => $column->getMax()] ?>
                                    {!!Form::input('number', $columnName, $grid->getColumnData($row, $columnName),
                                        $column->getRequired()? array_merge($options, ['required']):$options)!!}
                                @else
                                    <?php $options = ['class' => 'form-control input-s-xs input-sm'] ?>
                                    {!!Form::text($columnName, $grid->getColumnData($row, $columnName),
                                        $column->getRequired()? array_merge($options, ['required']):$options)!!}
                                @endif
                            @endif
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
@if($grid->getJs())
    @if(count($grid->getJsParams()))
        <script type="text/javascript">
                    @foreach($grid->getJsParams() as $key => $value)
                    var {{$key}} = '{{$value}}';
            @endforeach
        </script>
    @endif
    <script type="text/javascript" src="{{$grid->getJsPath()}}"></script>
@endif
<?php } catch(Exception $e){?>
<?php print_r($e->getMessage())?>
<?php }?>