<script type="text/javascript">
 var {{$grid->getGridId()}}Grid = new grid(
'{{$grid->getGridId()}}',
'{{$grid->getGridUrl()}}',
'{{$grid->getAjaxGridUrl()}}',
{!!(json_encode($grid->getParams()))?json_encode($grid->getParams()):'[]'!!},
'filter',
@if($grid->isUseAjax()) true @else false @endif);
var {{$grid->getGridId()}}Massaction = new gridMassaction('{{$grid->getGridId()}}', {{$grid->getGridId()}}Grid, 'Please select items');
{{$grid->getGridId()}}Massaction.setActionItems({!!json_encode($grid->getMassActions())!!});
{{$grid->getGridId()}}Massaction.setGridIds({!!json_encode($grid->getAllIds())!!});
</script>