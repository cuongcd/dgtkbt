<input type="hidden" name="{{$grid->getGridId()}}_selected_ids" id="{{$grid->getGridId()}}_selected_ids" value="{{$grid->getSelectedIdsString()}}">
<div id="{{$grid->getGridId()}}-grid-content">
    @include('grid.content')
</div>
@include('grid.js')