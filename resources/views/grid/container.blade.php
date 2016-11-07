<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$grid->getTitle()}}</h5>
                <div class="ibox-tools">
                    @foreach ($grid->getButtons() as $buttonName => $button)
                    <button class="btn btn-sm @if($buttonName != 'back') btn-primary @else btn-default @endif" type="button" onclick="{!!$button->getOnclick()!!}">
                        <i class="fa {{$button->getIcon()}}"></i>
                        <span class="bold">{{$button->getLabel()}}</span>
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="ibox-content" id="{{$grid->getGridId()}}-grid-content">
                @include('grid.content')
            </div>
        </div>
    </div>
 </div>
@include('grid.js')

